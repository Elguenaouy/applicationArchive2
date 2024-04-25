
@extends('layouts.app')
@section('titre')
<form name="frm" action="{{route('home')}}"   method="POST">
                         @method("get")
                         @csrf  <div style="display: flex; margin-right:0 10px;">     
                        <ul class="navbar-nav mr-auto">
                                <li >
                                <select class="form-select form-select-sm"  name="departement" onchange="frm.submit()" style="width: 250px;" aria-label=".form-select-sm example">
                                    <option value="-1">Tous les Stagiaire</option>
                                    @foreach ($dbDepar as $depar)
                                    <option value="{{$depar->id}}"{{$depart == $depar->id ? "selected" : "" }}>{{$depar->nomDepartement}}</option> @endforeach 
                                </select>
                                </li>
                         </ul>
                                <form class="form-inline my-2 my-lg-0" style="display: flex; margin-left:20;">
                                <input class="form-control mr-sm-2" type="search" name="txtCh" value = "{{isset($rech)? $rech:""}}" placeholder="CIN" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" style="margin: 0 10px;" type="submit">Search</button>
                                </form>
                                </form>
                              
                    </div> 
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
        <a class="dropdown-item" href="{{route('departements')}}"> Liste de departements </a>
        <a class="dropdown-item" href="{{route('createdepartement')}}"> Ajouter un departement </a>
        </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{route('etudiant.create' )}}">Noveau Stagiaire</a>
  </li>
</ul>
  </div>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
  

        <table class="table table-hover">
        <tr>
            <th>CIN</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>E-mail</th>
            <th>Tel</th>
            <th>CEF</th>
            <th>bac</th>
            <th>Diplome</th>
            <th>N° Diplome</th>

            <th>depatement</th>
            <th>Image</th>
            <th>Action</th>

        </tr>
        @forelse ($dbStg as $stg)
        <tr>
            <th>{{$stg->CIN}}</th>
            <th>{{$stg->nom}}</th>
            <th>{{$stg->prenom}}</th>
            <th>{{$stg->email}}</th>
            <th>{{$stg->tel}}</th>
            <th>{{$stg->CEF}}</th>
            <th>{{$stg->bac}}</th>
            <th>{{$stg->diplome}}</th>
            <th>{{$stg->NbDiplome}}</th>
            @foreach ($dbDepar as $depar)
                @if($depar->id==$stg->Departement_id)
                    <th  value ="{{$stg->Departement_id}}">
                
                        {{$depar->nomDepartement}}
                         @break
                   
                </th>     
                @endif
            @endforeach 
            <th><a href="{{ route('details', ['id' => $stg->id]) }}">diplome</a></th>
            <th style="display: flex;"><a href="{{route('details',["id"=>$stg->id, 'delete' => 'supprimer'])}}" class="btn btn-outline-danger">X</a>
            <b>|</b>
            <a href="{{ route('charger', ['id' => $stg->id]) }}" class="btn btn-outline-primary" >M</a></th>

        </tr>
        @empty
        <h3 @style(["color:red"])>BD vide!!!</h3>
        @endforelse
    </table>
  
            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
