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
		Schema::create('galeri', function(Blueprint $table) {
			$table->bigIncrements('id');
            $table->integer('id_album');
			$table->string('foto', 30);
			$table->string('keterangan', 200);
			$table->tinyInteger('flag');
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
		Schema::drop('galeri');
	}
};
