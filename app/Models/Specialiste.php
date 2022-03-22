<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialiste extends Model   
{
    protected $table = "specialistes";
    protected $primaryKey = "id_spec";
    public $timestamps = false;


    public function intervention()
    {
        return $this->hasMany(Intervention::class,'id_spec','id_spec');
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class,'competences_specialistes' ,'specialiste_id', 'competence_id','id_spec','id_comp');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
