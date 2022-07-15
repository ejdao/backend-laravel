<?php

namespace App\Http\Requests\Security;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class CreateUserRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'role' => ['required', Rule::in([1, 2])],
            'names' => 'required|max:50',
            'lastnames' => 'required|max:50',
            'phonenumber' => 'required|max:20',
            'address' => 'required|max:50',
            'email' => 'required|unique:users|max:50|email',
            'password' => 'required|max:10',
        ];
    }
}
