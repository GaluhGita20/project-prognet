<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrxBungasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_bungas', function (Blueprint $table) {
            $table->id();
            $table->integer('bulan');
            $table->year('tahun');
            $table->unsignedBiginteger('nasabah_id')->unsignedBiginteger();
            $table->foreign('nasabah_id')->references('id')->on('nasabahs')->onDelete('cascade');
            $table->double('nominal_bunga');
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
        Schema::dropIfExists('trx_bungas');
    }
}
