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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titre de la tâche
            $table->text('description')->nullable(); // Description de la tâche
            $table->date('due_date'); // Date d'échéance
            $table->string('status')->default('pending'); // Statut de la tâche (pending, completed, etc.)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // L'utilisateur qui a créé la tâche
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
