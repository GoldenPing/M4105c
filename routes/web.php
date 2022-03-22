<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\SpecialisteController;
use App\Http\Controllers\TicketController;
use App\Models\Commentaire;
use App\Models\Intervention;
use App\Models\Ticket;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Symfony\Component\Routing\RouterInterface;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SpecialisteController::class,"logBilly"])->name("index");



Route::get("login",[LoginController::class, "displayLogin"])->name("login.view");
Route::post("login",[LoginController::class, "login"])->name("login");



Route::get("addTicket",[TicketController::class,"displayaddTicket"])->name("AddTicketForm");
Route::post("addTicket",[TicketController::class,"addTicket"])->name("AddTicket");

Route::get("TicketList",[TicketController::class,"showList"])->name("ticketList");

Route::get("oneTicket/{id}",[TicketController::class,"oneTicket"])->name("oneTicket");
Route::post("oneTicket/{id}",[TicketController::class,"oneTicket"])->name("oneTicket");

Route::get("redirection/{id}",[TicketController::class, "redirection"])->name("redirection");
Route::post("redirection/{id}",[TicketController::class, "redirection"])->name("rediTik");

Route::get("priseTicket/{id}",[TicketController::class,"priseTicket"])->name("priseEnCharge");

Route::get("ShowPJ/{path}",[TicketController::class,'showImg'])->name("ShowPJ");

Route::get("commentaire/{id}",[TicketController::class, "displayCommentaire"])->name("commentaireShow");
Route::post("commentaire/{id}",[TicketController::class, "displayCommentaire"])->name("commentaireShow");
Route::post("commentaire/{id}",[CommentaireController::class, "addCommentaire"])->name("commentaireAdd");

Route::get('addInter/{id}',[InterventionController::class,"displayIntervention"])->name("AddInter");



Route::get("sendTicket",[TicketController::class,"displayFormTick"])->name("displayFormTicket");



Route::get("testo",[Controller::class,"navTesto"])->name("testo");
Route::get("personelTik",[Controller::class,"personelTikTesto"])->name("personelTik");
Route::get("interventionTik",[Controller::class,"interventionTikTesto"])->name("interventionTik");
Route::get("tikPersonnel",[Controller::class,"tikPersonnelTesto"])->name("tikPersonnel");
Route::get("tikType",[Controller::class,"tikTypeTesto"])->name("tikType");
Route::get("typeTik",[Controller::class,"typeTikTesto"])->name("typeTik");
Route::get("interTik",[Controller::class,"interTikTesto"])->name("interTik");
Route::get("tikInter",[Controller::class,"tikInterTesto"])->name("tikInter");
Route::get("comInter",[Controller::class,"comInterTesto"])->name("comInter");
Route::get("interCom",[Controller::class,"interComTesto"])->name("interCom");
Route::get("specInter",[Controller::class,'specInterTesto'])->name("specInter");
Route::get("interSpec",[Controller::class,'interSpecTesto'])->name("interSpec");
Route::get("skillBilly",[Controller::class,"skillBillyTesto"])->name("skillBilly");
Route::get("billySkill",[Controller::class,"billySkillTesto"])->name("billySkill");
Route::get("showUser",[Controller::class,"showUserTesto"])->name("showUser");
Route::get("showInter",[Controller::class,"showInterTesto"])->name("showInter");



Route::get("homeBilly",[SpecialisteController::class,"logBilly"])->name("homeBilly");
Route::post ("loginBilly",[LoginController::class,"loginBis"])->name("loginBilly");
Route::get("logoutBilly",[LoginController::class,'logoutBilly'])->name("logout");



Route::get('rejetInter/{id}',[InterventionController::class,"rejetInter"])->name("rejetInter");
Route::post('addInter/{id}',[InterventionController::class,"addInter"])->name("doAddInter");
Route::get('myInter',[InterventionController::class,"myInterDisplay"])->name("myInter");

Route::get("stats", [TicketController::class, "statistiques"])->name("stats");


Route::middleware("auth")->group(function(){

    Route::get('navTesto', function() {
        return Inertia::render("navTesto");
    })->name("Testo");

});


