<?php

namespace App\Interfaces\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'email' => 'nullable|string|unique:users,email,' . $this->route('id'),
        ];
    }
}
