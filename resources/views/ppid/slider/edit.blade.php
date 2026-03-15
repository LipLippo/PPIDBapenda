@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Edit Slider</h4>
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
                   {!! Form::model($slider, ['method' => 'PATCH','route' => ['sliderppid.update', $slider->id],'enctype'=>'multipart/form-data']) !!}
                        {{ Form::hidden('id') }}
                        {{ Form::hidden('user_id', $iduser, array('class'=> 'form-control')) }}
                        {{ Form::hidden('role_id', $role_id, array('class'=> 'form-control')) }}
                        <label for="exampleFormControlInput2">Foto</label>
                        <div class="form-group mb-2 mt-0">
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="img" value="">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <label for="exampleFormControlInput2">slider lama : </label><br>
                            <img width="150px" src="{{ url('packages/upload/slider/'.$slider->img) }}"/>
                             
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Caption</label>
                            {!! Form::text('caption', null, array('placeholder' => 'Masukkan Caption','class' => 'form-control')) !!}
                            
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Order</label>
                            {!! Form::number('order', null, array('placeholder' => 'Masukkan angka','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputCity">Status Portal</label>
                            <select class="form-control  basic" name="flag_portal" required>
                                <option  {{ $slider->flag_portal == 1 ? 'selected' : '' }} value="1">Publish</option>
                                <option {{ $slider->flag_portal == 0 ? 'selected' : '' }} value="0">Tidak Publish</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="inputCity">Status Digital</label>
                            <select class="form-control  basic" name="flag" required>
                                <option {{ $slider->flag == 1 ? 'selected' : '' }} value="1">Publish</option>
                                <option {{ $slider->flag == 0 ? 'selected' : '' }} value="0">Tidak Publish</option>
                            </select>
                        </div>
                       
                        <input type="submit" name="" class="mt-4 mb-4 btn btn-primary">
                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('sliderppid.index') }}"> Back</a>
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