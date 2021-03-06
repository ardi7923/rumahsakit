<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            "nip"        => "required",
            "name"       => "required",
            "address"    => "required",
            "phone"      => "required",
            "specialist" => "required",
            "image" => "base64image|base64max:2048"
        ];
    }
}
