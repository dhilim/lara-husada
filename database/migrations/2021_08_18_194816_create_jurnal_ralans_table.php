<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalRalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_ralans', function (Blueprint $table) {
            $table->id();
            $table->date('register_date');
            $table->integer('register_id');
            $table->string('pasien_rm');
            $table->string('unit_id');
            $table->string('dr_id')->nullable();
            $table->integer('queue')->nullable();
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
        Schema::dropIfExists('jurnal_ralans');
    }
}
