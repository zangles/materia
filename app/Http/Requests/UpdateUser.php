<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'Nombre' => 'required',
            'Email' => 'required|unique:user,email,'.$user->id,
            'oldPassword' => 'required_without:password',
            'password' => 'required_with:oldPassword',
            'password2' => 'required_with:password|same:password',
        ];
    }
}
