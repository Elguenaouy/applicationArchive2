<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StagiaireController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\StagiaireController::class, 'index'])->name('home');
    

// Route::get("/Stagiaire",[StagiaireController::class,"index"])->name('stg');

//====================Stagiaire======================

Route::get("/bac",[StagiaireController::class,"listebac"])->name('stgbac');

Route::get('/export', [StagiaireController::class,"export"])->name("export");


Route::get("/bacDiplome",[StagiaireController::class,"bacdiplome"])->name('bacdiplome');
Route::get("/diplome",[StagiaireController::class,"listediplome"])->name('stgdiplome');

Route::get("/details/{id}",[StagiaireController::class,"show"])->name("details");
Route::get("/detailsBac/{id}",[StagiaireController::class,"imprimer"])->name("detailsbac");

Route::get("/delete/{id}",[StagiaireController::class,"delete"])->name("deleted");


Route::get("/editer/{id}",[StagiaireController::class,"editer"])->name("charger");

Route::post("/update/{id}",[StagiaireController::class,"update"])->name("modifer");

Route::get('/etudiant/create', [StagiaireController::class,"create"])->name("etudiant.create");
Route::post('/etudiant/store', [StagiaireController::class,"store"])->name("etudiant.store");


//===============users========================

Route::post('/user/store', [StagiaireController::class,"ajouter"])->name("user.store");

Route::get('/user/create', [StagiaireController::class,"createUser"])->name("createUser");
Route::get("/detailsUser/{id}",[StagiaireController::class,"detail"])->name("detailsUser");

Route::get("/supprition/{id}",[StagiaireController::class,"supprimer"])->name("deleteUser");
Route::post("/modification/{id}",[StagiaireController::class,"modifier"])->name("update");
Route::get("/chargement/{id}",[StagiaireController::class,"charge"])->name("charge");

Route::get("/admin",[StagiaireController::class,"listeUser"])->name('admins');
// Route::get("/",[StagiaireController::class,"login"])->name('users');

//============departement================

Route::get("/departement",[StagiaireController::class,"listeDepartement"])->name('departements');


Route::post('/departement/store', [StagiaireController::class,"ajouterDepartement"])->name("departement.store");

Route::get('/departement/create', [StagiaireController::class,"createDepartement"])->name("createdepartement");
});


//===============login=======================



Route::get('admin/dashbord/login',[LoginController::class ,"login"])->name('login');







// Route::post('admin/dashbord/login',[AdminLoginController::class ,"checklogin"])->name('admin.check');
// Route::get('admin/dashbord/register',[AdminRegisterController::class ,"register"])->name('admin.register');
// Route::post('admin/dashbord/register',[AdminRegisterController::class ,"store"])->name('admin.store');


Auth::routes([ 'verify'=> true]);

