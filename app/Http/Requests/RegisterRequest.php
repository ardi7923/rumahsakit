<?php

namespace App\Http\Requests;

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
     * @return array
     */
    public function rules()
    {
        return [
            "ktp_number"      => "required|unique:consult_accounts,ktp_number",
            "name"            => "required",
            "birthday"        => "required|date",
            "gender"          => "required|in:M,F",
            "address"         => "required",
            "phone"           => "required",
            "username"        => "required|unique:users,username",
            "password"        => "required",
            "repeat_password" => "required|same:password"
        ];
    }
}
