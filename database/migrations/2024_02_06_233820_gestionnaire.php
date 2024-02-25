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
        Schema::create('gestionaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gestionairename');
            $table->string('gestionairepost');
            $table->unsignedInteger('agence_id'); // Change to unsignedInteger
            // $table->foreign('agence_id')->references('id')->on('agences')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestionaires');
    }
};
