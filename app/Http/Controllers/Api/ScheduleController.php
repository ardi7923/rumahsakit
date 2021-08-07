<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Time;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function get(Request $request){
        $doctor_id = $request->doctor_id;
        $date      = $request->date;

        $doctor = Doctor::findOrFail($doctor_id);
        $times = Time::all();

        $schedules = Schedule::where(["doctor_id" => $doctor_id,"date" => $date])->count();

        if(!$schedules){
        //   return "tes";
            foreach($times as $t){
                Schedule::create([
                    "doctor_id" => $doctor->id,
                    "date"      => $date,
                    "time"      => $t->time,
                    "status"    => 0
                ]);
            }
        }

        return Schedule::where(["doctor_id" => $doctor_id,"date" => $date])->get();
        
    }
}
