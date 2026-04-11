<?php

namespace App\Modules\User\Requests;

use App\Enums\Role;
use App\Modules\User\DTOs\CreateUserDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone_number' => ['required', 'nullable', 'string'],
            'role' => ['required', 'string'],
            'password' => ['required', 'min:6', 'max:100'],
            'id_company' => ['required', 'integer'],
        ];

    }

    public function toDTO(): CreateUserDTO
    {
        return new CreateUserDTO(
            name: $this->validated('name'),
            email: $this->validated('email'),
            password: $this->validated('password'),
            phone_number: $this->validated('phone_number'),
            role: Role::from($this->validated('role')),
            id_company: $this->validated('id_company')
        );
    }
}
