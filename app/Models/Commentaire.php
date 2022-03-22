<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = "commentaires";
    protected $primaryKey = "id_com";
    public $timestamps = false;


public function intervention()
{
    return $this->belongsTo(Intervention::class,"id_inter","id_inter");
}

    
}


