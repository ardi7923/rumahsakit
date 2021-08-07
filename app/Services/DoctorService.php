<?php

namespace App\Services;

use DB;
use App\Models\Doctor;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\Storage;
use File;

class DoctorService
{


    public function save($request)
    {
        DB::transaction(function () use ($request) {
            $image      = $request->image;
            $parseImage = replaceStringBase64($image);
            $imageName = $request->nip.'-'.time().'.'.getTypeFileBase64($image);
            $imageFile =  (string) Image::make($parseImage)->encode('data-url');

            Storage::putFileAs('public/images/', $imageFile, $imageName);

            Doctor::create($request->except(["_token","image"]) + ["image" => $imageName]);
        });
    }


    public function delete($params)
    {
        DB::transaction(function () use ($params) {
            $data = Doctor::find((int) $params["id"]);
            File::delete("storage/images/".$data->image);
            $data->delete();
            if(User::where("doctor_id",$params["id"])->count() > 0){
                User::where("doctor_id",$params["id"])->delete();
            }
        });
    }

    public function updateAttachment($request,$id)
    {
        DB::transaction(function () use ($request,$id) {
            $data = Doctor::find($id);
            File::delete("storage/images/".$data->image);
            
            $image      = $request->image;
            $parseImage = replaceStringBase64($image);
            $imageName = $request->nip.'-'.time().'.'.getTypeFileBase64($image);
            $imageFile =  (string) Image::make($parseImage)->encode('data-url');

            Storage::putFileAs('public/images/', $imageFile, $imageName);

            $data->update([
                "image" => $imageName
            ]);
        });

        return  response()->json("berhasil", 200);
    }
}
