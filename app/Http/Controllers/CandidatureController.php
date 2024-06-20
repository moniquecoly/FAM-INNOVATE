<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\User;
use App\Notifications\CandidatureNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CandidatureController extends Controller
{
    /**
     * Store a newly created candidature in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valider les données de la candidature
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'societe' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'indicatif' => 'required|string|max:5',
            'cv' => 'required|file|max:2048|mimes:pdf,doc,docx',
            'user_id' => 'required|exists:users,id',
        ]);

        // Sauvegarder la candidature
        $candidature = new Candidature();
        $candidature->title = $validatedData['title'];
        $candidature->description = $validatedData['description'];
        $candidature->nom = $validatedData['nom'];
        $candidature->prenom = $validatedData['prenom'];
        $candidature->email = $validatedData['email'];
        $candidature->societe = $validatedData['societe'];
        $candidature->numero = $validatedData['numero'];
        $candidature->indicatif = $validatedData['indicatif'];

        // Gestion du fichier CV
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = time() . '_' . $cv->getClientOriginalName();
            $cv->move(public_path('cvs'), $cvName);
            $candidature->cv = $cvName;
        }

        $candidature->user_id = $validatedData['user_id'];
        $candidature->save();

        // Détails de la notification
        $details = [
            'body' => 'Vous avez une nouvelle candidature.',
            'actionText' => 'Voir la candidature',
            'actionURL' => url('/candidatures/' . $candidature->id),
            'thanks' => 'Merci pour votre attention.',
        ];

        // Récupérer l'utilisateur (ou les utilisateurs) à notifier
        $user = User::find($validatedData['user_id']);

        // Envoyer la notification
        Notification::send($user, new CandidatureNotification($details));

        // Retourner une réponse appropriée
        return redirect()->route('candidature.index')->with('success', 'Candidature créée avec succès.');
    }

    /**
     * Display the specified candidature.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidature = Candidature::findOrFail($id);
        return view('show-cv', compact('candidature'));
    }
}
