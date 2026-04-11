<?php

namespace App\Modules\Client\Requests;

use App\Modules\Client\DTOs\CreateClientDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'name' => 'string|required',
            'phone' => 'string|required',
            'email' => 'string|required',
            'document_number' => 'string|required',
            'plate' => 'string|required',
            'car_brand' => 'string|required',
            'color' => 'string|required',
        ];
    }

    public function toDTO(): CreateClientDTO
    {
        return new CreateClientDTO(
            name: $this->validated('name'),
            email: $this->validated('email'),
            phone: $this->validated('phone'),
            document_number: $this->validated('document_number'),
            plate: $this->validated('plate'),
            car_brand: $this->validated('car_brand'),
            color: $this->validated('color'),
            id_company: auth()->user()->id_company
        );
    }
}
