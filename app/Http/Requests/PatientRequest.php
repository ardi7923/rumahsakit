<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            "nik"     => "required|unique:patients,nik,". $this->nik_old .",nik",
            "name"    => "required",
            "gender"  => "required",
            "address" => "required",
            "phone"   => "required",
            "room"    => "required",
            "status"  => "required"
        ];
    }
}
