<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateParkingSettingsRequest extends FormRequest
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
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'address' => ['sometimes', 'required', 'string', 'max:255'],
            'phone' => ['sometimes', 'required', 'string', 'max:20'],
            'email' => ['sometimes', 'required', 'email', 'max:255'],
            'total_spots' => ['sometimes', 'required', 'integer', 'min:1'],
            'grace_period_minutes' => ['sometimes', 'required', 'integer', 'min:0'],
            'opening_time' => ['sometimes', 'required'],
            'closing_time' => ['sometimes', 'required'],
            'hourly_rate' => ['sometimes', 'required', 'numeric', 'min:0'],
            'half_hour_rate' => ['nullable', 'numeric', 'min:0'],
            'daily_rate' => ['sometimes', 'required', 'numeric', 'min:0'],
        ];
    }
}
