<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Services\ResponseService;
use Auth;

class DoctorScheduleController extends Controller
{
    public function get(ResponseService $responseService){
        Schedule::whereDate("date", ">", now())->update([
            "closed" => 1
        ]);
        
        $data = Schedule::where("doctor_id", Auth::user()->doctor_id)->where("consult_account_id","!=",null)->with("patient")->get();
        return $responseService->setCode(200)->setMsg("Schedule For Doctor Active")->setData($data)->get();
    }
}
