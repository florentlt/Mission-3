<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des ferrys</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th {
            border: 1px solid black;
            padding: 10px;
            font-weight: bold;
        }
        td {
            border: 1px solid black;
            padding: 5px;
        }
        img {
            display: block;
            margin: auto;
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .content {
            text-align: left;
        }
        .separator {
            border-top: 1px solid black;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <h1>{{$titre}}</h1>
        <hr class="separator">
        <p><em>Date : {{$date}}</em></p>
    </center>
    @foreach ($ferrys as $ferry)
        <div class="content">
            <h1 class="center">{{$ferry->nom}}</h1>
            <img src="{{ public_path('images/'.$ferry->photo) }}" alt="{{$ferry->nom}}">
            <p><strong>Longueur :</strong> {{$ferry->longueur}} m <br>
               <strong>Largeur :</strong> {{$ferry->largeur}} m <br>
               <strong>Vitesse :</strong> {{$ferry->vitesse}} noeuds
            </p>
            <p><u><strong>Liste des équipements :</strong></u><br>
            <ul>
                @foreach ($ferry->equipements as $equipement)
                    <li>{{$equipement->libelle}}</li>
                @endforeach
            </ul>
            </p>
            <hr class="separator">
        </div>
    @endforeach
</body>
</html>
