{{-- resources/views/admin/ppid/kategori/show.blade.php --}}
@extends('layouts.app')

@section('content')

{{-- Select2 CSS --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/dist/select2-bootstrap4.min.css" rel="stylesheet">

<style>
    .pagination .page-link {
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        padding: 0;
    }
    .btn-batal {
        background-color: #fff;
        border: 1px solid #6c757d;
        color: #6c757d;
    }
    .btn-batal:hover {
        background-color: #6c757d;
        color: #fff !important;
    }
    /* ===== Select2 Custom Styling ===== */
    .select2-container { width: 100% !important; }
    .select2-container--default .select2-selection--single {
        height: 38px !important;
        border: 1px solid #ced4da !important;
        border-radius: 4px !important;
        background-color: #fff !important;
        display: flex !important;
        align-items: center !important;
        padding: 0 !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px !important;
        padding-left: 12px !important;
        padding-right: 34px !important;
        color: #495057 !important;
        font-size: 14px !important;
        display: block !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        white-space: nowrap !important;
        width: 100% !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #6c757d !important;
        font-size: 14px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px !important;
        width: 28px !important;
        right: 4px !important;
        top: 0 !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__clear {
        position: absolute !important;
        right: 28px !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        font-size: 16px !important;
        color: #aaa !important;
        line-height: 1 !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__clear:hover {
        color: #dc3545 !important;
    }
    .select2-container--default.select2-container--focus .select2-selection--single,
    .select2-container--default.select2-container--open .select2-selection--single {
        border-color: #80bdff !important;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25) !important;
        outline: 0 !important;
    }
    .select2-dropdown {
        border: 1px solid #ced4da !important;
        border-radius: 4px !important;
        box-shadow: 0 4px 16px rgba(0,0,0,.12) !important;
        z-index: 99999 !important;
    }
    .select2-container--default .select2-search--dropdown {
        padding: 8px !important;
        background: #f8f9fa !important;
        border-bottom: 1px solid #e9ecef !important;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field {
        border: 1px solid #ced4da !important;
        border-radius: 4px !important;
        padding: 6px 10px !important;
        font-size: 14px !important;
        width: 100% !important;
        outline: none !important;
        box-sizing: border-box !important;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field:focus {
        border-color: #80bdff !important;
        box-shadow: 0 0 0 0.15rem rgba(0,123,255,.2) !important;
    }
    .select2-results__options { max-height: 200px !important; overflow-y: auto !important; }
    .select2-container--default .select2-results__option {
        padding: 9px 12px !important;
        font-size: 14px !important;
        color: #343a40 !important;
        border-bottom: 1px solid #f1f3f5 !important;
    }
    .select2-container--default .select2-results__option:last-child { border-bottom: none !important; }
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #007bff !important;
        color: #fff !important;
    }
    .select2-container--default .select2-results__option[aria-selected=true] {
        background-color: #e8f0fe !important;
        color: #1a56db !important;
        font-weight: 600 !important;
    }
</style>

<div class="container-fluid">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.ppid.kategori.index') }}">Kategori</a></li>
            <li class="breadcrumb-item active">{{ $kategori->nama_kategori }}</li>
        </ol>
    </nav>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Alert Error --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-times-circle mr-1"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <div class="mb-3">
        <button class="btn btn-success" data-toggle="modal" data-target="#modalTambahKonten">
            <i class="fas fa-plus mr-1"></i> Tambah Data
        </button>
    </div>

    {{-- Tabel Konten --}}
    <div class="card shadow-sm">
        <div class="card-header font-weight-bold">
            {{ $kategori->nama_kategori }}
            <span class="badge badge-primary ml-2">{{ $kontens->total() }} Dokumen</span>
        </div>
        <div class="px-3 py-2 border-bottom bg-light">
            <form method="GET"
                action="{{ route('admin.ppid.kategori.show', $kategori) }}"
                class="d-flex align-items-center justify-content-between flex-wrap"
                style="gap:8px;">

                {{-- PER PAGE --}}
                <div class="d-flex align-items-center" style="gap:6px;">
                    <span class="text-muted" style="font-size:13px; white-space:nowrap;">Tampilkan</span>
                    <select name="per_page"
                            class="form-control form-control-sm"
                            style="width:75px; font-size:13px;"
                            onchange="this.form.submit()">
                        @foreach([5,10,20,50] as $opt)
                            <option value="{{ $opt }}" {{ request('per_page',5) == $opt ? 'selected' : '' }}>
                                {{ $opt }}
                            </option>
                        @endforeach
                        <option value="semua" {{ request('per_page') == 'semua' ? 'selected' : '' }}>Semua</option>
                    </select>
                    <span class="text-muted" style="font-size:13px;">data</span>
                </div>

                {{-- SEARCH --}}
                <div class="d-flex align-items-center" style="gap:4px;">
                    <div class="input-group input-group-sm" style="width:250px;">
                        <input type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari sub kategori / judul..."
                            value="{{ request('search') }}"
                            style="font-size:13px;">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" title="Cari">
                                <i class="fas fa-search"></i>
                            </button>
                            @if(request('search'))
                                <a href="{{ route('admin.ppid.kategori.show',$kategori) }}?per_page={{ request('per_page',5) }}"
                                   class="btn btn-outline-danger" title="Reset pencarian">
                                    <i class="fas fa-times"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0" style="table-layout: fixed; width: 100%;">
                <colgroup>
                    <col style="width: 5%;">
                    <col style="width: 20%;">
                    <col style="width: 40%;">
                    <col style="width: 12%;">
                    <col style="width: 23%;">
                </colgroup>
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Sub Kategori</th>
                        <th>Judul Isi</th>
                        <th class="text-center">Link</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kontens as $i => $konten)
                    <tr>
                        <td>{{ $kontens->firstItem() + $i }}</td>
                        <td>{{ $konten->subKategori->nama_sub_kategori ?? '-' }}</td>
                        <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 0;">
                            {{ $konten->judul_isi }}
                        </td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ $konten->link }}" target="_blank" role="button">
                                <i class="fas fa-external-link-alt mr-1"></i> Buka
                            </a>
                        </td>
                        <td class="text-center">
                            {{-- Tombol Edit → buka modal --}}
                            <button type="button"
                                    class="btn btn-primary btn-sm"
                                    data-toggle="modal"
                                    data-target="#modalEditKonten{{ $konten->id }}">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </button>

                            <form action="{{ route('admin.ppid.kategori.konten.destroy', [$kategori, $konten]) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            <i class="fas fa-folder-open mr-1"></i> Belum ada data.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
            <small class="text-muted">
                @if($kontens->total() > 0)
                    Menampilkan {{ $kontens->firstItem() }}–{{ $kontens->lastItem() }}
                    dari {{ $kontens->total() }} data
                @endif
            </small>
            {{ $kontens->links() }}
        </div>
    </div>
</div>

{{-- ============================================================
     MODAL TAMBAH KONTEN
     ============================================================ --}}
<div class="modal fade" id="modalTambahKonten" tabindex="-1"
     role="dialog" aria-labelledby="modalTambahKontenLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.ppid.kategori.konten.store', $kategori) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahKontenLabel">
                        Tambah Data – {{ $kategori->nama_kategori }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @error('sub_kategori_baru')
                        <div class="alert alert-warning py-2">
                            <i class="fas fa-exclamation-triangle mr-1"></i> {{ $message }}
                        </div>
                    @enderror

                    <div class="form-group">
                        <label class="font-weight-bold">
                            Tambah Sub Kategori Baru
                            <small class="text-muted font-weight-normal">(kosongkan jika memilih dari dropdown)</small>
                        </label>
                        <input type="text"
                               name="sub_kategori_baru"
                               class="form-control @error('sub_kategori_baru') is-invalid @enderror"
                               placeholder="Nama sub kategori baru..."
                               id="inputSubKategoriBaru"
                               value="{{ old('sub_kategori_baru') }}">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Pilih Sub Kategori</label>
                        <select name="ppid_sub_kategori_id"
                                class="form-control select2-subkategori"
                                id="selectSubKategori">
                            <option value="">-- Pilih Sub Kategori --</option>
                            @foreach($subKategoris as $sub)
                                <option value="{{ $sub->id }}"
                                    {{ old('ppid_sub_kategori_id') == $sub->id ? 'selected' : '' }}>
                                    {{ $sub->nama_sub_kategori }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Ketik untuk mencari sub kategori yang tersedia.</small>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Judul Isi <span class="text-danger">*</span></label>
                        <input type="text" name="judul_isi" class="form-control"
                               placeholder="Judul dokumen..."
                               value="{{ old('judul_isi') }}" required>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Link <span class="text-danger">*</span></label>
                        <input type="text" name="link" class="form-control"
                               placeholder="https://drive.google.com/..."
                               value="{{ old('link') }}" required>
                        <small class="text-muted">Berupa link Google Drive.</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-batal" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- ============================================================
     MODAL EDIT KONTEN (satu modal per baris)
     ============================================================ --}}
@foreach($kontens as $konten)
<div class="modal fade" id="modalEditKonten{{ $konten->id }}" tabindex="-1"
     role="dialog" aria-labelledby="modalEditKontenLabel{{ $konten->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.ppid.kategori.konten.update', [$kategori, $konten]) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- penanda modal mana yang submit --}}
            <input type="hidden" name="edit_konten_id" value="{{ $konten->id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditKontenLabel{{ $konten->id }}">
                        Edit Data – {{ $kategori->nama_kategori }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{-- Error hanya tampil di modal yang baru submit --}}
                    @if(old('edit_konten_id') == $konten->id && $errors->has('sub_kategori_baru'))
                        <div class="alert alert-warning py-2">
                            <i class="fas fa-exclamation-triangle mr-1"></i> {{ $errors->first('sub_kategori_baru') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="font-weight-bold">
                            Tambah Sub Kategori Baru
                            <small class="text-muted font-weight-normal">(kosongkan jika memilih dari dropdown)</small>
                        </label>
                        <input type="text"
                               name="sub_kategori_baru"
                               class="form-control"
                               placeholder="Nama sub kategori baru..."
                               id="inputSubKategoriBaru{{ $konten->id }}"
                               value="{{ old('edit_konten_id') == $konten->id ? old('sub_kategori_baru') : '' }}">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Pilih Sub Kategori</label>
                        <select name="ppid_sub_kategori_id"
                                class="form-control select2-subkategori-edit"
                                id="selectSubKategoriEdit{{ $konten->id }}"
                                data-konten-id="{{ $konten->id }}">
                            <option value="">-- Pilih Sub Kategori --</option>
                            @foreach($subKategoris as $sub)
                                <option value="{{ $sub->id }}"
                                    {{ (old('edit_konten_id') == $konten->id
                                        ? old('ppid_sub_kategori_id')
                                        : $konten->ppid_sub_kategori_id) == $sub->id ? 'selected' : '' }}>
                                    {{ $sub->nama_sub_kategori }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Ketik untuk mencari sub kategori yang tersedia.</small>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Judul Isi <span class="text-danger">*</span></label>
                        <input type="text" name="judul_isi" class="form-control"
                               placeholder="Judul dokumen..."
                               value="{{ old('edit_konten_id') == $konten->id ? old('judul_isi') : $konten->judul_isi }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Link <span class="text-danger">*</span></label>
                        <input type="text" name="link" class="form-control"
                               placeholder="https://drive.google.com/..."
                               value="{{ old('edit_konten_id') == $konten->id ? old('link') : $konten->link }}"
                               required>
                        <small class="text-muted">Berupa link Google Drive.</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-batal" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

{{-- Select2 JS --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function () {

    // ── MODAL TAMBAH ──────────────────────────────────────────
    $('#modalTambahKonten').on('shown.bs.modal', function () {
        if (!$('.select2-subkategori').data('select2')) {
            $('.select2-subkategori').select2({
                placeholder: '-- Ketik atau pilih sub kategori --',
                allowClear: true,
                dropdownParent: $('#modalTambahKonten'),
                width: 'resolve',
                language: {
                    noResults: function () { return 'Sub kategori tidak ditemukan'; },
                    searching: function () { return 'Mencari...'; }
                }
            });
        }
    });

    $('#modalTambahKonten').on('hidden.bs.modal', function () {
        if ($('.select2-subkategori').data('select2')) {
            $('.select2-subkategori').select2('destroy');
        }
    });

    $('#inputSubKategoriBaru').on('input', function () {
        if (this.value.trim() !== '') {
            if ($('.select2-subkategori').data('select2')) {
                $('.select2-subkategori').val(null).trigger('change');
            } else {
                document.getElementById('selectSubKategori').value = '';
            }
        }
    });

    $('#selectSubKategori').on('change', function () {
        if ($(this).val() !== '') {
            $('#inputSubKategoriBaru').val('');
        }
    });

    @if($errors->has('sub_kategori_baru') && !old('edit_konten_id'))
        $('#modalTambahKonten').modal('show');
    @endif

    // ── MODAL EDIT ────────────────────────────────────────────
    $('[id^="modalEditKonten"]').on('shown.bs.modal', function () {
        var $modal   = $(this);
        var kontenId = $modal.attr('id').replace('modalEditKonten', '');
        var $select  = $('#selectSubKategoriEdit' + kontenId);
        var $input   = $('#inputSubKategoriBaru' + kontenId);

        if (!$select.data('select2')) {
            $select.select2({
                placeholder: '-- Ketik atau pilih sub kategori --',
                allowClear: true,
                dropdownParent: $modal,
                width: 'resolve',
                language: {
                    noResults: function () { return 'Sub kategori tidak ditemukan'; },
                    searching: function () { return 'Mencari...'; }
                }
            });
        }

        $input.off('input.edit').on('input.edit', function () {
            if ($(this).val().trim() !== '') {
                $select.val(null).trigger('change');
            }
        });

        $select.off('change.edit').on('change.edit', function () {
            if ($(this).val() !== '') {
                $input.val('');
            }
        });
    });

    $('[id^="modalEditKonten"]').on('hidden.bs.modal', function () {
        var kontenId = $(this).attr('id').replace('modalEditKonten', '');
        var $select  = $('#selectSubKategoriEdit' + kontenId);
        if ($select.data('select2')) {
            $select.select2('destroy');
        }
    });

    {{-- Auto-buka modal edit: dari withInput (validasi) atau session (dari controller) --}}
    @php
        $openEditId = old('edit_konten_id') ?: session('open_edit_modal');
    @endphp
    @if($openEditId)
        $('#modalEditKonten{{ $openEditId }}').modal('show');
    @endif

});
</script>

@endsection