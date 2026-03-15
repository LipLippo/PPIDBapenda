<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppid_konten', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ppid_kategori_id')->constrained('ppid_kategori')->onDelete('cascade');
            $table->foreignId('ppid_sub_kategori_id')->nullable()->constrained('ppid_sub_kategori')->onDelete('set null');
            $table->string('judul_isi');
            // Link bisa berupa URL Google Drive, gambar (jpg/jpeg/png/svg/heic), atau PDF
            $table->string('link', 1000);
            $table->enum('tipe_link', ['url', 'image', 'pdf'])->default('url');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppid_konten');
    }
};