<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Services\ResponseService;

class AuthController extends Controller
{
    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();
            $token =  $user->createToken('authToken')->plainTextToken;
            $data = [
                'username' => $user->username,
                'name'     => $user->name,
                'role'     => $user->role,
                'token'    => $token
            ];

            if($user->role == "doctor" || $user->role == "patient"){
                return $this->response
                ->setCode(200)
                ->setMsg("Login Successfuly")
                ->setData($data)
                ->get();
            }else{
                return $this->response
                ->setCode(403)
                ->setMsg("Pelanggaran hak akses")
                ->setErrors("Forbidden")
                ->get();
            }
            
        } else {
            return $this->response
                ->setCode(400)
                ->setMsg("Username atau Password salah")
                ->setErrors("Unauthorized")
                ->get();
        }
    }

    /**
     * Api for Logout
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
    	$request->user()->tokens()->delete();

    	return $this->response
            			->setCode(200)
            			->setMsg("logout Successfuly")
            			->get();	
    }
}
