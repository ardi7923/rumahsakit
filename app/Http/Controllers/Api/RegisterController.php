<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\ConsultAccount;
use App\Models\User;
use DB;
use App\Services\ResponseService;
use Auth;

class RegisterController extends Controller
{
    public function __construct(ResponseService $response){
        $this->response = $response;
    }
    
    public function register(RegisterRequest $request)
    {

        DB::transaction(function () use ($request) {
                $patient =  ConsultAccount::create([
                    "ktp_number" => $request->ktp_number,
                    "name"       => $request->name,
                    "birthday"   => $request->birthday,
                    "gender"     => $request->gender,
                    "address"    => $request->address,
                    "phone"      => $request->phone,
                ]);
                $user = User::create([
                    "name"       => $request->name,
                    "username"   => $request->username,
                    "password"   => bcrypt($request->password),
                    "role"       => "patient",
                    "patient_id" => $patient->id
                ]);


                $token =  $user->createToken('authToken')->plainTextToken;
            $data = [
                "name" => $user->name,
                "role" => $user->role,
                "token" => $token
            ];


        });

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();
            $token =  $user->createToken('authToken')->plainTextToken;
            $data = [
                'name'     => $user->name,
                'role'     => $user->role,
                'token'    => $token
            ];

                return $this->response
                    ->setCode(200)
                    ->setMsg("Register Successfuly")
                    ->setData($data)
                    ->get();
            
        } else {
            return $this->response
                ->setCode(400)
                ->setMsg("Username atau Password salah")
                ->setErrors("Unauthorized")
                ->get();
        }
    }
}
