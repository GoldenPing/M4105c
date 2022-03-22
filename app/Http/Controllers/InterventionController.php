<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\Specialiste;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class InterventionController extends Controller
{
    public function AddInter(int $id,Request $req)
    {
        
        $req->validate([
            "type_inter" => ["required"]
        ]);

       
        
        $date_inter = Carbon::now();
        $type_inter = $req->type_inter;
       
        $thisTicket = Ticket::find($id);

       $newInter= new Intervention();
       $newInter->id_spec = Auth::user()->id;
       $newInter->date_inter= $date_inter;
       $newInter->type_inter= $type_inter;
       $newInter->save();
       $newInter->ticket()->save($thisTicket);
       $thisTicket->etat_tik = "En cours de traitement";
       $thisTicket->save();
       
        return Redirect::route('testo');
       
  
    }


    public function myInterDisplay()
    {
        $myInter =Auth::user()->specialiste->intervention;
        //dd(Intervention::find(2)->specialiste);
       //dd($myInter);
        return Inertia::render("intervention/mesInter",
        [
            "inter_list"=> $myInter,


        ]);
    }

    public function displayIntervention(int $id){
       // dd($id);
        return Inertia::render("intervention/intervention",[
                                "id_ticket" => $id
        ]);
    }

    public function displayCommentaire(int $id){
        return Inertia::render("commentaire/commentaire",["inter" => Ticket::where('id_inter',$id)->with('commentaire')->first()]);
    }


    public function rejetInter(int $id)
    {

    $ticket = Intervention::find($id)->ticket;
    $ticket->intervention()->dissociate();
    $ticket->save();
      Intervention::find($id)->delete();

      return Redirect::route('myInter');
    }
}
