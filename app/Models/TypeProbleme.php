<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProbleme extends Model
{
    protected $table = "type_problemes";
    protected $primaryKey = "id_tpb";
    public $timestamps = false;


    public function ticket()
    {
        return $this->hasMany(Ticket::class,"id_tik","id_tpb");
    }
}
