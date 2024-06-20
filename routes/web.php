<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeekerController;
use App\Models\Poste;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CandidatureController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;


Route::get('/home', [DashboardController::class, 'index'])->middleware(['auth'])->name('home');
Route::get('/dashboard/candidate', [DashboardController::class, 'candidateDashboard'])->name('candidate.dashboard');
Route::get('/dashboard/recruiter', [DashboardController::class, 'recruiterDashboard'])->name('recruiter.dashboard');

// Routes spécifiques pour les candidats
Route::middleware(['auth', 'role:candidate'])->group(function () {
    Route::get('/candidate/dashboard', [DashboardController::class, 'candidateDashboard'])->name('candidate.dashboard');
});

// Routes spécifiques pour les recruteurs
Route::middleware(['auth', 'role:recruiter'])->group(function () {
    Route::get('/recruiter/dashboard', [DashboardController::class, 'recruiterDashboard'])->name('recruiter.dashboard');
});



Auth::routes();

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/notifications', [NotificationController::class, 'index'])->middleware('auth')->name('notifications');

Route::get('/postes', function () {
    $postes = Poste::all();
    return view('postes', ['postes' => $postes]);
})->middleware(['auth'])->name('postes');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require base_path('routes/auth.php'); // Assurez-vous que le chemin est correct ici

Route::post('/postuler', [JobController::class, 'postuler'])->name('postuler');
Route::get('/postuler', function () {
    return view('postuler');
})->name('formulaire-postuler');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::post('/postuler', [JobController::class, 'postuler'])->name('postuler');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/search', [JobController::class, 'search'])->name('search');
Route::post('/searchcompany', [CompanyController::class, 'search'])->name('searchcompany');
Route::post('/apply', [JobController::class, 'apply'])->name('apply');
Route::post('/applycompany', [CompanyController::class, 'apply'])->name('applycompany');
Route::post('/deletejob', [JobController::class, 'delete'])->name('deletejob');
Route::post('/deletecompany', [CompanyController::class, 'delete'])->name('deletecompany');
Route::post('/updatejob', [JobController::class, 'update'])->name('updatejob');
Route::post('/updatecompany', [CompanyController::class, 'update'])->name('updatecompany');
Route::post('/createjob', [JobController::class, 'create'])->name('createjob');
Route::post('/createcompany', [CompanyController::class, 'create'])->name('createcompany');
Route::post('/uploadcv', [JobController::class, 'uploadcv'])->name('upload');
Route::post('/uploadlogo', [CompanyController::class, 'uploadlogo'])->name('upload');
Route::post('/uploadimage', [JobController::class, 'uploadimage'])->name('upload');
Route::post('/uploadimagecompany', [CompanyController::class, 'uploadimagecompany'])->name('upload');
Route::post('/uploadvideo', [JobController::class, 'uploadvideo'])->name('upload');

Route::post('/uploadpdf', [JobController::class, 'uploadpdf'])->name('upload');
Route::post('/uploadpdfcompany', [CompanyController::class, 'uploadpdfcompany'])->name('upload');
Route::post('/uploadword', [JobController::class, 'uploadword'])->name('upload');
Route::post('/uploadwordcompany', [CompanyController::class, 'uploadwordcompany'])->name('upload');

// Route pour afficher le formulaire de candidature
Route::get('/candidature', function () {
    return view('candidature');
})->middleware(['auth'])->name('candidature');

// Route pour traiter le formulaire de candidature
Route::post('/candidature', [CandidatureController::class, 'soumettre'])->name('candidature.submit');
Route::get('/candidature/{id}', [CandidatureController::class, 'show'])->name('candidature.show');
Route::get('candidatures/create', [CandidatureController::class, 'create'])->name('candidatures.create');
Route::post('candidatures', [CandidatureController::class, 'store'])->name('candidatures.store');
Route::post('soumettre', [CandidatureController::class, 'soumettre'])->name('candidatures.soumettre');
Route::get('candidatures/{id}', [CandidatureController::class, 'show'])->name('candidatures.show');
Route::get('/candidatures', [CandidatureController::class, 'index'])->name('candidature.index');

Route::resource('candidatures', CandidatureController::class)->except(['store', 'show']); // Exclude store and show to avoid duplicate routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
