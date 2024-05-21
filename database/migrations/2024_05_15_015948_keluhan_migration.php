<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KeluhanMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluhan', function(Blueprint $table){
            $table->id();
            $table->string('kode_laporan');
            $table->string('id_mahasiswa');
            $table->string('nama_mahasiswa');
            $table->string('no_telepon');
            $table->text('keluhan');
            $table->enum('status', ['Belum ditanggapi', 'Sudah ditanggapi']);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
