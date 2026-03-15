<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sotk_sejarah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('tahun_awal');
            $table->integer('tahun_akhir');
            $table->string('photo');
            $table->integer('flag');
            $table->integer('user_id');
            $table->integer('role_id');
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
        Schema::dropIfExists('sotk_sejarah');
    }
};
