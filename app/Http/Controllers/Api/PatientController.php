<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller {

    public function index(Request $request)
    {
        $patient = Patient::query();

        $q = $request->q;

        if($request->q != null){
            $patient->where("name","like","%".$q."%")
                    ->orWhere("room","like","%".$q."%")
                    ->orWhere("address","like","%".$q."%");
        }


        return response()->json(["message" => "Data Pasien","data" => $patient->get()], 200);
    }
}