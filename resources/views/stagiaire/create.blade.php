@extends('layouts.app')

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
  <!-- @if(session()->has("status"))
        <div class="alert {{ session("alert") }}">
            {{ session("status") }}
    Le(a) stagiaire {{$stg->nom." ".$stg->prenom }}
    </div>
    @endif -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nouveau Stagiaire</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('etudiant.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="CIN" class="col-md-4 col-form-label text-md-end">CIN :</label>

                            <div class="col-md-6">
                                <input id="CIn" type="text" class="form-control @error('CIN') is-invalid @enderror" name="CIN" value="{{ old('CIN') }}" required autocomplete="name" autofocus>

                                @error('CIN')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">NOM :</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom">

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-form-label text-md-end">PRENOM :</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom">

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">EMAIL :</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="new-email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tel" class="col-md-4 col-form-label text-md-end">Tél :</label>

                            <div class="col-md-6">
                                <input id="tel" type="number" class="form-control @error('tel') is-invalid @enderror" name="tel" required autocomplete="new-tel">

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="CEF" class="col-md-4 col-form-label text-md-end">departement :</label>
                            <select class="form-select form-select-sm"  name="departement_id" style="width: 250px;" aria-label=".form-select-sm example">
                                    <option value="-1">Tous les Stagiaire</option>
                                    @foreach ($dbDepar as $depar)
                                    <option value="{{$depar->id}}">{{$depar->nomDepartement}}</option> @endforeach 
                                </select>
                            </div>  

                        <div class="row mb-3">
                            <label for="CEF" class="col-md-4 col-form-label text-md-end">CEF :</label>

                            <div class="col-md-6">
                                <input id="CEF" type="number" class="form-control " name="CEF" required autocomplete="new-CEF">

                            </div>
                        </div>




                        <div class="row mb-3">
                            <label for="NbDiplome" class="col-md-4 col-form-label text-md-end">N° Diplome :</label>

                            <div class="col-md-6">
                                <input id="NbDiplome" type="number" class="form-control" name="NbDiplome" required>

                            </div>
                        </div>

                        <div class="row mb-3">
                        <div class="form-check form-check-inline">
                            Bac :
                        <input class="form-check-input" type="radio" name="Bac" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Bac" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Non</label>
                        </div>
                       
                        </div>

                        <div class="row mb-3">
                        <div class="form-check form-check-inline">
                            Diplome :
                        <input class="form-check-input" type="radio" name="diplome" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Oui</label>
                        </div>

                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="diplome" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Non</label>
                        </div>
                       
                        </div>
                        <div class="row mb-3">
                            <label for="imgDplome" class="col-md-4 col-form-label text-md-end">Image de Diplome :</label>
                        <div class="col-md-6">
                                <input id="imgDiplome" type="file" class="form-control" name="img" >
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="return alert('Ajouter avec succees!!')" class="btn btn-primary">
                                    Ajouter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
