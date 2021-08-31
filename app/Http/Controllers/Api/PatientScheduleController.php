<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Auth;
use App\Services\ResponseService;

class PatientScheduleController extends Controller
{

    public function get(ResponseService $responseService)
    {
        Schedule::where("date", ">", now())->update([
            "closed" => 1
        ]);
        
        $data = Schedule::where("consult_account_id", Auth::user()->patient_id)->with("doctor")->get();
        return $responseService->setCode(200)->setMsg("Schedule For Patient Active")->setData($data)->get();
    }
}
