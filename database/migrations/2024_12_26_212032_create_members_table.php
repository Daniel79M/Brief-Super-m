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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenoms");
            $table->enum('sexe', ['M', 'F']);
            $table->date('dateEntrer');
            $table->string('contact')->unique();
            $table->bigInteger('age');
            $table->string("voix", ['Soprano', 'Alto', 'Ténor', 'Basse']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
