<?php

namespace App\Http\Controllers\PPID;

use App\Http\Controllers\Controller;
use App\Models\PpidKategori;
use App\Models\PpidSubKategori;
use App\Models\PpidKonten;

class PublicKategoriController extends Controller
{
    /**
     * Halaman publik: menampilkan isi satu kategori.
     * Route: /ppid_bapenda/{slug}
     * Contoh: /ppid_bapenda/informasi-berkala
     */
    public function show(string $slug)
    {
        $kategori = PpidKategori::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Semua kategori untuk sidebar/tab navigasi
        $semuaKategori = PpidKategori::where('is_active', true)->get();

        // Konten dikelompokkan per sub kategori
        // Ambil sub kategori aktif beserta kontennya,
        // lalu FILTER hanya yang punya konten aktif dan REINDEX
        // agar nomor urut di view selalu 1, 2, 3... (bukan ID database)
        $subKategoris = PpidSubKategori::with(['konten' => function ($q) use ($kategori) {
            $q->where('ppid_kategori_id', $kategori->id)
              ->where('is_active', true);
        }])
        ->where('ppid_kategori_id', $kategori->id)
        ->where('is_active', true)
        ->get()
        ->filter(fn($sub) => $sub->konten->count() > 0)
        ->values(); // reindex 0,1,2... agar $index+1 di view = 1,2,3...

        // Konten tanpa sub kategori
        $kontenTanpaSubKategori = PpidKonten::where('ppid_kategori_id', $kategori->id)
            ->whereNull('ppid_sub_kategori_id')
            ->where('is_active', true)
            ->get();

        $totalDokumen = PpidKonten::where('ppid_kategori_id', $kategori->id)
            ->where('is_active', true)
            ->count();

        return view('ppid.kategori.show', compact(
            'kategori',
            'semuaKategori',
            'subKategoris',
            'kontenTanpaSubKategori',
            'totalDokumen'
        ));
    }
}