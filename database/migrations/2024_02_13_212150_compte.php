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
        Schema::create('comptes', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('numcompte')->uniqunique();
        $table->string('typecompte');//enum type maybe
        $table->date('dateouverture');
        $table->decimal('solde', 10, 2);
        $table->date('datevalid');
        $table->unsignedInteger('agence_id'); // Change to unsignedInteger
        // $table->foreign('agence_id')->references('id')->on('agences')->onDelete('cascade');
        $table->unsignedInteger('client_id'); // Change to unsignedInteger
        // $table->foreign('client_id')->references('id')->on('agences')->onDelete('cascade');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
