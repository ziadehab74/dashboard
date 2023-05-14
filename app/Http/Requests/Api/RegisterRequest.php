<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'gender'=> ['required','in:male,female'],
            'nationality'=>['required', 'string', 'max:255'],
            'status'=>['required','in:married,single'],
        ];
    }
}
