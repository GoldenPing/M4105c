<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Competence;
use App\Models\Intervention;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;
use App\Models\Personnel;
use App\Models\Specialiste;
use App\Models\Ticket;
use App\Models\TypeProbleme;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;





public function navTesto(){

    


    if(Auth::user()->role =="spec"){
    $ticket_liste = Ticket::whereHas("typeProbleme",function ($query)
    {
        $spec = Auth::user()->specialiste;
        $comp_liste=$spec->competences->pluck("id_comp");
       $query->whereIn('id_tpb',$comp_liste);
    })->get();
   return Inertia::render("testo/testoNav",[
       "ticket_list" => $ticket_liste
   ]);}
   else if(Auth::user()->role =="resp"){
    $stats = array();

    $ttxTik = count(Ticket::all());
    $ttxTPBLogiciel=0;
    $ttxTPBMateriel=0;
    $ttxTPBUser=0;
    $ttxTikNoneInter = 0 ;


    foreach(Ticket::all() as $line){

        if($line -> id_tpb == 1){
            $ttxTPBLogiciel ++;
        }else if ($line -> id_tpb == 2){
            $ttxTPBMateriel ++;
        }else{
            $ttxTPBUser ++ ;
        }

        if($line -> id_inter == null){
            $ttxTikNoneInter ++ ;
        }





    }


    $pourTikNone = $ttxTikNoneInter * 100 / $ttxTik;
    $pourTikNone =round($pourTikNone,2);


    
    // dd($ttxTikNoneInter);
    $stats["ttxTik"] = $ttxTik;
    $stats["ttxTPBLogiciel"] = $ttxTPBLogiciel;
    $stats["ttxTPBMateriel"] = $ttxTPBMateriel;
    $stats["ttxTPBUser"] = $ttxTPBUser;
    $stats["nonAttrib"] = $ttxTikNoneInter;
    $stats["pourTikNone"]=$pourTikNone;

      $yolo =  Intervention::find(1)->specialiste;
   return Inertia::render("testo/testoNav",[
                                            "stats" => $stats,
                                            "ticket_all" => Ticket::all(),
                                            "specs_list" => Specialiste::all(),
                                            "inter_list" => Intervention::all()] );
   }
   else {
       // dd(Auth::user()->personel->ticket);

       return Inertia::render("testo/testoNav",
                                                ["myTicket_list" => Auth::user()->personel->ticket,
                                                "tpb_list" => TypeProbleme::All() ]
   );
   }
}

public function personelTikTesto(){

    dump(Personnel::find(1)->ticket);


    /*return Inertia::render("testo/testoLinkPersonelTik", [

        
    ]);*/
}

public function tikPersonnelTesto(){
    
    dump(Ticket::find(1)->personnel);
}

public function tikTypeTesto(){
    
    dump(TypeProbleme::find(1)->ticket);
}

public function typeTikTesto()
{
    dump(Ticket::find(1)->typeProbleme);
}

public function interTikTesto()
{
    dump(Intervention::find(1)->ticket);
}

public function tikInterTesto()
{
    dump(Ticket::find(1)->intervention);
}

public function interComTesto()
{
    dump(Intervention::find(1)->commentaire);
}

public function comInterTesto()
{
    dump(Commentaire::find(1)->intervention);
}



public function specInterTesto()
{
    dump(Specialiste::find(1)->intervention);
}


public function interSpecTesto(){
    dump(Intervention::find(1)->specialiste);
}

public function skillBillyTesto(){
    dump(Competence::find(1)->specialistes());
}

public function billySkillTesto(){
    dump(Specialiste::find(1)->competences());
}

public function showUserTesto(){
    dump(Auth::user());
}


public function showInterTesto(){


    
    $ticket_liste = Ticket::whereHas("typeProbleme",function ($query)
    {
        $spec = Auth::user()->specialiste;
        $comp_liste=$spec->competences->pluck("id_comp");
       $query->whereIn('id_tpb',$comp_liste);
    })->get();

  
    dd($ticket_liste);
}

}
