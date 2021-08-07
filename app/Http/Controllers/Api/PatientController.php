<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;

class PatientController extends Controller {

    public function index()
    {
        return response()->json(["message" => "Data Pasien","data" => Patient::all()], 200);
    }
}