


@extends('layouts.app') 

@section('content')
 <div class="container">
     <h1>Liste des Postes Disponibles</h1>
     <ul>
        @foreach ($postes as $poste)
            <li>{{ $poste->titre }} - {{ $poste->description }}</li>
        @endforeach
     </ul>
@endsection