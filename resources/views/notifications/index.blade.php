

@extends('layouts.app')

@section('content')
    <h1>Notifications</h1>
    <ul>
        @foreach ($notifications as $notification)
            <li>{{ $notification->data['message'] ?? 'Nouvelle notification' }}</li>
        @endforeach
    </ul>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h2 class="text-center">Liste des Candidatures</h2>
            </div>
            <div class="card-body bg-light">
                @if ($candidatures->isEmpty())
                    <p class="text-center">Aucune candidature disponible.</p>
                @else
                    <ul class="list-group">
                        @foreach ($candidatures as $candidature)
                            <li class="list-group-item">
                                <a href="{{ route('candidatures.show', $candidature->id) }}">{{ $candidature->nom }} {{ $candidature->prenom }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                <a href="{{ route('candidature.create') }}" class="btn btn-primary mt-3">Soumettre une nouvelle candidature</a>
            </div>
        </div>
    </div>
@endsection