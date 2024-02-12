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
        Schema::create('project_technology', function (Blueprint $table) {
            // Sostituisco l'id con la primary key costituita dai campi project_id e techonology_id
            // $table->id();
            // Project foreign key
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            // Technology foreign key
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();
            // Creo la chiave primaria unendo i due campi
            $table->primary(['project_id', 'technology_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
