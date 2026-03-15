<?php

namespace App\Http\Controllers\Admin\PPID;

use App\Http\Controllers\Controller;
use App\Models\PpidKategori;
use App\Models\PpidSubKategori;
use App\Models\PpidKonten;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Daftar semua kategori di admin.
     */
    public function index()
    {
        $kategoris = PpidKategori::withCount(['konten' => function ($q) {
            $q->where('is_active', true);
        }])->get();

        return view('admin.ppid.kategori.index', compact('kategoris'));
    }

    // =========================================================
    //  KONTEN (Sub Kategori + Judul + Link) per Kategori
    // =========================================================

    /**
     * Tampilkan daftar konten untuk satu kategori.
     */
    public function show(PpidKategori $kategori)
    {
        $search  = request('search');
        $perPage = request('per_page', 5);

        $query = $kategori->konten()
            ->with('subKategori')
            ->where('is_active', true)
            ->when($search, function ($q) use ($search) {
                $q->where(function ($q2) use ($search) {
                    $q2->where('judul_isi', 'like', "%{$search}%")
                    ->orWhereHas('subKategori', function ($q3) use ($search) {
                        $q3->where('nama_sub_kategori', 'like', "%{$search}%");
                    });
                });
            });

        if ($perPage === 'semua') {
            $kontens = $query->paginate($query->count() ?: 1)->appends(request()->query());
        } else {
            $kontens = $query->paginate((int) $perPage)->appends(request()->query());
        }

        $subKategoris = PpidSubKategori::where('ppid_kategori_id', $kategori->id)
            ->where('is_active', true)
            ->get();

        return view('admin.ppid.kategori.show', compact('kategori', 'kontens', 'subKategoris'));
    }

    /**
     * Simpan konten baru (termasuk sub kategori baru jika ada).
     */
    public function storeKonten(Request $request, PpidKategori $kategori)
    {
        $request->validate([
            'sub_kategori_baru'    => 'nullable|string|max:255',
            'ppid_sub_kategori_id' => 'nullable|exists:ppid_sub_kategori,id',
            'judul_isi'            => 'required|string|max:255',
            'link'                 => 'required|string|max:1000',
        ]);

        $subKategoriId = $request->ppid_sub_kategori_id;

        if (!empty($request->sub_kategori_baru)) {

            $existing = PpidSubKategori::where('ppid_kategori_id', $kategori->id)
                ->whereRaw('LOWER(nama_sub_kategori) = ?', [strtolower(trim($request->sub_kategori_baru))])
                ->first();

            if ($existing) {
                return redirect()
                    ->route('admin.ppid.kategori.show', $kategori)
                    ->withErrors(['sub_kategori_baru' => 'Sub kategori "' . $existing->nama_sub_kategori . '" sudah ada. Pilih dari dropdown di bawah.'])
                    ->withInput()
                    ->with('open_modal', true);
            }

            $subKategori = PpidSubKategori::create([
                'ppid_kategori_id'  => $kategori->id,
                'nama_sub_kategori' => trim($request->sub_kategori_baru),
                'is_active'         => true,
            ]);

            $subKategoriId = $subKategori->id;
        }

        PpidKonten::create([
            'ppid_kategori_id'     => $kategori->id,
            'ppid_sub_kategori_id' => $subKategoriId,
            'judul_isi'            => $request->judul_isi,
            'link'                 => $request->link,
            'tipe_link'            => PpidKonten::detectTipeLink($request->link),
        ]);

        return redirect()
            ->route('admin.ppid.kategori.show', $kategori)
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Tidak lagi digunakan — modal edit ada di halaman show.
     * Redirect ke show agar tidak error jika URL diakses langsung.
     */
    public function editKonten(PpidKategori $kategori, PpidKonten $konten)
    {
        return redirect()->route('admin.ppid.kategori.show', $kategori);
    }

    /**
     * Update konten.
     */
    public function updateKonten(Request $request, PpidKategori $kategori, PpidKonten $konten)
    {
        $request->validate([
            'sub_kategori_baru'    => 'nullable|string|max:255',
            'ppid_sub_kategori_id' => 'nullable|exists:ppid_sub_kategori,id',
            'judul_isi'            => 'required|string|max:255',
            'link'                 => 'required|string|max:1000',
        ]);

        $subKategoriId = $request->ppid_sub_kategori_id;

        if (!empty($request->sub_kategori_baru)) {

            $existing = PpidSubKategori::where('ppid_kategori_id', $kategori->id)
                ->whereRaw('LOWER(nama_sub_kategori) = ?', [strtolower(trim($request->sub_kategori_baru))])
                ->first();

            if ($existing) {
                // Redirect ke show dengan flag buka modal edit yang bersangkutan
                return redirect()
                    ->route('admin.ppid.kategori.show', $kategori)
                    ->withErrors(['sub_kategori_baru' => 'Sub kategori "' . $existing->nama_sub_kategori . '" sudah ada. Pilih dari dropdown.'])
                    ->withInput()
                    ->with('open_edit_modal', $konten->id);
            }

            $subKategori = PpidSubKategori::create([
                'ppid_kategori_id'  => $kategori->id,
                'nama_sub_kategori' => trim($request->sub_kategori_baru),
                'is_active'         => true,
            ]);

            $subKategoriId = $subKategori->id;
        }

        $konten->update([
            'ppid_sub_kategori_id' => $subKategoriId,
            'judul_isi'            => $request->judul_isi,
            'link'                 => $request->link,
            'tipe_link'            => PpidKonten::detectTipeLink($request->link),
        ]);

        return redirect()
            ->route('admin.ppid.kategori.show', $kategori)
            ->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Hapus konten (soft delete via is_active).
     */
    public function destroyKonten(PpidKategori $kategori, PpidKonten $konten)
    {
        $konten->delete();

        return redirect()
            ->route('admin.ppid.kategori.show', $kategori)
            ->with('success', 'Data berhasil dihapus.');
    }

    // =========================================================
    //  SUB KATEGORI management
    // =========================================================

    public function destroySubKategori(PpidKategori $kategori, PpidSubKategori $subKategori)
    {
        $subKategori->update(['is_active' => false]);

        return redirect()
            ->route('admin.ppid.kategori.show', $kategori)
            ->with('success', 'Sub Kategori berhasil dihapus.');
    }

    // =========================================================
    //  API – ambil sub kategori berdasarkan kategori (untuk AJAX)
    // =========================================================
    public function getSubKategori(PpidKategori $kategori)
    {
        $subKategoris = $kategori->subKategori()
            ->where('is_active', true)
            ->get(['id', 'nama_sub_kategori']);

        return response()->json($subKategoris);
    }
}