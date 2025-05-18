<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Image;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::with(['roomType', 'facilities','images'])->get();
        return response()->json(['rooms' =>$rooms]);
    }

    public function create()
    {

    }

    public function store(StoreRoomRequest $request)
    {
        $validatedData = $request->except(['mainImg','otherImage']);
        try{
            DB::beginTransaction();

            //Ovo je upload slike u storage!
            $mainImgPath = $request->file('mainImg')->store('rooms', 'public');
            $paths = $request->file('otherImages');
            $validatedData['main_img'] = $mainImgPath;
            $room = Room::create($validatedData);
            $idsImage = [];
            foreach ($paths as $image) {
                $path = $image->store('rooms', 'public');
                $imageModel = Image::create(['path' => $path]);
                $idsImage[] = $imageModel->id;
            }

            $room->images()->sync($idsImage);
            // Ako ima facilities da se povežu
            if ($request->has('facilities')) {
                $room->facilities()->sync($request->input('facilities'));
            }
            DB::commit();
            return response()->json(['message'=>"Uspesno ste dodali sobu!"], 201);
        }
        catch(\Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'Greska sa dodavanjem sobe', 'message' => $ex->getMessage()], 500);
        }
    }

    public function show(string $id)
    {
        $room = Room::with(['roomType', 'facilities','images'])->findOrFail($id);
        return response()->json(['room' =>$room]);

    }

    public function edit(string $id)
    {
        $room = Room::findOrFail($id);
    }

    public function update(UpdateRoomRequest $request, string $id)
    {
        $room = Room::findOrFail($id);
        $validatedData = $request->validated();
        try {
            DB::beginTransaction();
            if ($request->hasFile('mainImg')) {
                Storage::disk('public')->delete($room->main_img); // Brišemo staru sliku
                $mainImgPath = $request->file('mainImg')->store('rooms', 'public');
                $validatedData['main_img'] = $mainImgPath;
            }

            $room->update($validatedData);
            if ($request->hasFile('otherImages')) {
                // Brišemo stare slike
                foreach ($room->images as $image) {
                    Storage::disk('public')->delete($image->path);
                    $image->delete();
                }

                // Dodajemo nove slike
                $idsImage = [];
                foreach ($request->file('otherImages') as $image) {
                    $path = $image->store('rooms', 'public');
                    $imageModel = Image::create(['path' => $path]);
                    $idsImage[] = $imageModel->id;
                }

                $room->images()->sync($idsImage);
            }
            if ($request->has('facilities')) {
                $room->facilities()->sync($request->input('facilities'));
            }

            DB::commit();
            return response()->json(['message' => "Soba uspešno izmenjena!"], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['error' => 'Greška prilikom ažuriranja sobe', 'message' => $ex->getMessage()], 500);
        }
    }


    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $room = Room::findOrFail($id);

            if ($room->main_img) {
                Storage::disk('public')->delete($room->main_img);
            }

            foreach ($room->images as $image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }

            $room->delete();

            DB::commit();
            return response()->json(['message' => "Soba uspešno obrisana!"], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['error' => 'Greška prilikom brisanja sobe', 'message' => $ex->getMessage()], 500);
        }
    }

}
