<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Candidature;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CandidatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Récupérer tous les utilisateurs existants
        $users = User::all();

        // Boucle sur les utilisateurs pour créer des candidatures de test
        foreach ($users as $user) {
            for ($i = 0; $i < 5; $i++) {
                Candidature::create([
                    'nom' => 'Nom Test ' . ($i + 1),
                    'prenom' => 'Prénom Test ' . ($i + 1),
                    'email' => 'test' . ($i + 1) . '@example.com',
                    'societe' => 'Société Test ' . ($i + 1),
                    'numero' => '123456789',
                    'indicatif' => '+33',
                    'cv' => 'cv_example.pdf',
                    'user_id' => $user->id,
                    'created_at' => Carbon::now()->subDays($i)->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->subDays($i)->format('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
