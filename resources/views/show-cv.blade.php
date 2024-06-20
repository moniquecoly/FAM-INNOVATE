<!-- resources/views/show-cv.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h2 class="text-center">Détails de la Candidature</h2>
            </div>
            <div class="card-body bg-light">
                <!-- Affichage des informations de la première version -->
                @if(isset($candidature->nom))
                    <h3 class="card-title">Nom: {{ $candidature->nom }}</h3>
                    <h4 class="card-subtitle mb-2 text-muted">Prénom: {{ $candidature->prenom }}</h4>
                    <p class="card-text"><strong>Email:</strong> {{ $candidature->email }}</p>
                    <p class="card-text"><strong>Société:</strong> {{ $candidature->societe }}</p>
                    <p class="card-text"><strong>Numéro de téléphone:</strong> {{ $candidature->indicatif }} {{ $candidature->numero }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $candidature->description }}</p>
                @else
                    <!-- Affichage des informations de la seconde version -->
                    <h1>{{ $candidature->title }}</h1>
                    <p>{{ $candidature->description }}</p>
                @endif
                <a href="{{ asset('cvs/' . $candidature->cv) }}" class="btn btn-primary" target="_blank">Voir le CV</a>
                <a href="{{ route('candidatures.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
@endsection

