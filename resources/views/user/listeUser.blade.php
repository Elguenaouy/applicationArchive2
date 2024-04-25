@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('style.css') }}">

@section('title')
    Gestion Archivage
@endsection
@section('titre')
<form name="frm" action="{{route('home')}}"   method="POST">
                         @method("get")
                         @csrf        
                        <ul class="navbar-nav mr-auto" >
                                <form class="form-inline my-2 my-lg-0" style="display: flex; margin-left:350px;">
                                <input class="form-control mr-sm-2" type="search" name="txtCh" value = "{{isset($rech)? $rech:""}}" placeholder="CIN" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" style="margin: 0 10px;" type="submit">Search</button>
                                </form>
                                </form>  
@endsection
@section('content')
<a  class="nav-link" style="margin: 10px;"  href="{{route('createUser')}}">Noveau Admin</a>
    <table class="table table-hover">
        <tr>

            <th>id</th>
            <th>Nom</th>
            <th>pwd</th>
            <th>action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <th>{{$user->id}}</th>
            <th>{{$user->name}}</th>
            <th>{{$user->email}}</th>
            <th> <form action="{{ route('deleteUser', ['id' =>$user->id])}}" method="DELETE">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="X" class="btn btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce(tte) Admin ?')">
              
            <b>|</b>
            <a href="{{route('charge', ['id' => $user->id])}} " class="btn btn-outline-primary" >M</a></th>  </form>
        </tr>
        
        @endforeach
    </table>
  
    
@endsection