<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Services\ResponseService;

class DoctorConfirmScheduleController extends Controller
{
    public function approve(Request $request,ResponseService $responseService)
    {
        Schedule::find($request->schedule_id)->update([
            "status" => 2
        ]);
        $data = Schedule::find($request->schedule_id);
        return $responseService->setCode(200)->setMsg("Jadwal Berhasil Di konfirmasi")->setData($data)->get();
    }

    public function reject(Request $request,ResponseService $responseService)
    {
        Schedule::find($request->schedule_id)->update([
            "status"             => 0,
            "consult_account_id" => null
        ]);

        $data = Schedule::find($request->schedule_id);
        return $responseService->setCode(200)->setMsg("Jadwal Berhasil Di Tolak")->setData($data)->get();
    }
}
