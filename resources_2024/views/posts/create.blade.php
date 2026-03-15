@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                     <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Create New Posts </h4>
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
                 {!! Form::open(array('route' => 'post.store','method'=>'POST' ,'enctype'=>'multipart/form-data')) !!}
    	            @csrf
                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                </div>
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                            <h4>Indonesia</h4> 
                                        </div>  
                                        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                            <h4>English</h4>
                                        </div>                                                             
                                    </div>
                                </div><br>
                                <div class="widget-content widget-content-area">
                                {!! Form::hidden('user_id', $iduser, array('class' => 'form-control')) !!}
                                {!! Form::hidden('role_id', $role_id, array('class' => 'form-control')) !!}
                                        <div class="form-row mb-2">
                                            <div class="form-group col-md-6">
                                                
                                                {{ Form::label('titel', 'Judul (Bahasa Indonesia):') }}
                                                {{ Form::text('titel', null, array('class'=> 'form-control', 'placeholder'=>'Judul (Bahasa Indonesia)')) }}
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Title:</label>
                                                 {{ Form::text('titel_english', null, array('class'=> 'form-control', 'placeholder' => 'Title English')) }}
                                            </div>
                                        </div>
                                        <div class="form-row mb-2 mt-0">
                                            <div class="form-group col-md-6 ">
                                                <label for="inputAddress2">Deskripsi:</label>
                                                 {{ Form::textarea('desc', null, array('class'=> 'form-control', 'rows'=>'5', 'placeholder' => 'Deskripsi Bahasa Indonesia')) }}
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">Description:</label>
                                                 {{ Form::textarea('desc_english', null, array('class'=> 'form-control', 'rows'=>'5', 'placeholder' => 'Description English')) }}
                                            </div>
                                        </div>
                                        <div class="form-row mb-2">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Status:</label>
                                                <select class="selectpicker form-control basic" name="publish" required>
                                                    <option value="1">Publish</option>
                                                    <option value="0">Tidak Publish</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Status:</label>
                                                <select class="selectpicker form-control basic" name="publish_english" >
                                                    <option value="1">Publish</option>
                                                    <option value="0">Tidak Publish</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row mb-2">
                                            <div class="form-group mb-1 col-md-12">
                                                <label for="inputCity">Content(Indonesia)</label>
                                                 {{ Form::textarea('content', null, array('class'=> 'form-control editor')) }}
                                            </div>
                                            
                                        </div>
                                        <div class="form-row mb-2">
                                            <div class="form-group mb-1 col-md-12 mt-0">
                                                <label for="inputCity">Content(English)</label>
                                                {{ Form::textarea('content_english', null, array('class'=> 'form-control editor')) }}
                                            </div>
                                        </div>
                                        <div class="form-row mb-0 mt-0">
                                            <div class="form-group mb-0 col-md-6 mt-0">
                                                <label for="inputEmail4">Kategori:</label>
                                                <select class="form-control basic" name="cat_id[]" multiple >
                                                   @foreach ($cat as $cat)
                                                       <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                                                   @endforeach
                                                    
                                                </select>
                                               
                                            </div>
                                            <div class="form-group mb-0 col-md-6 mt-0">
                                                <label for="inputPassword4">Image:</label>
                                                <div class="custom-file mb-3">
                                                    <input type="file" class="custom-file-input" id="customFile" name="fav" value="">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mb-0 mt-0">
                                            <div class="form-group mb-0 col-md-6 mt-0">
                                                <label for="inputCity">Jadikan</label>
                                                <select class="form-control  basic" name="headline" required>
                                                    <option selected="selected" value="1">Headline</option>
                                                    <option value="0">Tidak Headline</option>
                                                    {{-- <option>purple</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row mb-0 mt-0">
                                            <div class="form-group col-md-6 mt-0">
                                                <label for="inputCity">Tanggal</label>
                                                    <input id="dateTimeFlatpickr" value="" name="tgl_publish" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="response" class="form-control" id="inputEmail4" placeholder="Judul" value="1">
                                        
                                        <input type="submit" name="" class="mt-4 mb-4 btn btn-primary">
                                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('post.index') }}"> Back</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
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
