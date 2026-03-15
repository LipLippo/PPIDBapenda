@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row layout-top-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Buat Baru</h4>
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
                   {!! Form::open(array('route' => 'permohonan-informasi.store','method'=>'POST' ,'enctype'=>'multipart/form-data')) !!}
                       
                        <div class="form-row mb-0 mt-0">
                                            <div class="form-group col-md-6 mt-0">
                                                <label for="inputCity">Tanggal</label>
                                                    <input id="dateTimeFlatpickr" value="" name="tanggal" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." required>
                                            </div>
                                        </div>
                        <div class="form-group mb-4 mt-2">
                            <label for="exampleFormControlInput2">Nama</label>
                              {{ Form::text('nama', null, array('class'=> 'form-control', 'placeholder' => 'Nama Pemohon')) }}
                        </div>
                        <div class="form-group mb-4 mt-4">
                            <label for="exampleFormControlInput2">Informasi Yang Dibutuhkan</label>
                              {{ Form::textarea('informasi', null, array('class'=> 'form-control', 'placeholder' => 'Informasi')) }}
                        </div>
                        <div class="form-group mb-2 mt-0">
                            <label for="inputCity">Status</label>
                            <select class="form-control  basic" name="status" required>
                                <option selected="selected" value="1">Diterima</option>
                                <option value="2">Diproses</option>
                                <option value="3">Selesai</option>
                                <option value="4">Ditolak</option>
                            </select>
                        </div>
                        <div class="form-group mb-2 mt-0">
                            <label for="exampleFormControlInput2">Keterangan</label>
                             {{ Form::text('keterangan', null, array('class'=> 'form-control', 'placeholder' => 'Keterangan')) }}
                        </div>
                        <div class="form-group mb-2 mt-0">
                            <label for="inputCity">Publish</label>
                            <select class="form-control  basic" name="publish" required>
                                <option selected="selected" value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <input type="submit" name="" class="mt-0 mb-0 btn btn-primary">
                        <a class="mt-0 mb-0 btn btn-secondary" href="{{ route('permohonan-informasi.index') }}"> Back</a>
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


                    