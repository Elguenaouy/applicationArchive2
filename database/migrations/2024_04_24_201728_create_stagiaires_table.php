<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->String("CIN")->unique();
            $table->string("nom");
            $table->string("prenom");
            $table->string("email");
            $table->integer("tel");
            $table->integer("CEF")->nullable();
            $table->boolean("bac")->nullable();
            $table->boolean("diplome")->nullable();
            $table->integer("NbDiplome")->nullable();
            $table->string("imgDiplome")->nullable();
            $table->foreignId("Departement_id")->constrained("departements")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
