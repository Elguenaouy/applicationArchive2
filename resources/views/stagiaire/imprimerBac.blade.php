@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('style.css') }}">

@section('title')
    Gestion Archivage
@endsection
@section('titre')  
<a href="" class="btn btn-primary">imprimer</a>
<a href="{{route("home")}}" class="btn btn-secondary" style="margin: 10px;">Back</a>
@endsection
@section('content')
<!-- 
<div style="height: 550px;">
  <ul class="nav nav-tabs"  style="display: inline-block;" >
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="{{route('home')}}">Tous Les Stagiaires</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{route('bacdiplome')}}">Diplome & Bac</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('stgdiplome')}}">Diplome</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('stgbac' )}}">Bac</a>
  </li>
  <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         Administrateur                      
         </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{route('admins')}}"> Liste des Admin </a>
        <a class="dropdown-item" href=""> Ajouter un Admin </a>
        </div>
    </li><li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         Departement                      
         </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href=""> Liste de departements </a>
        <a class="dropdown-item" href=""> Ajouter un departement </a>
        </div>
    </li>
</ul>
  </div> -->
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
  
    
<div class="card mt-3 border-0">
            <div class="card-body">
              <p> Fés le {{$date}}</p><br>
              <p>  objet : Retrait définitif de l'original du certificat du baccalauréat</p>
              <table>
                <tr>
                    Je suis le stagiaire soussigné :
                </tr>
                <tr >
                    <th>nom et prenom :</th><td>{{$stg->prenom." ".$stg->nom}}</td>
                </tr>
                <tr>
                    <th>filière :</th>@foreach($dbDepar as $depar)
                @if($depar->id==$stg->Departement_id)
                    <td value ="{{$stg->Departement_id}}">
                
                        {{$depar->nomDepartement}}
                         @break
                   
                </td>     
                @endif
            @endforeach
          
                </tr>
                <tr>
                    <th>CEF :</th><td>{{$stg->CEF}}</td>
                </tr>
                <tr>
                    <th>CIN :</th> <td>{{$stg->CIN}}</td>
                </tr>
                <tr>
                    <th>Tel :</th><td>{{$stg->tel}}</td>
                </tr>
              </table><br>
              <p>        J'atteste avoir retiré definitivement mon certificat original de baccalaureat du Centre Détention Générale Formation professionnelle mixte à Fés.</p>
             
                            
               
                
            </div>
        </div>
      
        </div>   
      </div>
    </div>
@endsection