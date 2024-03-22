@extends('template')

@section('contenu') 
<div class="mx-auto" style="max-width: 600px; border: none;">
    <div class="card-body">
        <h2 class="card-title text-center mb-4">Création du ferry</h2>
        <form action="{{ route('ferry.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control @error('nom') is-invalid @enderror"
                name="nom" id="nom" placeholder="Nom du ferry" value="{{ old('nom') }}">
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="longueur" class="form-label">Longueur</label>
                <input type="text" class="form-control @error('longueur') is-invalid @enderror"
                name="longueur" id="longueur" placeholder="Longueur en mètres" value="{{ old('longueur') }}">
                @error('longueur')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="largeur" class="form-label">Largeur</label>
                <input type="text" class="form-control @error('largeur') is-invalid @enderror"
                name="largeur" id="largeur" placeholder="Largeur en mètres" value="{{ old('largeur') }}">
                @error('largeur')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="vitesse" class="form-label">Vitesse</label>
                <input type="text" class="form-control @error('vitesse') is-invalid @enderror"
                name="vitesse" id="vitesse" placeholder="Vitesse en noeuds" value="{{ old('vitesse') }}">
                @error('vitesse')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Télécharger la photo</label>
                <input type="file" class="form-control @error('photo') is-invalid @enderror"
                name="photo" id="photo" placeholder="Choisissez un fichier" value="{{ old('photo') }}">
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <label class="label">Equipements</label>
            <div class="mb-3">
                @foreach ($equipements as $equipement)
                    <input
                    type="checkbox"
                    name="equipement_id[]"
                    value='{{$equipement->id}}'
                    >
                    {{$equipement->libelle}}
                    <br>
                @endforeach
            </div>  

            <div class="text-left">
                <button class="btn btn-primary" type="submit">Envoyer</button>
            </div>
        </form>
    </div>
</div>
@endsection
