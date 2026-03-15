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
                   {!! Form::model($sotk, ['method' => 'PATCH','route' => ['sotk.update', $sotk->id]]) !!}
                        {{ Form::hidden('id') }}
                        {!! Form::hidden('user_id', $iduser, array('class' => 'form-control')) !!}
                        {!! Form::hidden('role_id', $role_id, array('class' => 'form-control')) !!}
                        <div class="form-group mb-0">
                            <label for="exampleFormControlInput2">Jenis sotk</label>
                            <select name="parent" id="" class="form-control basic">
                                <option value="0">::Pilih::</option>
                                @foreach ($parent as $prn)
                                 {{ $s = ($prn->id == $sotk->id)?' selected ':''; }}
                                <option {{ $s }} value="{{ $prn->id }}">{{ $prn->id }} | {{ $prn->jabatan }}</option>
                                @endforeach
                            </select>
                           
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Id Sotk</label>
                            {{ Form::text('id', null, array('class'=> 'form-control', 'placeholder' => 'Ex : 01.02.01')) }}
                            <em>* Untuk id sotk baru ganti .00 pada akhir id sotk dengan counter id sotk terbaru</em>
                                                    
                        </div>
                         <div class="form-group mb-4 mt-4">
                            <label for="exampleFormControlInput2">Jabatan</label>
                              {{ Form::text('jabatan', null, array('class'=> 'form-control', 'placeholder' => 'Nama Jabatan / Sotk')) }}
                        </div>
                        <div class="form-group mb-2 mt-0">
                            <label for="exampleFormControlInput2">Jabatan Singkat</label>
                             {{ Form::text('jabatan_singkat', null, array('class'=> 'form-control', 'placeholder' => 'Nama Jabatan / Sotk Singkat')) }}
                        </div>

                        <div class="form-group mb-4">
                            <label for="inputCity">Status</label>
                            <select class="form-control  basic" name="flag" required>
                                <option {{ $sotk->flag == 1 ? 'selected' : '' }} value="1">Publish</option>
                                <option {{ $sotk->flag == 0 ? 'selected' : '' }} value="0">Tidak Publish</option>
                            </select>
                        </div>
                       
                        <input type="submit" name="" class="mt-4 mb-4 btn btn-primary">
                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('sotk.index') }}"> Back</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection