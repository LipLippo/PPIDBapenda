<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidKategori extends Model
{
    use HasFactory;

    protected $table = 'ppid_kategori';

    protected $fillable = [
        'nama_kategori',
        'slug',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relasi ke sub kategori
    public function subKategori()
    {
        return $this->hasMany(PpidSubKategori::class, 'ppid_kategori_id');
    }

    // Relasi ke konten
    public function konten()
    {
        return $this->hasMany(PpidKonten::class, 'ppid_kategori_id');
    }

    // Hitung total dokumen
    public function getTotalDokumenAttribute(): int
    {
        return $this->konten()->where('is_active', true)->count();
    }
}