<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('image_slider', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('img', 300);
            $table->tinyInteger('flag');
            $table->tinyInteger('flag_portal');
            $table->integer('order');
			$table->text('caption');
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
        Schema::dropIfExists('image_slider');
    }
};
