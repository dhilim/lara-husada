<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterPelayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_pelayanans', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_in')->nullable();
            $table->timestamp('date_out')->nullable();
            $table->string('pasien_rm');
            $table->string('unit_id');
            $table->string('dr_id')->nullable();
            $table->string('payor_id')->nullable();
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
        Schema::dropIfExists('register_pelayanans');
    }
}
