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
        Schema::create('category', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('category', 30);
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
        Schema::drop('category');
    }
};
