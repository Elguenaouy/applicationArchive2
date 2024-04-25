@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('style.css') }}">

@section('title')
    Gestion Archivage
@endsection
@section('titre')  
@endsection
@section('content')

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
  </div>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
  @if(session()->has("status"))
        <div class="alert {{ session("alert") }}">
            {{ session("status") }}
    Le(a) stagiaire {{$stgDitail->nom." ".$stgDitail->prenom }}
    </div>
    @endif
    
<div class="card mt-3">
            <div class="card-body">
                <img width="800" height="500" src="{{url('storage/'.$stgDitail->imgDiplome) }}"alt="{{$stgDitail->prenom}}">
                            
                @if(isset($_GET["delete"]))
                <form action="{{ route('deleted', ['id' =>$stgDitail->id])}}" method="DELETE">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Supprimer" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce(tte) Stagiare ?')">
                </form>
                @endif
            </div>
        </div>
        </div> 
      </div> 
    </div>
@endsection