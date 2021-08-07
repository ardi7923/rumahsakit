<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $doctor = Doctor::count();
        $patient = Patient::count();
        $user_doctor = User::where("role","doctor")->count();
        $patients = Patient::orderBy("id","desc")->limit(10)->get();
        return view('pages.admin.dashboard.index',compact("doctor","patient","user_doctor","patients"));
    }
}
