@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('style.css') }}">

@section('title')
    Gestion Archivage
@endsection
@section('titre')

@endsection
@section('content') 
 <center>
    <form action="{{route('update', ['id' => $user->id])}}"  method="POST"  >
    @csrf
    @method("POST") 
   
    <table>
    <tr>
            <th>Nom</th>
           <td><input type="text" value="{{$user->name}}"  name="nom"></td>
        </tr>
        <tr>
            <th>mot de passe :</th>
           <td><input type="text" value="{{$user->email}}"  name="pwd"></td>
        </tr>
        <tr>
            <th colspan="2">
                <input type="submit" onclick="return alert('Modifier avec succees!!')" value="Modifier"/>    
            </th>
        </tr>
    </table>
        
    </form></center>
   
   
        
@endsection