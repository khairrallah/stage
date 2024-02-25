<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('compte_id');
            $table->foreign('compte_id')->references('id')->on('comptes')->onDelete('cascade');
            $table->string('operationlibelle');
            $table->date('operation_date');
            $table->decimal('montant_debit', 8, 2)->nullable();
            $table->decimal('montant_credit', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('operations');
    }
};
