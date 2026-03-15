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
        Schema::create('video', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('keterangan', 200);
            $table->string('url', 200);
            $table->string('foto', 200);
            $table->tinyInteger('headline');
            $table->tinyInteger('flag');
            $table->tinyInteger('flag_portal');
            $table->integer('order');

			$table->bigInteger('user_id');
			$table->bigInteger('role_id');

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
        Schema::dropIfExists('video');
    }
};
