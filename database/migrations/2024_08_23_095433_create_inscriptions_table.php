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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('lieu_residence');
            $table->enum('genre', ['Homme', 'Femme']);
            $table->string('mail')->unique();
            $table->string('tel');
            $table->text('raison_org');
            $table->text('competence')->nullable();
            $table->enum('experience', ['oui', 'non']);
            $table->string('confirmation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
