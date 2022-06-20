<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_diagnoses', function (Blueprint $table) {
            $table->id();
            $table->string('gejala');
            $table->string('penyakit');
            $table->float('total_cf_role');
            $table->float('hasil_cbr');
            $table->float('hasil_cf');
            $table->string('kemungkinan');
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
        Schema::dropIfExists('result_diagnoses');
    }
}
