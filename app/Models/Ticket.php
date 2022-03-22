<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = "tickets";
    protected $primaryKey = "id_tik";
    public $timestamps = false;
    protected $with = ["personnel","typeProbleme"];


    public function personnel(){
        return $this->belongsTo(Personnel::class,'id_pers','id_pers' );
    }

    public function typeProbleme(){
        return $this->belongsTo(TypeProbleme::class,'id_tpb','id_tpb');
    }
    
    public function intervention(){
        return $this->belongsTo(Intervention::class,"id_inter","id_inter");
    }
}
