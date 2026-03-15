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

    <div class="row">
        @foreach($kategoris as $kategori)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{ $kategori->nama_kategori }}</h5>
                    <p class="text-muted mb-3">
                        <span class="badge badge-primary">{{ $kategori->konten_count }} Dokumen</span>
                    </p>
                    <a href="{{ route('admin.ppid.kategori.show', $kategori) }}"
                       class="btn btn-success btn-sm">
                        <i class="fas fa-folder-open mr-1"></i> Kelola Konten
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection