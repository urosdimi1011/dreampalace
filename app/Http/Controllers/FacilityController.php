<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacilityRequest;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        return response()->json(['facility' =>$facilities]);
    }

    public function create()
    {
        //
    }

    public function store(FacilityRequest $request)
    {
        try{
            $name = $request->input('name');
            Facility::create(['name'=>$name]);

            return response()->json(['message'=>"Uspesno ste dodali facility!"], 201);

        }
        catch (\Exception $ex){
            return response()->json(['error' => 'Greska sa dodavanjem facility', 'message' => $ex->getMessage()], 500);
        }
    }

    public function show(string $id)
    {
        $facility = Facility::findOrFail($id);
        return response()->json(['facility' =>$facility]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(FacilityRequest $request, string $id)
    {
        try{
            $facility = Facility::findOrFail($id);
            $validatedData = $request->validated();
            $facility->update($validatedData);

            return response()->json(['message' => "Facility uspešno izmenjen!"]);
        }
        catch(\Exception $ex){
            return response()->json(['error' => 'Greška prilikom ažuriranja facility', 'message' => $ex->getMessage()], 500);
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
