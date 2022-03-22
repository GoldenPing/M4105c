<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Intervention;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentaireController extends Controller
{
    public function addCommentaire(int $id,Request $req)    
    {
      //  dd(Intervention::find($id)->ticket);

        $req->validate([
            "content_com" => ["required"]
        ]);

        $content_com = $req->content_com;
      
        
        $newComm = new Commentaire();
        $newComm -> content_com	 = $content_com ;
        $newComm->intervention()->associate(Intervention::find($id));
        $newComm -> save();

        $thisTicket = Intervention::find($id)->ticket;
        $thisTicket -> etat_tik ="Traité";
        $thisTicket->save();
      

        return Redirect::route("myInter");

    }
}
