<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppid_sub_kategori', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ppid_kategori_id')->constrained('ppid_kategori')->onDelete('cascade');
            $table->string('nama_sub_kategori');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppid_sub_kategori');
    }
};