<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Intervention;
use App\Models\Personnel;
use App\Models\Specialiste;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use App\Models\Ticket;
use App\Models\TypeProbleme;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TicketController extends Controller
{
    public function showList(){

        $tickets = Ticket::All();
        foreach($tickets as $line){

            $pers_id= $line -> id_pers;
            $personnel = Personnel::find($pers_id);
            $nom_pers = $personnel -> login_pers;
            $line -> id_pers = $nom_pers;

            // $line -> id_pers = Personnel::find($line -> id_pers) -> login_pers;
            ////////////////////////////////////////////////////////////

            $line -> id_tpb = TypeProbleme::find($line -> id_tpb) -> libelle_tpb;

        }

        return Inertia::render("ticket/ShowTicket",["tickets" => $tickets,"specs"=>Specialiste::All()]);
    }

    public function displayFormTick(){
        return Inertia::render("ticket/FormTick",[
            "testo"=> hash::make("123")
        ]);
    }

    public function displayaddTicket(){
        return Inertia::render("ticket/addTicketView", ["tpb" => TypeProbleme::All()]);
    }


    public function addTicket(Request $req)
    {
        $req->validate([
            "type_prob" => ["required"],
     
            "desc_prob" => ["required", "max:100"],
            "poste_prob" => ["required"],
            "pj"         => ["nullable","file","max:1024" ,"image",],
            "etat_prob"  => ["required"]

        ]);

        $newTicket = new Ticket() ;
        if(!($req->pj ==null)){
        //dd($req->pj);
        $imageName = $req->file("pj")->getClientOriginalName();
        //dd($imageName);
        $path= base_path('public/img');
        $req->pj->move($path,$imageName);
        //dd("its done");
        $newTicket -> path_tik = "img/".$imageName;  
        }
       $id_billy = Auth::user()->personel->id_pers;
        $type_prob = $req->type_prob;
        $prec_prob = $req ->prec_prob;
        $desc_prob= $req->desc_prob;
        $poste_prob= $req ->poste_prob;
  
        $etat_prob = $req -> etat_prob;

       
        $newTicket -> id_pers = $id_billy;
        $newTicket -> date_tik = Carbon::now();
        $newTicket -> precision_tik = $prec_prob;
        $newTicket -> poste_tik = $poste_prob;
        $newTicket -> desc_tik = $desc_prob; 
        $newTicket -> id_tpb =  $type_prob;
        $newTicket -> urgence_tik = $etat_prob;
         

        
        $newTicket -> save();


        return Inertia::render("ticket/confirmSend");
    }

    public function oneTicket(int $id){

        $ticket = Ticket::find($id);
        $id_inter = $ticket -> id_inter;
        $inter = Intervention::find($id_inter);
        $spec = $inter->specialiste;
        // dd($spec);
        return Inertia::render("ticket/oneTicket",["tickets" => $ticket , "inter" => $inter , "spec" => $spec, "specs" => Specialiste::all()]);

        // $ticket = Ticket::find($id);
        // $id_inter = $ticket -> id_inter;
        // $inter = Intervention::find($id_inter);
        // // dd(Ticket::find($id)->with('intervention')->first());
        // return Inertia::render("ticket/priseTicket",["ticket" => $ticket, "inter"=> $inter]);
        
    }

    public function displayCommentaire(int $id){
        $inter = Intervention::find($id);
        $comm = Intervention::find($id)->commentaire;
        $spec_id = $inter -> id_spec;
        $spec = Specialiste::find($spec_id);
        return Inertia::render("commentaire/commentaire",["inter" => $inter,"comm" =>$comm,"spec" => $spec]);
    }

    public function showImg(string $img)
    {
        $path = "dossier_image/".$img;
        return Inertia::render("piece_jointe",$path);
    }
    
    public function commentaire(Request $req){

        $content_com = $req->content_com;
        $id_inter = $req->id_inter;
        
        $newComm = new Commentaire();
        $newComm -> content_com	 = $content_com ;
        $newComm -> id_inter = $id_inter;


        $newComm -> save();

        return Inertia::render("commentaire/commentaire/".$id_inter,["inter" => Intervention::where('id_inter',$id_inter)->with('commentaire')->first()]);
        
    }


    public function priseTicket(int $id)
    {
        $ticket = Ticket::find($id);
        $id_inter = $ticket -> id_inter;
        $inter = Intervention::find($id_inter);
        $id_spec = $inter -> id_spec;
        $spec = Specialiste::find($id_spec);
        $id_emet = $ticket -> id_pers;
        $emet = Personnel::find($id_emet);
        // dd(Ticket::find($id)->with('intervention')->first());
        return Inertia::render("ticket/priseTicket",["ticket" => $ticket, "inter"=> $inter, "spec" => $spec, "emet" => $emet]);
        
    }

    public function redirection(int $id, Request $req){
       



       // dd($req->specialiste);
        $req->validate(
           [ "specialiste" => ['required']]
        );

        
        $newInter = new Intervention();
        
        $newInter->date_inter = Carbon::now();
        $newInter->type_inter = "Attribué par ".Auth::user()->name;
        
        $newInter->specialiste()->associate(Specialiste::find($req->specialiste));
        $newInter->save();

        $newInter->ticket()->save(Ticket::find($id));
        $modifTik = Ticket::find($id);
        $modifTik->etat_tik = "En cours de traitement";
        $modifTik->save();
        
        return Redirect::route('testo');
      
    }


    public function statistiques()
    {
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

        return Inertia::render("ticket/statsView",["stats" => $stats]);

    }

}