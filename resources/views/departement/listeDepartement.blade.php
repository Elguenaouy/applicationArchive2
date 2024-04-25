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
            <th>departement</th>
            <th>Administrateur</th>
            <th>action</th>
        </tr>
        @foreach ($departement as $depar)
        <tr>
            <th>{{$depar->id}}</th>
            <th>{{$depar->nomdepartement}}</th>
            <th> @foreach ($user as $us)
                @if($depar->id==$us->user_id)
                    <th  value ="{{$us->user_id}}">
                
                        {{$us->name}}
                         @break
                   
                </th>     
                @endif
            @endforeach 
         </th>
       
        
        @endforeach
    </table>
  
    
@endsection