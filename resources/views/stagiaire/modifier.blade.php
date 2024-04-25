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
 
   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">modifier les information de Stagiaire</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('modifer',['id' => $stg->id])}}">
                    @csrf
                    @method("POST")

                        <div class="row mb-3">
                            <label for="CIN" class="col-md-4 col-form-label text-md-end">CIN :</label>

                            <div class="col-md-6">
                                <input id="CIn" value="{{ $stg->CIN }}" type="text" class="form-control" name="CIN" required>
                            </div>
                        </div>

                         

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">NOM :</label>

                            <div class="col-md-6">
                                <input id="nom" value="{{ $stg->nom }}" type="text" class="form-control " name="nom" required>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-form-label text-md-end">PRENOM :</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" value="{{ $stg->prenom }}" class="form-control" name="prenom" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">EMAIL :</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{ $stg->email }}" class="form-control" name="email" required >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tel" class="col-md-4 col-form-label text-md-end">Tél :</label>

                            <div class="col-md-6">
                                <input id="tel" type="number" value="{{ $stg->tel }}" class="form-control " name="tel"  >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="CEF" class="col-md-4 col-form-label text-md-end">departement :</label>
                            <select class="form-select form-select-sm"  name="departement" onchange="frm.submit()" style="width: 250px;" aria-label=".form-select-sm example">
                                    <option value="-1">Tous les Stagiaire</option>
                                    @foreach ($dbDepar as $depar)
                                    <option value="{{$depar->id}}"{{$stg->id == $depar->id ? "selected" : "" }}>{{$depar->nomDepartement}}</option> @endforeach 
                                </select>
                            </div>  

                        <div class="row mb-3">
                            <label for="CEF" class="col-md-4 col-form-label text-md-end">CEF :</label>

                            <div class="col-md-6">
                                <input id="CEF" type="number" value="{{ $stg->CEF }}" class="form-control" name="CEF" >
                            </div>
                        </div>




                        <div class="row mb-3">
                            <label for="NbDiplome" class="col-md-4 col-form-label text-md-end">N° Diplome :</label>

                            <div class="col-md-6">
                                <input id="NbDiplome" value="{{ $stg->NbDiplome }}" type="number" class="form-control" name="NbDiplome">
                            </div>
                        </div>

                        <div class="row mb-3">
                        <div class="form-check form-check-inline">
                            Bac :
                        <input class="form-check-input"  type="radio" name="Bac" id="inlineRadio1" value="1"{{$stg->bac==1 ? 'checked': " "}}>
                        <label class="form-check-label" for="inlineRadio1">Oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input"  type="radio" name="Bac" id="inlineRadio2" value="0"{{$stg->bac==0 ? 'checked': " "}}>
                        <label class="form-check-label" for="inlineRadio2">Non</label>
                        </div>
                       
                        </div>

                        <div class="row mb-3">
                        <div class="form-check form-check-inline">
                            Diplome :
                        <input class="form-check-input"  type="radio" name="diplome" id="inlineRadio1" value="1"{{$stg->diplome==1 ? 'checked':' '}}>
                        <label class="form-check-label" for="inlineRadio1">Oui</label>
                        </div>

                        <div class="form-check form-check-inline">
                        <input class="form-check-input"  type="radio" name="diplome" id="inlineRadio2" value="0"{{$stg->bac==0 ? 'checked':""}}>
                        <label class="form-check-label" for="inlineRadio2">Non</label>
                        </div>
                       
                        </div>
                        <div class="row mb-3">
                            <label for="imgDplome"class="col-md-4 col-form-label text-md-end">Image de Diplome :</label>
                        <div class="col-md-6">
                     
                        <input type="file" name="imgDiplome" value="{{$stg->id}}"  class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="return alert('Modifier avec succees!!')" class="btn btn-primary">
                                    {{ __('Register') }}
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
