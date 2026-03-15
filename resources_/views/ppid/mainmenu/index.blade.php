@extends('layouts.app')
@section('content')
<br>
<div class="layout-px-spacing">
    <div class="seperator-header">
        <h4 class="">Main Menu PPID</h4>
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
            @can('mod-menuutamauppd-create')
                <a class="btn btn-success" href="{{ route('mainppid.create') }}"> Create New Menu</a><br><br>
            @endcan
              <div class="widget-content widget-content-area">
                  <table id="zero-config" class="table style-2  table-hover responsive table-bordered ">
                      <thead>
                         
                           
                            <tr>
                                 <th><input type="checkbox" id="master"></th>
                                <th>Title</th>
                                <th>Parent</th>
                                <th>Jenis Konten</th>
                                <th>Konten</th>
                                <th>Target</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Act.</th>
                            </tr>
                      </thead>
                      <tbody id="tablecontents">
                        @if($main->count())
                        @foreach ($main as $m)
                          <tr id="tr_{{$m->id}}" class="row1" data-id="{{ $m->id }} " >
                                <td> <input type="checkbox" class="sub_chk" data-id="{{$m->id}}"></td>
                                <td><i class="fa-solid fa-arrows-up-down-left-right"></i> {{ substr($m->title,0,50) }}</td>
                                <td>
                                    @if ($m->id_parent == 0)
                                        <p>-</p>
                                    @else
                                        {{ $m->id_parent }}
                                    @endif
                                    
                                </td>
                                <td>   @if ( $m->jenis_konten == 1)
                                        <p> Dokumen</p>
                                    @elseif($m->jenis_konten == 2)
                                         <p> Link</p>
                                    @else
                                    <p> Pdf</p>
                                    @endif
                                </td>
                                <td>{{substr(strip_tags($m->konten), 0, 30).".."}}</td>
                                <td>{{ $m->target }}</td>
                                <td>{{ $m->order }}</td>
                                <td class="text-center">
                                @if ($m->status == 1)
                                    <i class="far fa-check-circle" aria-hidden="true"></i>
                                @elseif($m->status == 0)
                                 <i class="far fa-times-circle" aria-hidden="true"></i>
                                @endif
                            </td>
                                <td>
                                    @can('mod-menuutamauppd-edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('mainppid.edit',$m->id) }}">Edit</a>
                                    @endcan
                                        
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rotateleftModal{{ $m->id }}">Delete</button>
                                </td>
                          </tr>

                            <div id="rotateleftModal{{ $m->id }}" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                     <form action="{{ route('mainppid.destroy',$m->id) }}" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Menu</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    <p class="modal-text">Anda yakin ingin menghapus menu {{ $m->title }}</p>
                                            </div>
                                            <div class="modal-footer md-button">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                @csrf
                                                @method('DELETE')
                                                @can('mod-menuutama-delete')
                                                <button type="submit" class="btn btn-danger">Ya, hapus</button>
                                                @endcan
                                                {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          @endforeach  
                           @endif
                      </tbody>
                    </table>
                    {{-- {!! $posts->links() !!} --}}
                     <button style="display: none" id="btndlt" class="btn btn-warning btn-sm delete_all" data-url="{{ url('ppidmain-multidel') }}">Hapus data</button>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Dragdrop --}}
<script type="text/javascript">
    $(function () {
    $( "#tablecontents" ).sortable({
        items: "tr",
        cursor: 'move',
        opacity: 0.6,
        update: function(e) {
            updatePostOrder();
        }
    });

    function updatePostOrder() {
        var order = [];
        var token = $('meta[name="csrf-token"]').attr('content');
        $('tr.row1').each(function(index, element) {
        order.push({
            id: $(this).attr('data-id'),
            order: index
        });
        });

        $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('ppidmain-sortable') }}",
        data: {
            order: order,
            _token: token
        },
        success: function(response) {
            if (response.status == "success") {
                console.log(response);
            } else {
                console.log(response);
            }
        }
        });
    }
    });
</script>
{{-- ENDDragdrop --}}

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
        "pageLength": 20
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

