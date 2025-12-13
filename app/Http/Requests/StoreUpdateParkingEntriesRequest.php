<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateParkingEntriesRequest extends FormRequest
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
            'client_id' => 'nullable|exists:clients,id',
            'plate' => 'required|string',
            'model' => 'nullable|string',
            'color' => 'nullable|string',
            'spot_id' => 'required|exists:parking_spots,id',
            'type_entry' => 'nullable|string',
            'entered_at' => 'date_format:Y-m-d H:i:s',
            'left_at' => 'nullable|date_format:Y-m-d H:i:s|after:entered_at',
            'price' => 'nullable|numeric|min:0',
            'status' => 'string',
            'created_by' => 'nullable|integer',
        ];
    }
}

