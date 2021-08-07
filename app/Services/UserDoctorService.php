<?php

namespace App\Services;

use App\Models\User;
use App\Models\Doctor;

class UserDoctorService {

    public function save($request){

        $doctor = Doctor::findOrFail($request->doctor_id);

        User::create([
            "doctor_id" => $request->doctor_id,
            "name"      => $doctor->name,
            "username"  => $request->username,
            "password"  => bcrypt($request->password),
            "role"      => "doctor"
        ]);
    }

    public function update($request,$params){
        User::findOrFail($params)->update([
            "username" => $request->username,
            "password" => bcrypt($request->password)
        ]);
    }
}