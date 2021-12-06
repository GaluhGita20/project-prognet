<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrxSimpanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_simpanans', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggal');
            $table->enum('jenis_trx', ['Simpanan', 'Penarikan', 'Koreksi']);
            $table->unsignedBiginteger('nasabah_id')->unsigned();
            $table->foreign('nasabah_id')->references('id')->on('nasabahs')->onDelete('cascade');
            $table->double('nominal_trx')->nullable();
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
        Schema::dropIfExists('trx_simpanans');
    }
}
