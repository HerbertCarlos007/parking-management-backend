<?php

namespace App\Http\Requests\ParkingEntry;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreParkingEntriesRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'client_id' => ['sometimes', 'nullable', 'exists:clients,id'],
            'plate' => ['sometimes', 'string'],
            'model' => ['sometimes', 'nullable', 'string'],
            'color' => ['sometimes', 'nullable', 'string'],

            'spot_id' => ['sometimes', 'exists:parking_spots,id'],
            'type_entry' => ['sometimes', 'nullable', 'string'],

            'entered_at' => ['sometimes', 'date_format:Y-m-d H:i:s'],
            'left_at' => ['sometimes', 'nullable', 'date_format:Y-m-d H:i:s', 'after:entered_at'],

            'price' => ['sometimes', 'nullable', 'numeric', 'min:0'],
            'status' => ['sometimes', 'string'],
            'created_by' => ['sometimes', 'nullable', 'integer'],
        ];

    }
}
