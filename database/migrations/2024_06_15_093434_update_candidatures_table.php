<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCandidaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidatures', function (Blueprint $table) {
            // Ajouter la colonne user_id comme clé étrangère
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Ajouter les nouvelles colonnes
            $table->string('societe')->after('email');
            $table->string('numero')->after('societe');
            $table->string('indicatif')->after('numero');
            $table->string('cv')->after('indicatif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidatures', function (Blueprint $table) {
            // Supprimer la colonne user_id si nécessaire
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            // Supprimer les nouvelles colonnes
            $table->dropColumn('societe');
            $table->dropColumn('numero');
            $table->dropColumn('indicatif');
            $table->dropColumn('cv');
        });
    }
}
