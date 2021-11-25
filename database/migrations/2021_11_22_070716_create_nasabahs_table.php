<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasabahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('alamat', 255)->nullable();
            $table->string('no_ktp', 30);
            $table->string('telepon', 30);
            $table->enum('status_aktif', ['Aktif', 'Nonaktif']);
            // $table->string('foto_nasabah',255);
            $table->double('saldo')->nullable();
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
        Schema::dropIfExists('nasabahs');
    }
}
