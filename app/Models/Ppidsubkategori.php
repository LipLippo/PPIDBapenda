<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidSubKategori extends Model
{
    use HasFactory;

    protected $table = 'ppid_sub_kategori';

    protected $fillable = [
        'ppid_kategori_id',
        'nama_sub_kategori',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relasi ke kategori induk
    public function kategori()
    {
        return $this->belongsTo(PpidKategori::class, 'ppid_kategori_id');
    }

    // Relasi ke konten
    public function konten()
    {
        return $this->hasMany(PpidKonten::class, 'ppid_sub_kategori_id');
    }
}