<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDoctorRequest extends FormRequest
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
            "doctor_id"       => "required",
            "username"        => "required",
            "password"        => "required",
            "repeat_password" => "required|same:password"
        ];
    }
}
