@extends('layouts.app')

@section('content')
   

<div class="container">
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                     <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Create New Menu </h4>
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
                {!! Form::open(array('route' => 'main.store','method'=>'POST' ,'enctype'=>'multipart/form-data')) !!}
    	            @csrf
                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                
                                </div>
                                {!! Form::hidden('user_id', $iduser, array('class' => 'form-control')) !!}
                                {!! Form::hidden('role_id', $role_id, array('class' => 'form-control')) !!}
                                <div class="widget-content widget-content-area">
                                        <div class="form-row mb-2">
                                            <div class="form-group mb-1 col-md-12">
                                                {{-- <label for="inputCity">Judul(Indonesia)</label> --}}
                                                {{ Form::label('title', 'Judul (Bahasa Indonesia):') }}
                                                {{ Form::text('title', null, array('class'=> 'form-control', 'placeholder'=>'Judul (Bahasa Indonesia)')) }}
                                               {{-- <input type="text" name="title" class="form-control" id="inputPassword4" placeholder="Title"> --}}
                                            </div>
                                            
                                        </div>
                                        <div class="form-row mb-2">
                                            <div class="form-group mb-1 col-md-12 mt-0">
                                                {{-- <label for="inputCity">Title(English)</label>
                                               <input type="text" name="title_english" class="form-control"  id="inputPassword4" placeholder="Title"> --}}
                                                {{ Form::label('title_english', 'Title (Bahasa Inggris):') }}
                                                {{ Form::text('title_english', null, array('class'=> 'form-control', 'placeholder'=>'Title (Bahasa Inggris)')) }}
                                                
                                            </div>
                                        </div>
                                        <div class="form-row mb-0 mt-0">
                                            <div class="form-group mb-0 col-md-12 mt-0">
                                                {{ Form::label('id_parent', 'Parent:')}}
                                                 {{-- {{\Mainmenu::GetCombo('id_parent')}} --}}
                                                 {{-- {{ App\Models\Mainmenu::GetCombo('id_parent') }} --}}
                                                {{-- <label for="inputEmail4">Parent:</label> --}}
                                                <select class="form-control  basic" name="id_parent" required>
                                                    <option value="0">::Pilih::</option>
                                                     @foreach ($parent as $prn)
                                                        <option value="{{ $prn->id }}">{{ $prn->title }} ({{ $prn->title_english }})</option>
                                                     @endforeach
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="form-row mb-0 mt-0">
                                            <div class="form-group mb-0 col-md-12 mt-0">
                                                <label for="inputCity">Jenis Konten</label>
                                                <select class="form-control  " name="jenis_konten" id="jeniskonten" required>
                                                    <option value="0">::Pilih::</option>
                                                    <option value="1">Dokumen</option>
                                                    <option value="2">PDF</option>
                                                    <option value="3">Link</option>
                                                   
                                                </select>
                                            </div>
                                        </div>

                                        {{-- JENIS KONTEN DOKUMEN --}}
                                        <div class="form-row mb-2" id="dokumen">
                                            <div class="form-group mb-1 col-md-12">
                                                <label for="inputCity">Konten(Indonesia)</label>
                                                {{-- <textarea name="konten" class="ckeditor form-control" id="my-editor" cols="30" rows="10" required></textarea> --}}
                                                 {{ Form::textarea('konten', null, array('class'=> 'form-control editor','id'=>'editor', 'cols' => '80','row'=>'10')) }}
                                            </div>
                                            <div class="form-group mb-1 col-md-12">
                                                <label for="inputCity">Content(english)</label>
                                                {{-- <textarea name="konten_english" class="ckeditor form-control" id="my-editor" cols="30" rows="10" required></textarea> --}}
                                                 {{ Form::textarea('konten_english', null, array('class'=> 'form-control editor','id'=>'editor2')) }}
                                            </div>
                                            
                                        </div>
                                        {{-- END JENIS KONTEN DOKUMEN --}}

                                        {{-- JENIS KONTEN PDF --}}
                                        <div class="form-row mb-2" id="pdf">
                                            <div class="form-group mb-0 col-md-12 mt-0">
                                                <label for="inputPassword4">Dokumen PDF:</label>
                                                 <div class="custom-file mb-3">
                                                    <input type="file" class="custom-file-input" id="customFile" name="pdf" value="">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <em>(Lampirkan file dokumen .pdf sebagai pendukung)</em>
                                            </div>
                                        
                                            <div class="form-group mb-1 col-md-12">
                                                <label for="inputCity">Keterangan Atas (Bahasa Indonesia):</label>
                                                {{-- <textarea name="konten1" class="ckeditor form-control" id="my-editor" cols="30" rows="10" ></textarea> --}}
                                                 {{ Form::textarea('konten1', null, array('class'=> 'form-control editor')) }}
                                            </div>
                                            <div class="form-group mb-1 col-md-12">
                                                <label for="inputCity">Top Information (English):</label>
                                                {{-- <textarea name="konten1_english" class="ckeditor form-control" id="my-editor" cols="30" rows="10" ></textarea> --}}
                                                {{ Form::textarea('konten1_english', null, array('class'=> 'form-control editor')) }}
                                            </div>

                                             <div class="form-group mb-1 col-md-12">
                                                <label for="inputCity">Keterangan Bawah (Bahasa Indonesia):</label>
                                                {{-- <textarea name="konten2" class="ckeditor form-control" id="my-editor" cols="30" rows="10" ></textarea> --}}
                                                 {{ Form::textarea('konten2', null, array('class'=> 'form-control editor')) }}
                                            </div>
                                            <div class="form-group mb-1 col-md-12">
                                                <label for="inputCity">Bottom Information (English):</label>
                                                {{-- <textarea name="konten2_english" class="ckeditor form-control" id="my-editor" cols="30" rows="10" ></textarea> --}}
                                                 {{ Form::textarea('konten2_english', null, array('class'=> 'form-control editor')) }}
                                            </div>
                                            
                                        </div>
                                        {{-- END JENIS KONTEN PDF --}}

                                        {{-- JENIS KONTEN LINK --}}
                                        <div class="form-row mb-0 mt-0" id="link">
                                            <div class="form-group col-md-12 mt-0">
                                                <label for="inputCity">Link</label>
                                                     {{ Form::text('url', null, array('class'=> 'form-control', 'placeholder'=>'ex : http://cilacapkab.go.id')) }}
                                            </div>
                                        
                                            <div class="form-group mb-0 col-md-12 mt-0">
                                                <label for="inputCity">Target Link</label>
                                                <select class="form-control  basic" name="target" id="myselect" >
                                                    {{-- <option value="0">::Pilih::</option> --}}
                                                    <option value="_parent">_parent</option>
                                                    <option value="_blank">_blank</option>
                                                    <option value="_new">_new</option>
                                                    {{-- <option>purple</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        {{-- END JENIS KONTEN LINK --}}

                                        <div class="form-row mb-0 mt-0">
                                            <div class="form-group col-md-12 mt-2">
                                                <label for="inputCity">Order</label>
                                                   <input value="{{ count($rs) }}" name="order" class="form-control" type="number" placeholder="Input number" required>
                                            </div>
                                        </div>
                                        <div class="form-row mb-0 mt-0">
                                        <div class="form-group mb-0 col-md-12 mt-0">
                                                <label for="inputCity">Status(Indonesia)</label>
                                                <select class="form-control  basic" name="status" required>
                                                    <option selected="selected" value="1">Publish</option>
                                                    <option value="0">Tidak Publish</option>
                                                    {{-- <option>purple</option> --}}
                                                </select>
                                            </div>
                                            <div class="form-group mb-0 col-md-12 mt-0">
                                                <label for="inputCity">Status(English)</label>
                                                <select class="form-control  basic" name="status_english" required>
                                                    <option selected="selected" value="1">Publish</option>
                                                    <option value="0">Tidak Publish</option>
                                                    {{-- <option>purple</option> --}}
                                                </select>
                                            </div>
                                        
                                        </div>
                                            <input type="submit" name="" class="mt-4 mb-4 btn btn-primary">
                                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('main.index') }}"> Back</a>
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
<script>
    $('#dokumen').hide(); 
    $('#link').hide(); 
    $('#pdf').hide(); 
$('#jeniskonten').on('change', function() {
        
        if(this.value  == "1") {
            $('#dokumen').show(); 
            $('#link').hide(); 
            $('#pdf').hide(); 
        } 
        if(this.value  == "2") {
            $('#pdf').show(); 
            $('#dokumen').hide(); 
            $('#link').hide(); 
        }
        if(this.value  == "3") {
            $('#lonk').show(); 
            $('#dokumen').hide(); 
            $('#pdf').hide(); 
        }
        if(this.value  == "0") {
            $('#pdf').hide(); 
            $('#dokumen').hide(); 
            $('#link').hide(); 
        }
});
</script>

{{-- HIDE SHOW INPUT --}}


@endsection 


