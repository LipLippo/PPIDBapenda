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
        Schema::create('main_menu', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('title', 40);
            $table->string('title_english', 40)->nullable();
            $table->bigInteger('id_parent');
            $table->integer('jenis_konten');
            $table->longText('konten');
            $table->longText('konten_english')->nullable();
            $table->string('pdf', 40);
            $table->longText('konten1');
            $table->longText('konten1_english')->nullable();
            $table->longText('konten2');
            $table->longText('konten2_english')->nullable();
			$table->string('url', 40);
			$table->string('target', 40);
            $table->tinyInteger('status');
            $table->tinyInteger('status_english')->nullable();
            $table->integer('order');
			$table->bigInteger('user_id');
			$table->bigInteger('role_id');

			$table->dateTime('created_at');
			$table->dateTime('updated_at');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_menu');
    }
};
