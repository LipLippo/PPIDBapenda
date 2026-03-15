<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidKonten extends Model
{
    use HasFactory;

    protected $table = 'ppid_konten';

    protected $fillable = [
        'ppid_kategori_id',
        'ppid_sub_kategori_id',
        'judul_isi',
        'link',
        'tipe_link',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(PpidKategori::class, 'ppid_kategori_id');
    }

    // Relasi ke sub kategori
    public function subKategori()
    {
        return $this->belongsTo(PpidSubKategori::class, 'ppid_sub_kategori_id');
    }

    /**
     * Auto-detect tipe link berdasarkan ekstensi atau URL.
     */
    public static function detectTipeLink(string $link): string
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'svg', 'heic'];
        $extension = strtolower(pathinfo(parse_url($link, PHP_URL_PATH), PATHINFO_EXTENSION));

        if (in_array($extension, $imageExtensions)) {
            return 'image';
        }

        if ($extension === 'pdf') {
            return 'pdf';
        }

        return 'url';
    }
}