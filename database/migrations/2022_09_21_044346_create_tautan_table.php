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
        Schema::create('tautan', function (Blueprint $table) {
            $table->id();
            $table->string('title',250);
            $table->string('url',300);
            $table->string('foto',300);
            $table->integer('jnstautan');
            $table->string('target',300);
            $table->tinyInteger('flag');
            $table->integer('order');
			$table->bigInteger('user_id');
			$table->bigInteger('role_id')->nullable();

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
        Schema::dropIfExists('tautan');
    }
};
