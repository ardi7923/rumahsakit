<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ConsultAccount;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $hidden = ["created_at","updated_at"];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function patient(){
        return $this->belongsTo(ConsultAccount::class,"consult_account_id","id");
    }
}
