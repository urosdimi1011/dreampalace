<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:room,name',
            'description' => 'nullable|string|max:2000',
            'mainImg' => 'required',
            'otherImages' => 'required|array',
            'otherImages.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|max:300',
            'sizem2' => 'required|numeric|min:1|max:9999',
            'id_room_type' => 'nullable|exists:room_type,id',
            'max_adults' => 'required|integer|min:1|max:20',
            'max_children' => 'required|integer|min:0|max:10',
            'facilities' => 'array|nullable', // Ako šalješ facilities id-eve
            'facilities.*' => 'exists:facility,id',
        ];
    }
}
