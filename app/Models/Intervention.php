<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $table = "interventions";
    protected $primaryKey = "id_inter";
    protected $with = ["ticket","specialiste","commentaire"];
    public $timestamps = false;


    public function ticket()
    {
        return $this->hasOne(Ticket::class,'id_inter','id_inter');
    }

    public function commentaire()
    {
        return $this->hasOne(Commentaire::class,'id_inter','id_inter');    
    }

    public function specialiste()
    {
        return $this->belongsTo(Specialiste::class,'id_spec','id_spec');
    }
}   



