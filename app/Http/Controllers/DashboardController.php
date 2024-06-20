<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidature;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Rediriger en fonction du rôle de l'utilisateur
        if (auth()->user()->hasRole('candidate')) {
            return redirect()->route('candidate.dashboard');
        } elseif (auth()->user()->hasRole('recruiter')) {
            return redirect()->route('recruiter.dashboard');
        } else {
            return view('home');
        }
    }

    public function candidateDashboard()
    {
        // Récupérer les données pour le tableau de bord du candidat
        $userId = auth()->user()->id;
        $candidatures = Candidature::where('user_id', $userId)->get();

        return view('dashboard.candidate', compact('candidatures'));
    }

    public function recruiterDashboard()
    {
        // Récupérer les données pour le tableau de bord du recruteur
        $totalCandidatures = Candidature::count();
        $recentCandidatures = Candidature::orderBy('created_at', 'desc')->take(5)->get();
        $totalUsers = User::count();

        return view('dashboard.recruiter', compact('totalCandidatures', 'recentCandidatures', 'totalUsers'));
    }
}

