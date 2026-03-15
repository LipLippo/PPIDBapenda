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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('isadmin');
            $table->string('titel',250);
            $table->string('titel_english',250)->nullable();
            $table->text('desc');
            $table->text('desc_english')->nullable();
            $table->string('url',100);
            $table->longText('content');
            $table->longText('content_english')->nullable();
            $table->string('fav',200);
            $table->tinyInteger('headline');
            $table->tinyInteger('publish');
            $table->tinyInteger('publish_english')->nullable();
            $table->dateTime('tgl_publish');
            $table->tinyInteger('view');
            $table->text('response');
            $table->integer('hits');
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
        Schema::dropIfExists('posts');
    }
};
