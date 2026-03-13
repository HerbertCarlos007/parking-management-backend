<?php

namespace App\Modules\User\Requests;

use App\Enums\Role;
use App\Modules\User\DTOs\LoginDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function toDTO(): LoginDTO
    {
        return new LoginDTO(
            email: $this->validated('email'),
            password: $this->validated('password')
        );
    }
}
