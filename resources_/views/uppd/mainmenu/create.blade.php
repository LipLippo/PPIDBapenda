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
                 {!! Form::open(array('route' => 'uppdmain.store','method'=>'POST' ,'enctype'=>'multipart/form-data')) !!}
    	            @csrf
                    {!! Form::hidden('user_id', $iduser, array('class' => 'form-control')) !!}
                    {!! Form::hidden('role_id', $role_id, array('class' => 'form-control')) !!}
                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                </div>
                              
                                <div class="widget-content widget-content-area">
                                        <div class="form-row mb-2">
                                            <div class="form-group mb-1 col-md-12">
                                                {{ Form::label('title', 'Title:') }}
                                                {{ Form::text('title', null, array('class'=> 'form-control', 'placeholder'=>'Judul ')) }}
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="form-row mb-0 mt-0">
                                            <div class="form-group mb-0 col-md-12 mt-0">
                                                {{ Form::label('id_parent', 'Parent:')}}
                                                <select class="form-control  basic" name="id_parent" required>
                                                    <option value="0">::Pilih::</option>
                                                     @foreach ($parent as $prn)
                                                        <option value="{{ $prn->id }}">{{ $prn->title }}</option>
                                                     @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row mb-0 mt-0">
                                            <div class="form-group mb-0 col-md-12 mt-0">
                                                <label for="inputCity">Jenis Konten</label>
                                                <select class="form-control  basic" name="jenis_konten" id="jeniskontenppid"  required>
                                                    <option value="0">::Pilih::</option>
                                                    <option value="1">Dokumen</option>
                                                    <option value="2">Link</option>
                                                    <option value="3">PDF</option>
                                                </select>
                                            </div>
                                        </div>

                                        {{-- JENIS KONTEN DOKUMEN --}}
                                        <div class="form-row mb-2" id="dokumenppid">
                                            <div class="form-group mb-1 col-md-12">
                                                <label for="inputCity">Konten</label>
                                                {{ Form::textarea('konten', null, array('class'=> 'form-control editor')) }}
                                            </div>
                                        </div>
                                        {{-- END JENIS KONTEN DOKUMEN --}}

                                        {{-- JENIS KONTEN PDF --}}
                                        <div class="form-row mb-2" id="pdfppid">
                                            <div class="form-group mb-3 col-md-12 mt-0">
                                                <label for="inputPassword4">Dokumen PDF:</label>
                                                <div class="custom-file mb-3">
                                                    <input type="file" class="custom-file-input" id="customFile" name="pdf" value="">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <em>(Lampirkan file dokumen .pdf sebagai pendukung)</em>
                                            </div>
                                        
                                            <div class="form-group mb-2 col-md-12">
                                                <label for="inputCity">Keterangan Atas :</label>
                                                 {{ Form::textarea('konten1', null, array('class'=> 'form-control editor')) }}
                                            </div>

                                            <div class="form-group mb-2 col-md-12">
                                                <label for="inputCity">Keterangan Bawah:</label>
                                                 {{ Form::textarea('konten2', null, array('class'=> 'form-control editor')) }}
                                            </div>
                                        </div> 
                                        {{-- END JENIS KONTEN PDF --}}
                                        <div class="form-row mb-2" id="links">
                                            <div class="form-group mb-3 col-md-12 mt-0">
                                                <label for="inputPassword4">Link:</label>
                                                 {{ Form::text('url', null, array('class'=> 'form-control', 'placeholder'=>'ex : http://cilacapkab.go.id')) }}
                                            </div>
                                        
                                            <div class="form-group mb-0 col-md-12 mt-0">
                                                <label for="inputCity">Target Link</label>
                                                <select class="form-control  basic" name="target" id="myselect" >
                                                    <option value="0">::Pilih::</option>
                                                    <option value="_parent">_parent</option>
                                                    <option value="_blank">_blank</option>
                                                    <option value="_new">_new</option>
                                                    {{-- <option>purple</option> --}}
                                                </select>
                                            </div>
                                        </div> 
                                        {{-- JENIS KONTEN LINK --}}
                                       
                                        {{-- END JENIS KONTEN LINK --}}

                                        <div class="form-row mb-0 mt-0">
                                            <div class="form-group col-md-12 mt-0">
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
                                                </select>
                                            </div>
                                        </div>
                                      
                                        <input type="submit" name="" class="mt-0 mb-0 btn btn-primary">
                                        <a class="mt-4 mb-4 btn btn-secondary" href="{{ route('uppdmain.index') }}"> Back</a>
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
    $('#dokumenppid').hide(); 
    $('#links').hide(); 
    $('#pdfppid').hide(); 
$('#jeniskontenppid').on('change', function() {
        
        if(this.value  == "1") {
            $('#dokumenppid').show(); 
            $('#links').hide(); 
            $('#pdfppid').hide(); 
        } 
        if(this.value  == "2") {
            $('#links').show(); 
            $('#dokumenppid').hide(); 
            $('#pdfppid').hide(); 
        }
        if(this.value  == "3") {
            $('#pdfppid').show(); 
            $('#dokumenppid').hide(); 
            $('#links').hide(); 
        }
});
</script>
@endsection


