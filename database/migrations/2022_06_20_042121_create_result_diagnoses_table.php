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
            $table->string('symptoms');
            $table->string('disease');
            $table->string('cf_roles');
            $table->string('cf_users');
            $table->float('total_cf_role');
            $table->float('result_cbr');
            $table->float('result_cf');
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
