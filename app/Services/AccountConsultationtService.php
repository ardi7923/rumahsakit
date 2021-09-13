<?php

namespace App\Services;

use App\Models\ConsultAccount;
use DB;
use App\Models\Doctor;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\Storage;
use File;

class AccountConsultationtService
{
    public function save($request)
    {
        $patient = ConsultAccount::create([
            "ktp_number" => $request->ktp_number,
            "name"       => $request->name,
            "birthday"   => $request->birthday,
            "gender"     => $request->gender,
            "address"    => $request->address,
            "phone"      => $request->phone
        ]);

        User::create([
            "patient_id" => $patient->id,
            "name"      => $request->name,
            "username"  => $request->username,
            "password"  => bcrypt($request->password),
            "role"      => "patient"
        ]);
    }

    public function update($request,$params)
    {
        $user = User::findOrFail($params);

        ConsultAccount::findOrFail($user->patient_id)->update([
            "ktp_number" => $request->ktp_number,
            "name"       => $request->name,
            "birthday"   => $request->birthday,
            "gender"     => $request->gender,
            "address"    => $request->address,
            "phone"      => $request->phone
        ]);

        $user->update([
            "name"      => $request->name,
            "username"  => $request->username,
            "password"  => bcrypt($request->password),
        ]);
    }

    public  function delete($params)
    {
        $id = $params['id']; 
        $user = User::findOrFail($id);
        ConsultAccount::findOrFail($user->patient_id)->delete();
        $user->delete();
    }
}
