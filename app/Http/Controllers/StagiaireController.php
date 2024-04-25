<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StagiaireController extends Controller
{
    // public function index(){
    //     return view('etudiant.accueil');
    // }
    public function listebac(request $req)
    {
        $rech =$req->input("txtCh");
        $dbDepar = DB::table("departements")->get();
        $dbStgbac = DB::table("stagiaires")->where("bac",'=',1);
        $depart = -1;
        if($req->input('departement')!== null && $req->input('departement')!==-1){
            $depart=$req->input('departement');
            $dbStgbac = DB::table("stagiaires")->where("bac",'=',1)->where("departement_id",$depart);
            if($rech !== null){
                $dbStgbac = DB::table("stagiaires")->where("bac",'=',1)->where("departement_id",$depart)->Where("CEF","like","%$rech%");
                
            };
           
        };
     if($req->input('departement')== -1 ){
        $dbStgbac = DB::table("stagiaires")->where("bac",1)->where("CEF","like","%$rech%");
           
        
        };
    //    if($rech !== null){
    //         $dbStg=DB::table("stagiaires")->Where("CIN","like","%$rech%")->get();
           
    //     };
        return view("stagiaire.StgBac",["dbDepar"=>$dbDepar,"dbStgbac"=>$dbStgbac->get(),"depart"=>$depart,"rech"=>$rech]);
        
    }
    public function index(request $req)
    {
       
        $rech =$req->input("txtCh");
        $dbDepar = DB::table("departements")->get();
        $dbStg = DB::table("stagiaires");
        $depart = -1;
        if($req->input('departement')!== null && $req->input('departement')!==-1){
            $depart=$req->input('departement');
            $dbStg=DB::table("stagiaires")->where("departement_id",$depart);
            if($rech !== null){
                $dbStg=DB::table("stagiaires") ->where("departement_id",$depart)->Where("CIN","like","%$rech%");
                
            };
           
        };
     if($req->input('departement')== -1 ){
            $dbStg=DB::table("stagiaires")->where("CIN","like","%$rech%");
           
        
        };
    //    if($rech !== null){
    //         $dbStg=DB::table("stagiaires")->Where("CIN","like","%$rech%")->get();
           
    //     };
        return view("home",["dbDepar"=>$dbDepar,"dbStg"=>$dbStg->get(),"depart"=>$depart,"rech"=>$rech]);
        
    }

    public function bacdiplome(request $req)
    {
        $rech =$req->input("txtCh");
        $dbDepar = DB::table("departements")->get();
        $dbStg = DB::table("stagiaires")->where("bac",1)->where("imgDiplome","!=",null);
        $depart = -1;
        if($req->input('departement')!== null && $req->input('departement')!==-1){
            $depart=$req->input('departement');
            $dbStg = DB::table("stagiaires")->where("bac",1)->where("imgDiplome","!=",null)->where("departement_id",$depart);
            if($rech !== null){
                $dbStg = DB::table("stagiaires")->where("bac",1)->where("imgDiplome","!=",null)->where("departement_id",$depart)->Where("CIN","like","%$rech%");
                
            };
           
        };
     if($req->input('departement')== -1 ){
        $dbStg = DB::table("stagiaires")->where("bac",1)->where("imgDiplome","!=",null)->where("CIN","like","%$rech%");
           
        
        };
    //    if($rech !== null){
    //         $dbStg=DB::table("stagiaires")->Where("CIN","like","%$rech%")->get();
           
    //     };
        return view("stagiaire.diplomebac",["dbDepar"=>$dbDepar,"dbStg"=>$dbStg->get(),"depart"=>$depart,"rech"=>$rech]);
        
    }

    public function listediplome(request $req)
    {
        $rech =$req->input("txtCh");
        $dbDepar = DB::table("departements")->get();
        $dbStgDiplom = DB::table("stagiaires")->where("imgDiplome","!=", null);
        $depart = -1;
        if($req->input('departement')!== null && $req->input('departement')!==-1){
            $depart=$req->input('departement');
            $dbStgDiplom = DB::table("stagiaires")->where("imgDiplome","!=",null)->where("departement_id",$depart);
            if($rech !== null){
                $dbStgDiplom = DB::table("stagiaires")->where("imgDiplome","!=",null)->where("departement_id",$depart)->Where("CIN","like","%$rech%");
                
            };
           
        };
     if($req->input('departement')== -1 ){
        $dbStgDiplom = DB::table("stagiaires")->where("imgDiplome","!=",null)->where("CIN","like","%$rech%");
           
        
        };
    //    if($rech !== null){
    //         $dbStg=DB::table("stagiaires")->Where("CIN","like","%$rech%")->get();
           
    //     };
        return view("stagiaire.StgDipome",["dbDepar"=>$dbDepar,"dbStgDiplom"=>$dbStgDiplom->get(),"depart"=>$depart,"rech"=>$rech]);
        
    }
    public function create()  {
        return view("stagiaire.create",["dbDepar"=>DB::table("departements")->get()]);
   
    }
    public function store(request $req){
        $dpr = new Stagiaire();    
             $dpr->CIN=$req->CIN;
            $dpr->nom=$req->nom;
            $dpr->prenom=$req->prenom;
            $dpr->email=$req->email;
            $dpr->tel=$req->tel;
            $dpr->CEF=$req->CEF;
            $dpr->bac=$req->Bac;
            $dpr->diplome=$req->diplome;
            $dpr->NbDiplome=$req->NbDiplome;
            $dpr->departement_id=$req->departement_id;
            $path=null;
            if ($req->hasFile('img') && $req->File('img')->isValid()) {
                $ext=$req->img->extension();
                $nomF="Img_".now()->valueOf().".".$ext;
                
                $path=$req->img->storeAs("images",$nomF,"public");
               
        }
        $dpr->imgDiplome=$path;
    
        
       
        $etat =$dpr->save();
        $message="Ajouter avec succès";
        $alert="alert-success";

        if(!$etat){
            $message="erreur de modification";
            $alert="alert-danger";
        }
        session()->flash("status",$message);
        session()->put("alert",$alert);
        return redirect()->route("home");
    }
    public function show(string $id){
        $stgDitail=DB::table("stagiaires")->where("id",$id)->first();
        return view("stagiaire.imgDiplome",["stgDitail"=>$stgDitail]);
    }
    public function delete(string $id){
        DB::table("stagiaires")->where("id",$id)->delete();
        return redirect()->route("home");
    }

    public function editer(string $id){
        $stg=DB::table("stagiaires")->where("id",$id)->first();
        return view("stagiaire.modifier",["stg"=>$stg,"dbDepar"=>DB::table("departements")->get()]);
    }
    public function update(Request $request,$id){
         $path=null;
            if ($request->hasFile('img') && $request->File('img')->isValid()) {
                $ext=$request->img->extension();
                $nomF="Img_".now()->valueOf().".".$ext;
                $path=$request->img->storeAs("images",$nomF,"public");
        }
        $etat=DB::table("stagiaires")->where("id",$id)->update([
            "CIN"=>$request->input("CIN"),
            "nom"=>$request->input("nom"),
            "prenom"=>$request->input("prenom"),
            "email"=>$request->input("email"),
            "tel"=>$request->input("tel"),
            "CEF"=>$request->input("CEF"),
            "bac"=>$request->input("Bac"),
            "diplome"=>$request->input("diplome"),
            "NbDIplome"=>$request->input("NbDiplome"),
            "imgDiplome"=>$path
           
        ]);
        
        $message="Modifier avec succès";
        $alert="alert-success";

        if(!$etat){
            $message="erreur de modification";
            $alert="alert-danger";
        }
        session()->flash("status",$message);
        session()->put("alert",$alert);
        return redirect()->route("home");

    }
    
   
   
    
    public function listeUser(request $req){
        $users=DB::table("users")->get();
        $txtCher=$req->input('txtCh');
        if (isset($txtCher)){
             $users = DB::table("users")->where("name","like","%$txtCher%");
        }
       
        return  view("user.listeUser",["users"=>$users]);

    }

    public function createUser()  {
        return view("user.ajouterUser");
   
    }
    public function ajouter(request $req){
        $us = new User();    
             $us->name=$req->name;
             $us->email=$req->email;
             $us->password=$req->password;
          
    // }
        
        // $dpr->save();
        $us->save();
        
        return redirect()->route("admins");
    }
    public function detail(string $id){
        $userDitail=DB::table("users")->where("id",$id)->first();
        return view("user.detailUser",["userDitail"=>$userDitail]);
    }
    public function supprimer(string $id){
        DB::table("users")->where("id",$id)->delete();
        return redirect()->route("admins");
    }

    public function charge(string $id){
        $user=DB::table("users")->where("id",$id)->first();
        return view("user.modifierUser",["user"=>$user]);
    }
    public function modifier(Request $request,$id){
    
       DB::table("users")->where("id",$id)->update([
            "name"=>$request->input("name"),
            "password"=>$request->input("password"),
            "email"=>$request->input("email")
            ]);
       
        return redirect()->route("admins");

    }
   
    public function imprimer(string $id){
        $dbDepar = DB::table("departements")->get();
        $stg=DB::table("stagiaires")->where("bac",1)->where("id",$id)->first();
        $date=now();
        return view("stagiaire.imprimerBac",["stg"=>$stg,"dbDepar"=>$dbDepar,"date"=>$date]);
    }



    public function listeDepartement(request $req){
        $departement=DB::table("departements")->get();
        $txtCher=$req->input('txtCh');
        if (isset($txtCher)){
             $departement = DB::table("departements")->where("nomDepartement","like","%txtCh%")->get();
        }
       
        return  view("departement.listeDepartement",["departement"=>$departement]);

    }

    public function createDepartement()  {
        return view("departement.ajouterDepartement");
   
    }
    public function  ajouterDepartement(request $req){
        $us = new User();    
             $us->id=$req->id;
             $us->nomDepartement=$req->nomDepartement;
             $us->idUser=$req->user_id;
          
    // }
        
        // $dpr->save();
        $us->save();
        
        return redirect()->route("departements");
    }





}
