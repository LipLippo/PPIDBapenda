@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Edit Sotk</h4>
                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="widget-content widget-content-area">
                   {!! Form::model($informasi, ['method' => 'PATCH','route' => ['permohonan-informasi.update', $informasi->id]]) !!}
                        
                        <div class="form-row mb-0 mt-0">
                                            <div class="form-group col-md-6 mt-0">
                                                <label for="inputCity">Tanggal</label>
                                                    <input id="dateTimeFlatpickr" value="{{ $informasi->tanggal }}"name="tanggal" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." required>
                                            </div>
                                        </div>
                        <div class="form-group mb-4 mt-2">
                            <label for="exampleFormControlInput2">Nama</label>
                              {{ Form::text('nama', null, array('class'=> 'form-control', 'placeholder' => 'Nama Pemohon')) }}
                        </div>
                        <div class="form-group mb-4 mt-4">
                            <label for="exampleFormControlInput2">Informasi Yang Dibutuhkan</label>
                              {{ Form::textarea('informasi', null, array('class'=> 'form-control', 'placeholder' => 'Informasi')) }}
                        </div>
                        <div class="form-group mb-2 mt-0">
                            <label for="inputCity">Status</label>
                            <select class="form-control  basic" name="status" required>
                                <option {{ $informasi->status == 1 ? 'selected' : '' }}  value="1">Diterima</option>
                                <option {{ $informasi->status == 2 ? 'selected' : '' }}  value="2">Diproses</option>
                                <option {{ $informasi->status == 3 ? 'selected' : '' }}  value="3">Selesai</option>
                                <option {{ $informasi->status == 4 ? 'selected' : '' }}  value="4">Ditolak</option>
                            </select>
                        </div>
                        <div class="form-group mb-2 mt-0">
                            <label for="exampleFormControlInput2">Keterangan</label>
                             {{ Form::text('keterangan', null, array('class'=> 'form-control', 'placeholder' => 'Keterangan')) }}
                        </div>
                        <div class="form-group mb-2 mt-0">
                            <label for="inputCity">Publish</label>
                            <select class="form-control  basic" name="publish" required>
                                <option {{ $informasi->publish == 1 ? 'selected' : '' }} value="1">Ya</option>
                                <option {{ $informasi->publish == 0 ? 'selected' : '' }} value="0">Tidak</option>
                            </select>
                        </div>
                       
                        <input type="submit" name="" class="mt-4 mb-4 btn btn-primary">
                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('permohonan-informasi.index') }}"> Back</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection