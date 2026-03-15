@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Edit Pejabat</h4>
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
                   {!! Form::model($sejarah, ['method' => 'PATCH','route' => ['sotksejarah.update', $sejarah->id],'enctype'=>'multipart/form-data']) !!}
                         {{ Form::hidden('id') }}
                        {!! Form::hidden('user_id', $iduser, array('class' => 'form-control')) !!}
                        {!! Form::hidden('role_id', $role_id, array('class' => 'form-control')) !!}
                        <div class="form-group mb-4 mt-4">
                            <label for="exampleFormControlInput2">Nama</label>
                              {{ Form::text('nama', null, array('class'=> 'form-control')) }}
                        </div>
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Periode Awal:</label>
                                {{ Form::text('tahun_awal', null, array('class'=> 'form-control num', 'maxlength'=> '4')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Periode Akhir:</label>
                               {{ Form::text('tahun_akhir', null, array('class'=> 'form-control num', 'maxlength'=> '4')) }}
                            </div>
                        </div>
                        <label for="exampleFormControlInput2">Foto</label>
                        <div class="form-group mb-2 mt-0">
                            {{-- {!! Form::file('foto', null, array('placeholder' => 'Upload foto','class' => 'custom-file-input', 'id' => 'customFile')) !!} --}}
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="photo" value="">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <em>* Foto Dimensi 150 x 120</em><br>
                            <label for="exampleFormControlInput2">Foto lama : </label><br>
                            <img width="150px" src="{{ url('packages/upload/sejarah/'.$sejarah->photo) }}"/>
                             
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputCity">Status</label>
                            <select class="form-control  basic" name="flag" required>
                                <option {{ $sejarah->flag == 1 ? 'selected' : '' }} value="1">Publish</option>
                                <option {{ $sejarah->flag == 0 ? 'selected' : '' }} value="0">Tidak Publish</option>
                            </select>
                        </div>
                       
                        <input type="submit" name="" class="mt-4 mb-4 btn btn-primary">
                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('sotksejarah.index') }}"> Back</a>
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