<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'main_img' => 'nullable|string|max:300',
            'otherImages' => 'nullable|array',
            'otherImages.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sizem2' => 'required|numeric|min:1|max:999',
            'id_room_type' => 'required|exists:room_type,id',
            'max_adults' => 'required|integer|min:1|max:20',
            'max_children' => 'required|integer|min:0|max:10',
            'facilities' => 'array', // Ako šalješ facilities id-eve
            'facilities.*' => 'exists:facility,id',
        ];
    }
}
