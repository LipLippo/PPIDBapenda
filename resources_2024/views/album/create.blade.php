@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Buat Album Baru</h4>
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
                   {!! Form::open(array('route' => 'album.store','method'=>'POST')) !!}
                        {!! Form::hidden('user_id', $iduser, array('class' => 'form-control')) !!}
                        {!! Form::hidden('role_id', $role_id, array('class' => 'form-control')) !!}
                        <div class="form-group mb-2">
                            <label for="exampleFormControlInput2">Album</label>
                            {!! Form::text('album', null, array('placeholder' => 'Masukkan Nama Album','class' => 'form-control')) !!}
                            
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleFormControlInput2">Order</label>
                            {!! Form::number('order', count($rs), array('placeholder' => 'Masukkan angka','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group mb-2">
                            <label for="inputCity">Jadikan</label>
                            <select class="form-control  basic" name="headline" required>
                                <option selected="selected" value="1">Headline</option>
                                <option value="0">Tidak Headline</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="inputCity">Status</label>
                            <select class="form-control  basic" name="flag" required>
                                <option selected="selected" value="1">Publish</option>
                                <option value="0">Tidak Publish</option>
                            </select>
                        </div>
                       
                        <input type="submit" name="" class="mt-2 mb-2 btn btn-primary">
                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('album.index') }}"> Back</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


                    