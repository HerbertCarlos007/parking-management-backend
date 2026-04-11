<?php

namespace App\Modules\Client\Requests;

use App\Modules\Client\DTOs\UpdateClientDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'name' => 'sometimes|string',
            'phone' => 'sometimes|string',
            'email' => 'sometimes|email',
            'document_number' => 'sometimes|string',
            'plate' => 'sometimes|string',
            'car_brand' => 'sometimes|string',
            'color' => 'sometimes|string',
        ];
    }

    public function toDTO(): UpdateClientDTO
    {
        return new UpdateClientDTO(
            name: $this->validated('name'),
            email: $this->validated('email'),
            phone: $this->validated('phone'),
            document_number: $this->validated('document_number'),
            plate: $this->validated('plate'),
            car_brand: $this->validated('car_brand'),
            color: $this->validated('color'),
        );
    }
}
