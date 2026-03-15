<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppid_kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori'); // Informasi Berkala, dst.
            $table->string('slug')->unique(); // informasi-berkala, dst.
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Seed default 5 kategori
        DB::table('ppid_kategori')->insert([
            ['nama_kategori' => 'Informasi Berkala',       'slug' => 'informasi-berkala',       'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Informasi Setiap Saat',   'slug' => 'informasi-setiap-saat',   'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Informasi Serta Merta',   'slug' => 'informasi-serta-merta',   'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Informasi Dikecualikan',  'slug' => 'informasi-dikecualikan',  'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Pengadaan Barang/Jasa',   'slug' => 'pengadaan-barang-jasa',   'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('ppid_kategori');
    }
};