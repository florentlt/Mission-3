@extends('template')

@section('contenu') 
<div class="card">
    <header class="card-header">
        <h2 class="card-header-title mb-4" style="font-size: 32px; font-weight: bold; margin-right: 10px;">{{$ferry->nom}}</h2>
        <div>
            <img src="../images/{{$ferry->photo}}" style="float: left; margin-right: 15px;">
        </div>
    </header>
    <div class="card-content">
        <div class="content">
            <p><strong>Longueur :</strong> {{$ferry->longueur}} m</p>
            <p><strong>Largeur :</strong> {{$ferry->largeur}} m</p>
            <p><strong>Vitesse :</strong> {{$ferry->vitesse}} noeuds</p>
        </div>
    </div>
    <p><strong style="text-decoration: underline;">Liste des équipements :</strong></p>
    <ul>
        @foreach($ferry->equipements as $equipement)
            <li>{{$equipement->libelle}}</li>
        @endforeach
    </ul>
    <div class="d-flex justify-content-center mt-4">
        <a class="btn btn-info" href="{{url()->previous()}}">Retour</a>
    </div>
</div>
@endsection
