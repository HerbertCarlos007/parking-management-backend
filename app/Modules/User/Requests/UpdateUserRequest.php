<?php

namespace App\Modules\User\Requests;

use App\Enums\Role;
use App\Modules\User\DTOs\UpdateUserDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'email', 'max:255'],
            'phone_number' => ['sometimes', 'nullable', 'string'],
            'password' => ['sometimes', 'min:6', 'max:100'],
            'role' => ['sometimes', 'string'],
        ];
    }

    public function toDTO(): UpdateUserDTO
    {
        return new UpdateUserDTO(
            name: $this->validated('name'),
            email: $this->validated('email'),
            password: $this->validated('password'),
            phone_number: $this->validated('phone_number'),
            role: Role::from($this->validated('role')),
        );
    }
}
