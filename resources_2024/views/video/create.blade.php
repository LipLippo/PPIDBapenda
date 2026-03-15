@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Buat Video Baru</h4>
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
                   {!! Form::open(array('route' => 'videos.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                       {!! Form::hidden('user_id', $iduser, array('class' => 'form-control')) !!}
                        {!! Form::hidden('role_id', $role_id, array('class' => 'form-control')) !!}
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Judul</label>
                            {!! Form::text('keterangan', null, array('placeholder' => 'Masukkan judul video','class' => 'form-control')) !!}
                            
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Url</label>
                            {!! Form::text('url', null, array('placeholder' => 'Masukkan judul video','class' => 'form-control')) !!}
                        </div>
                         <label for="exampleFormControlInput2">Foto</label>
                        <div class="form-group mb-2 mt-0">
                            {{-- {!! Form::file('foto', null, array('placeholder' => 'Upload foto','class' => 'custom-file-input', 'id' => 'customFile')) !!} --}}
                            <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="foto" value="">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                             
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Order</label>
                            {!! Form::number('order', count($rs), array('placeholder' => 'Masukkan angka','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group mb-2">
                            <label for="inputCity">Status Portal</label>
                            <select class="form-control  basic" name="flag_portal" required>
                               <option selected="selected" value="1">Publish</option>
                                <option value="0">Tidak Publish</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="inputCity">Jadikan Headline Portal</label>
                            <select class="form-control  basic" name="headline" required>
                               <option selected="selected" value="1">Headline</option>
                                <option value="0">Tidak Headline</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="inputCity">Status Digital</label>
                            <select class="form-control  basic" name="flag" required>
                                <option selected="selected" value="1">Publish</option>
                                <option value="0">Tidak Publish</option>
                            </select>
                        </div>
                       
                        <input type="submit" name="" class="mt-4 mb-4 btn btn-primary">
                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('videos.index') }}"> Back</a>
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


                    