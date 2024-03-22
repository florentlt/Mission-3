@extends('template')

@section('contenu')
<div class="row justify-content-center align-items-center" style="height: 80vh;">
    <div class="col-md-8 text-center">
        <h1 class="text-primary display-2 mb-4" style="font-weight: normal;">Les ferrys</h1>
        @if(session()->has('info'))
        <div class="alert alert-info-dismissible fade show js-alert" role="alert">
            <strong> {{session('info')}}</strong>
        </div>
        @endif

        <a href="{{ route('ferry.create') }}" class="btn btn-primary mt-4 mb-5">Ajouter un ferry</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th class="table-primary" scope="col">Nom</th>
                    <th class="table-primary" scope="col"></th>
                    <th class="table-primary" scope="col"></th>
                </tr>
            </thead>
            @foreach($ferrys as $ferry)
            <tbody>
                <tr>
                    <td scope="row">{{$ferry->nom}}</td>
                    <td><a button type="button" class="btn btn-success" href="{{route('ferry.show',$ferry->id)}}">Voir</a></button></td>
                    <td>
                        <form action="{{route('ferry.destroy',$ferry->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        
        <a href="{{ route('pdf') }}" class="btn btn-outline-primary mt-4">générer le pdf</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <button class="btn btn-warning mt-4" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </button>
    </div>
</div>
@endsection
