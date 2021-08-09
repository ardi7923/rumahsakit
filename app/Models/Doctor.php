<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        "created_at",
        "updated_at"
    ];

    public function getImageAttribute()
    {
        return env("APP_URL")."/storage/images/".$this->attributes["image"];
    }
}
