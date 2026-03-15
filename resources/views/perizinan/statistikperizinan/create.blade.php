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
                   {!! Form::open(array('route' => 'statizin.store','method'=>'POST' ,'enctype'=>'multipart/form-data')) !!}

                        {!! Form::hidden('user_id', $iduser, array('class' => 'form-control')) !!}
                        {!! Form::hidden('role_id', $role_id, array('class' => 'form-control')) !!}
                        <div class="form-group mb-4 mt-4">
                            {{ Form::label('title', ' Judul Statistik:') }}
							{{ Form::text('title', null, array('class'=> 'form-control basic', 'placeholder' => 'Judul Statistik')) }}
						</div>
                        <div class="form-group mb-4 mt-4">
                           {{ Form::label('xaxis', ' X Axis Label:') }}
							{{ Form::text('xaxis', null, array('class'=> 'form-control basic', 'placeholder' => 'X Axis Label')) }}
                        </div>

						 <div class="form-group mb-4 mt-4">
                           {{ Form::label('yaxis', ' Y Axis Label:') }}
							{{ Form::text('yaxis', null, array('class'=> 'form-control basic', 'placeholder' => 'Y Axis Label')) }}
                        </div>
						<div class="form-group mb-4 mt-4">
							<label for="inputCity">Tanggal</label>
								<input id="dateTimeFlatpickr" value="" name="tanggal" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." required>
						</div>
                       	<div class="form-group mb-4 mt-4">
							<label for="inputCity">Data Statistik:</label>
                            {{-- <button id="add_row" class="btn btn-success pull-left btn-sm">+ Add Row</button>
                            <button id='delete_row' class="pull-right btn btn-danger btn-sm">- Delete Row</button> --}}
                            
							<button class="btn btn-primary add_btn1 pull-left btn-sm" type="button"> Tambah Data</button>
							<p>
								<table id="tableData" class="table table-striped table-bordered">
									<thead class="bg-primary">
										<tr >
											<th>Nama</th>
											<th width="300">Nilai</th>
											<th width="80">Aksi</th>
										</tr>
									</thead>

									<tbody class='container1'>
                                        {{-- <tr id="product0">
                                        <td>
                                             <input type="text" name="label[]" class="form-control" value="" placeholder="Masukkan Nama"/>
                                        </td>
                                        <td>
                                            <input type="number" name="value[]" class="form-control" value="" placeholder="Masukkan Nilai"/>
                                        </td>
                                    </tr>
                                    <tr id="product1"></tr> --}}
                                    </tbody>
								</table>
							</p>
						</div>
                            
                        
                        
                        <input type="submit" name="" class="mt-0 mb-0 btn btn-primary">
                        <a class="mt-0 mb-0 btn btn-secondary" href="{{ route('statizin.index') }}"> Back</a>
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
{{-- 
<script>

   $(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#tableData').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script> --}}
<script>
    $(document).ready(function(){


        loadAppend('.add_btn1', '.container1', 'nama_', 'nilai_', 'Nama...', 'Nilai...', 'count1', 'rows1_', 'remove_item1');

        $('#batalkan,#back').on('click',function(e){

            e.preventDefault();

            refresh_page();

        });

        $('#simpan').on('submit',function(e){

            var $this = $(this);

            e.preventDefault();

            bootbox.confirm('Simpan data?',function(a){

                if (a == true){

                    $.ajax({

                        url : $this.attr('action'),

                        type : 'POST',

                        data : $this.serialize(),

                        beforeSend: function(){

                            preloader.on();

                        },

                        success:function(html){

                            notification(html,'success');

                            refresh_page();

                        }

                    });

                }

            });

        });

    });

    function loadAppend(button, container, field1, field2, placeholder1, placeholder2, count, row, remove){
        count = 0;

        // DOM untuk data pelatihan kader
        $(button).click(function()
        {
            if(isNaN(parseInt($('.'+row).val()))){
                count = 0;
            }else{
                count = parseInt($('.'+row).val());
            }

            count += 1;
            $(container).append(
                '<tr class="records">'
                    +'<td><input type="text" class="input form-control" required style="display: inline-block; width: 93%;" name="'+field1+''+count+'" id="'+field1+''+count+'" placeholder="'+placeholder1+'"></td>'
                    +'<td><input type="text" class="input form-control" required style="display: inline-block; width: 93%;" name="'+field2+''+count+'" id="'+field2+''+count+'" placeholder="'+placeholder2+'"></td>'
                    +'<td><a href="#" title="Delete" class="'+remove+' btn btn-danger"><span class="glyphicon glyphicon-minus-sign"></span> Hapus</a><input id="'+row+''+count+'" name="'+row+'[]" value="'+count+'" type="hidden" class="'+row+'"></td>'
                    +'</tr>'
            );

            $('.'+remove).on('click', function (ev)
            {
                if (ev.type == 'click')
                {
                    $(this).parents(".records").fadeOut();
                    $(this).parents(".records").remove();
                }
            });
        });
    }
</script>
@endsection


                    