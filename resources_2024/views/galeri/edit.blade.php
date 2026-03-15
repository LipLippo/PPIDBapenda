@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Edit Album</h4>
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
                   {!! Form::model($galeri, ['method' => 'PATCH','route' => ['galeris.update', $galeri->id],'enctype'=>'multipart/form-data']) !!}
                        {{ Form::hidden('id') }}
                        {!! Form::hidden('user_id', $iduser, array('class' => 'form-control')) !!}
                        {!! Form::hidden('role_id', $role_id, array('class' => 'form-control')) !!}
                        <div class="form-group mb-0">
                            <label for="exampleFormControlInput2">Album</label>
                             <select name="id_album" id="album" class="form-control basic">
                                <option value="">::Pilih::</option>
                                @foreach ($album as $a)
                                <option {{ $galeri->id_album ==  $a->id ? 'selected' : '' }}  value="{{ $a->id }}">{{ $a->album }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="exampleFormControlInput2">Foto</label>
                        <div class="form-group mb-2 mt-0">
                            
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="foto" value="">
                                <label class="custom-file-label" val for="customFile">Choose file</label>
                            </div>
                             <img width="190px" src="{{ url('packages/upload/galeri/'.$galeri->foto) }}"/>
                        </div>
                         <div class="form-group mb-4 mt-4">
                            <label for="exampleFormControlInput2">Keterangan</label>
                            {!! Form::text('keterangan', null, array('placeholder' => 'Masukkan Keterangan','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group mb-2 mt-0">
                            <label for="exampleFormControlInput2">Order</label>
                            {!! Form::number('order', null, array('placeholder' => 'Masukkan angka','class' => 'form-control')) !!}
                        </div>

                        <div class="form-group mb-4">
                            <label for="inputCity">Status</label>
                            <select class="form-control  basic" name="flag" required>
                                <option {{ $galeri->flag == 1 ? 'selected' : '' }} value="1">Publish</option>
                                <option {{ $galeri->flag == 0 ? 'selected' : '' }} value="0">Tidak Publish</option>
                            </select>
                        </div>
                       
                        <input type="submit" name="" class="mt-4 mb-4 btn btn-primary">
                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('galeris.index') }}"> Back</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endsection