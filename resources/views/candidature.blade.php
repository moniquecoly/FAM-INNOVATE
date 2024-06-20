<!-- resources/views/candidature.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Formulaire de Candidature</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('candidature') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                @error('prenom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cv">CV (PDF, DOC, DOCX)</label>
                <input type="file" class="form-control-file @error('cv') is-invalid @enderror" id="cv" name="cv" required>
                @error('cv')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="societe">Nom de la société</label>
                <input type="text" class="form-control @error('societe') is-invalid @enderror" id="societe" name="societe" value="{{ old('societe') }}" required>
                @error('societe')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="numero">Numéro de téléphone</label>
                <input type="text" class="form-control @error('numero') is-invalid @enderror" id="numero" name="numero" value="{{ old('numero') }}" required>
                @error('numero')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="indicatif">Indicatif téléphonique</label>
                <input type="text" class="form-control @error('indicatif') is-invalid @enderror" id="indicatif" name="indicatif" value="{{ old('indicatif') }}" required>
                @error('indicatif')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Soumettre Candidature</button>
        </form>
    </div>
@endsection
