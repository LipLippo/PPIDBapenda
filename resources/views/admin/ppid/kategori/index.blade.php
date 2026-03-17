{{-- resources/views/admin/ppid/kategori/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="font-weight-bold">Kategori Informasi PPID</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <style>
        /* Toggle Switch */
        .toggle-switch {
            position: relative;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            gap: 8px;
        }
        .toggle-switch input[type="checkbox"] {
            display: none;
        }
        .toggle-slider {
            width: 46px;
            height: 24px;
            background-color: #ccc;
            border-radius: 24px;
            position: relative;
            transition: background-color 0.3s;
            flex-shrink: 0;
        }
        .toggle-slider::before {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            background: #fff;
            border-radius: 50%;
            top: 3px;
            left: 3px;
            transition: transform 0.3s;
            box-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }
        .toggle-switch input:checked + .toggle-slider {
            background-color: #28a745;
        }
        .toggle-switch input:checked + .toggle-slider::before {
            transform: translateX(22px);
        }
        .toggle-label {
            font-size: 13px;
            font-weight: 600;
        }
        .toggle-label.active-label {
            color: #28a745;
        }
        .toggle-label.inactive-label {
            color: #6c757d;
        }
    </style>

    <div class="row">
        @foreach($kategoris as $kategori)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100 {{ $kategori->is_active ? '' : 'border-secondary' }}">
                <div class="card-body">

                    {{-- Nama Kategori --}}
                    <h5 class="card-title font-weight-bold {{ $kategori->is_active ? '' : 'text-muted' }}">
                        {{ $kategori->nama_kategori }}
                    </h5>

                    {{-- Badge Jumlah Dokumen --}}
                    <p class="mb-3">
                        <span class="badge badge-primary">{{ $kategori->konten_count }} Dokumen</span>
                    </p>

                    {{-- Toggle Aktif/Nonaktif --}}
                    <div class="mb-3">
                        <form action="{{ route('admin.ppid.kategori.toggle', $kategori->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <label class="toggle-switch" title="Klik untuk mengubah status">
                                <input type="checkbox"
                                       {{ $kategori->is_active ? 'checked' : '' }}
                                       onchange="this.form.submit()">
                                <span class="toggle-slider"></span>
                                <span class="toggle-label {{ $kategori->is_active ? 'active-label' : 'inactive-label' }}">
                                    {{ $kategori->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </label>
                        </form>
                    </div>

                    {{-- Tombol Kelola Konten --}}
                    <a href="{{ route('admin.ppid.kategori.show', $kategori) }}"
                       class="btn btn-sm {{ $kategori->is_active ? 'btn-success' : 'btn-secondary' }}">
                        <i class="fas fa-folder-open mr-1"></i> Kelola Konten
                    </a>

                </div>

                {{-- Footer card: keterangan nonaktif --}}
                @if(!$kategori->is_active)
                <div class="card-footer bg-light text-muted" style="font-size: 12px;">
                    <i class="fas fa-eye-slash mr-1"></i> Kategori ini tidak ditampilkan di portal publik
                </div>
                @endif

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection