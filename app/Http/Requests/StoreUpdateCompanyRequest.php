<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCompanyRequest extends FormRequest
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
            'address' => ['sometimes', 'string', 'max:255'],
            'phone' => ['sometimes', 'string', 'max:20'],
            'email' => ['sometimes', 'required', 'email', 'max:255'],
            'total_spots' => ['sometimes','integer', 'min:1'],
            'grace_period_minutes' => ['sometimes', 'integer', 'min:0'],
            'opening_time' => ['sometimes'],
            'closing_time' => ['sometimes'],
            'hourly_rate' => ['sometimes', 'numeric', 'min:0'],
            'half_hour_rate' => ['nullable', 'numeric', 'min:0'],
            'daily_rate' => ['sometimes', 'numeric', 'min:0'],
            'document_number' => ['string'],
        ];
    }
}
