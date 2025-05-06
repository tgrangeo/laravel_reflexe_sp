<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('revision_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('categorie');
            $table->string('titre');
            $table->string('chapitre')->nullable();
            $table->longText('contenuHtml')->nullable();
            $table->json('tags')->nullable();
            $table->string('criticite')->nullable();
            $table->string('frequenceUtilisation')->nullable();
            $table->boolean('favorite')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revision_sheets');
    }
};
