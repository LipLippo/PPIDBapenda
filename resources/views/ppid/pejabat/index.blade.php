@extends('layouts.app')


@section('content')

<br><div class="layout-px-spacing">
  <div class="seperator-header">
      <h4 class="">Pejabat</h4>
  </div>

  <div class="row layout-spacing">
   
      <div class="col-lg-12">
           @if ($message = Session::get('success'))
            <div class="alert alert-light-success border-0 mb-4" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
                <strong>Success!</strong> {{ $message }}. 
            </div>
            @endif
          <div class="statbox widget box box-shadow">
            <a class="btn btn-success" href="{{ route('pejabatppid.create') }}"> Create New</a>
              <div class="widget-content widget-content-area">
                  <table id="zero-config" class="table style-3  table-hover">
                      <thead>
                            <tr>
                                 <th width="5%"><input type="checkbox" id="master"> </th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Sotk</th>
                                <th>Golongan</th>
                                <th>Photo</th>
                                <th class="text-center">Status</th>
                                <th>Act.</th>
                            </tr>
                      </thead>
                      <tbody id="tablecontents"> 
                        @foreach ($pejabat as $key => $al)
                            <tr  id="tr_{{$al->id}}" class="row1" data-id="{{ $al->id }}">
                                <td ><input type="checkbox" class="sub_chk" data-id="{{$al->id}}">   </td>
                                <td>{{ $al->nip }}</td>
                                <td>{{ $al->nama }}</td>
                                <td>{{ $al->jabatan }}</td>
                                <td>{{ $al->golru }} | {{ $al->pangkat }}</td>
                                <td><img src="{{ url('packages/upload/pejabat/'.$al->photo) }}" alt="" height="50px" width="50px"> </td>
                                <td>
                                    @if ($al->flag == 1)
                                        <i class="far fa-check-circle" aria-hidden="true"></i>
                                    @else
                                        <i class="far fa-times-circle" aria-hidden="true"></i>
                                    @endif
                                </td>
                                
                                <td >
                                    
                                            <a class="btn btn-primary btn-sm" href="{{ route('pejabatppid.edit',$al->id) }}">Edit</a>
                                       
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rotateleftModal{{ $al->id }}">Delete</button>
                                            {!! Form::close() !!}
                                            </a>
                                       
                                </td>
                            </tr>
                          <div id="rotateleftModal{{ $al->id }}" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                     <form action="{{ route('pejabatppid.destroy',$al->id) }}" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus pejabat</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    <p class="modal-text">Anda yakin ingin menghapus {{ $al->nama }}</p>
                                            </div>
                                            <div class="modal-footer md-button">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                @csrf
                                                @method('DELETE')
                                                @can('mod-pejabatppid-delete')
                                                <button type="submit" class="btn btn-danger">Ya, hapus</button>
                                                @endcan
                                                {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          @endforeach
                          
                      </tbody>
                  </table>
                  {{-- {!! $data->render() !!} --}}
                  <button style="display: none" id="btndlt" class="btn btn-warning btn-sm delete_all" data-url="{{ url('ppidpejabat-multidel') }}">Hapus data</button>
              </div>
          </div>
      </div>
  </div>

</div>

{{-- CHECKBOX --}}
<script type="text/javascript">
    $(document).ready(function () {


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  


            if(allVals.length <=0)  
            {  
                alert(allVals);  
            }  else {  


                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  


                    var join_selected_values = allVals.join(","); 


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>
{{-- ENDCHECKBOX --}}
{{-- DATATABLES --}}
<script>
    $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [10, 20, 50],
        "pageLength": 10
    });
    
</script>
{{-- ENDDATATABLES --}}

{{-- hide/showbuttononcheck --}}
<script>
    $(function () {
        $(".sub_chk ").click(function () {
            if ($(this).is(":checked")) {
                $("#btndlt").show();
            } else {
                $("#btndlt").hide();
            }
        });
        $("#master").click(function () {
            if ($(this).is(":checked")) {
                $("#btndlt").show();
            } else {
                $("#btndlt").hide();
            }
        });
    });
</script>
{{-- END --}}
@endsection

