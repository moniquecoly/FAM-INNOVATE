<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAM_innovate - Welcome</title>
    <!-- Utilisation de Bootstrap pour le style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Styles personnalisés -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5dc; /* Beige */
            color: #333; /* Noir */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .content {
            text-align: center;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: bold; /* Texte en gras */
        }
        p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #ff8f00; /* Orange */
            border-color: #ff8f00; /* Orange */
        }
        .btn-primary:hover {
            background-color: #ffca28; /* Orange clair au survol */
            border-color: #ffca28; /* Orange clair au survol */
        }
    </style>
</head>
<body>
    <div class="content">
        <h1 style="font-size: 4rem;">FAM_innovate</h1> <!-- Gros caractères -->
        <p>Une application web pour la gestion et la valorisation des données d'entretien RH et recruteur.</p>
        <a href="{{ route('postes') }}" class="btn btn-primary btn-lg">Voir les Postes Disponibles</a> <!-- Lien vers les postes disponibles -->
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Point d'accueil -->
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h2 class="card-title">Bienvenue sur FAM_innovate</h2>
                        <p class="card-text">Votre portail de gestion et valorisation des données d'entretien RH et recrutement.</p>
                        <a href="{{ route('postes') }}" class="btn btn-primary">Voir les Postes Disponibles</a>
                    </div>
                </div>

                <!-- Zone de Candidature -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Formulaire de Candidature</h2>
                        <p class="card-text">Soumettez votre candidature dès maintenant.</p>
                        <a href="{{ route('candidature') }}" class="btn btn-primary">Postuler Maintenant</a>
                    </div>
                </div>

                <!-- Zone d'Inscription/Connexion -->
                @auth
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">Bienvenue, {{ Auth::user()->name }}</h2>
                            <p class="card-text">Vous êtes connecté en tant que {{ Auth::user()->role }}</p>
                            <a href="{{ route('logout') }}" class="btn btn-danger">Déconnexion</a>
                        </div>
                    </div>
                @else
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">Connexion</h2>
                            <p class="card-text">Connectez-vous pour accéder à votre compte.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary">Connexion</a>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">Inscription</h2>
                            <p class="card-text">Inscrivez-vous pour créer un compte.</p>
                            <a href="{{ route('register') }}" class="btn btn-success">Inscription</a>
                        </div>
                    </div>
                @endauth

            </div>
        </div>
    </div>
</body>
</html>