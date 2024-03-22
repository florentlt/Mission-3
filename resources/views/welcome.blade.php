@extends('template')
@section('contenu')

    <div class="row justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-md-8 text-center">
            <h1 class="text-success display-4" style="font-weight: normal;">Sicily Lines</h1>
            <div id="carouselExampleSlidesOnly" class="carousel slide mt-4" data-bs-ride="carousel" data-bs-interval="4000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/flashDiapo01.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="images/flashDiapo02.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="images/flashDiapo03.jpg" class="d-block w-100">
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('register') }}" class="btn btn-primary me-2">S'inscrire</a>
                <a href="{{ route('ferry.index') }}" class="btn btn-outline-success">Voir les bateaux</a>
            </div>
        </div>
    </div>

@endsection
