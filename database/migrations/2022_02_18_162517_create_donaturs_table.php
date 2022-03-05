<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donaturs', function (Blueprint $table) {
            $table->id();
            $table->string('no_sertifikat')->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('no_telepon')->nullable();
            $table->text('alamat')->nullable();
            $table->date('tanggal_indo')->nullable();
            $table->date('tanggal')->nullable();
            $table->bigInteger('nominal')->nullable();
            $table->string('tipe_donasi')->nullable();
            $table->string('program_donasi')->nullable();
            $table->integer('tampil_alamat')->nullable();
            $table->string('id_users')->nullable();       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donaturs');
    }
}
