@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                     <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Update Posts </h4>
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
                  {!! Form::model($posts, ['method' => 'PATCH','route' => ['post.update', $posts->id],'enctype'=>'multipart/form-data']) !!}
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
                                     <div class="form-row mb-2">
                                        {{ Form::hidden('id') }}
                                         {!! Form::hidden('user_id', $iduser, array('class' => 'form-control')) !!}
                                        {!! Form::hidden('role_id', $role_id, array('class' => 'form-control')) !!}
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
                                                    
                                                     <option {{ $posts->publish == 1 ? 'selected' : '' }} value="1">Publish</option>
                                                    <option {{ $posts->publish == 0 ? 'selected' : '' }} value="0">Tidak Publish</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Status:</label>
                                                <select class="selectpicker form-control basic" name="publish_english" >
                                                    <option {{ $posts->publish_english == 1 ? 'selected' : '' }} value="1">Publish English</option>
                                                    <option {{ $posts->publish_english == 0 ? 'selected' : '' }} value="0">Tidak Publish</option>
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
                                                
                                                <select class="form-control basic" name="cat_id[]"  multiple>
                                                   @foreach ($cat as $ct)
                                                        @if (is_array($arr_cat))
                                                            {{ $s = (in_array($ct->id, $arr_cat))?' selected ':''; }}
                                                        @else
                                                            {{ $s='' }}
                                                        @endif
                                                        <option {{ $s }} value="{{ $ct->id }}">{{ $ct->category }}</option>
                                                    @endforeach
                                               
                                                </select>
                                                
                                                   
                                                {{-- @foreach ($cat as $ct)
                                                        {{ $s = ($ct->id == $arr_cat) }}
                                                        {{ $s }}
                                                       <option {{ $s }} value="{{ $ct->id }}">{{ $ct->category }}</option>
                                                   @endforeach --}}
                                            </div>
                                            <div class="form-group mb-0 col-md-6 mt-0">
                                                <label for="inputCity">Jadikan</label>
                                                <select class="form-control  basic" name="headline" required>
                                                    
                                                    <option {{ $posts->headline == 1 ? 'selected' : '' }} value="1">Headline</option>
                                                    <option {{ $posts->headline == 0 ? 'selected' : '' }} value="0">Tidak Headline</option>
                                                    
                                                    {{-- <option>purple</option> --}}
                                                </select>
                                            </div>
                                             <div class="form-group col-md-6 mt-0">
                                                <label for="inputCity">Tanggal</label>
                                                    <input id="dateTimeFlatpickr" value="{{ $posts->tgl_publish }}" name="tgl_publish" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." required>
                                            </div>
                                            <div class="form-group mb-0 col-md-6 mt-0">
                                                <label for="inputPassword4">Image: </label>
                                                <div class="custom-file mb-3">
                                                    <input type="file" class="custom-file-input" id="customFile" name="fav" value="">
                                                    <label class="custom-file-label" val for="customFile">Choose file</label>
                                                </div>
                                                {{-- <img width="190px" src="{{ url('posts/'.$posts->fav) }}"/> --}}
                                                @if((file_exists('./packages/photo/'.$posts->fav)) and ($posts->fav != ''))
                                                <img src="{{url('')}}/packages/photo/{{$posts->fav}}" style="height: auto; width: 50%">
                                                @else
                                                <img src="{{url('')}}/packages/photo/noimage.png" style="height: auto;  width: 50%">
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="response" class="form-control" id="inputEmail4" placeholder="Judul" value="1">
                                        
                                        <input type="submit" name="" class="mt-4 mb-4 btn btn-primary">
                                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('post.index') }}"> Back</a>
                                    </form>
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