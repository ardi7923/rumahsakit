<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class AccountConsultationRequest extends FormRequest
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
            "ktp_number"      => ["required", Rule::unique('consult_accounts')->ignore($this->ktp_number_old,'ktp_number')],
            "name"            => "required",
            "birthday"        => "required",
            "gender"          => "required|in:M,F",
            "address"         => "required",
            "phone"           => "required",
            "username"        => ["required", Rule::unique('users')->ignore($this->username_old,'username')],
            "password"        => "required",
            "repeat_password" => "same:password"

        ];
    }
}
