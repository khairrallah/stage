<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('compte_id');
            $table->string('numero')->unique();
            $table->foreign('compte_id')->references('id')->on('comptes')->onDelete('cascade');
            $table->string('nom_beneficiaire');
            $table->decimal('montant', 10, 2);
            $table->date('date_emission');
            $table->boolean('paye')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factures');
    }
};

