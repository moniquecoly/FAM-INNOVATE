

@extends('layouts.app') <!-- Si vous utilisez un layout -->

@section('content')
    <h1>Postuler à un emploi</h1>
    <form action="{{ route('postuler') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <!-- Ajoutez d'autres champs ici -->
        <button type="submit" class="btn btn-primary">Postuler</button>
    </form>
@endsection