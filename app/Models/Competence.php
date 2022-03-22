<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $table = "competences";
    protected $primaryKey = "id_comp";
    public $timestamps = false;

    public function specialistes()
    {
        return $this->belongsToMany(Specialiste::class,'competences_specialistes' ,'competence_id', 'specialiste_id','id_comp','id_spec');
        
    }
}
