<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Time;
use Illuminate\Http\Request;
use App\Services\ResponseService;
use Auth;

class ScheduleController extends Controller
{
    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }

    /**
     * get schedule doctor for patient
     *
     * @param Request $request
     * @return void
     */
    public function get(Request $request)
    {
        $doctor_id = $request->doctor_id;
        $date      = $request->date;

        $doctor = Doctor::findOrFail($doctor_id);
        $times = Time::all();

        $schedules = Schedule::where(["doctor_id" => $doctor_id, "date" => $date])->count();

        if (!$schedules) {
            foreach ($times as $t) {
                Schedule::create([
                    "doctor_id" => $doctor->id,
                    "date"      => $date,
                    "time"      => $t->time,
                    "status"    => 0
                ]);
            }
        }
        $data = Schedule::where(["doctor_id" => $doctor_id, "date" => $date])->get();

        return $this->response->setCode(200)->setMsg("get schedule successfully")->setData($data)->get();
    }


    public function submission(Request $request){
        $schedule = Schedule::findOrFail($request->schedule_id);

        if($schedule->status != 0){
            return $this->response->setCode(400)->setMsg("schedule already taken")->setErrors("schedule telah terisi")->get();
        }

        $schedule->update([
            "consult_account_id" => Auth::user()->patient_id,
            "status"             => 1
        ]);

        return $this->response->setCode(200)->setMsg("schedule created")->setData($schedule)->get();
    }
}
