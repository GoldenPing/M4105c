<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $table = "personnels";
    protected $primaryKey = "id_pers";
    public $timestamps = false;


    public function ticket(){
        return $this->hasMany(Ticket::class,"id_pers","id_pers");
    }

 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
