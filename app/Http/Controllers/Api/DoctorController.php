<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
       return $this->response->setCode(200)->setMsg("Data Doctors")->setData($doctors)->get();
    }
}
