@extends('layouts.app')


@section('content')


<br><div class="layout-px-spacing">
  <div class="seperator-header">
      <h4 class="">Posts</h4>
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
            @can('mod-posts-create')
                <a class="btn btn-success" href="{{ route('post.create') }}"> Create New post</a><br><br>
            @endcan
              <div class="widget-content widget-content-area">
                  <table id="zero-config" class="table style-2  table-hover responsive table-bordered ">
                      <thead>
                         
                            <tr>
                                <th rowspan="2" width="5%" ><input type="checkbox" id="master"></th>
                                <th class="text-center" colspan="3" width="25%">Bahasa Indonesia</th>
                                <th class="text-center" colspan="3" width="25%">English</th>
                                <th rowspan="2">Kategori</th>
                                <th rowspan="2" width="10%">Fav Image</th>
                                <th rowspan="2">Headline</th>
                                <th rowspan="2">Publish</th>
                                <th rowspan="2">User</th>
                                <th rowspan="2">Act.</th>
                            </tr>
                            <tr>
                                <th width="10%">Judul</th>
                                <th width="10%">Deskripsi</th>
                                <th width="10%">Publish</th>
                                <th width="10%">Title</th>
                                <th width="10%">Description</th>
                                <th>Publish</th>
                            </tr>
                      </thead>
                      <tbody>
                        @foreach ($posts as $post)
                          <tr data-id="{{ $post->id }} ">
                                <td><input type="checkbox" class="sub_chk" data-id="{{$post->id}}"></td>
                                <td >{{substr(strip_tags($post->titel), 0, 30).".."}}</td>
                                <td >{{substr(strip_tags($post->desc), 0, 20).".."}}</td>
                                <td class="text-center">
                                @if ($post->publish == 1)
                                    <i class="far fa-check-circle" aria-hidden="true"></i>
                                @endif</td>
                                <td >{{substr(strip_tags($post->titel_english), 0, 30).".."}}</td>
                                <td >{{substr(strip_tags($post->post_english), 0, 30).".."}}</td>
                                <td class="text-center">
                                @if ($post->publish == 1)
                                    
                                    <i class="far fa-check-circle" aria-hidden="true"></i>
                                @endif
                                </td>
                                <td class="text-center">{{$post->kategori}}</td>
                              
                                <td class="text-center"> 
                                 @if((file_exists('./packages/photo/'.$post->fav)) and ($post->fav != ''))
                                    <img src="{{url('')}}/packages/photo/{{$post->fav}}" style="height: auto; width: 100%">
                                    @else
                                    <img src="{{url('')}}/packages/photo/noimage.png" style="height: auto;  width: 100%">
                                    @endif
                                </td>
                                <td class="text-center">
                                @if ($post->headline == 1)
                                 <i class="far fa-check-circle" aria-hidden="true"></i>
                                @endif</td>
                                <td >{{@tanggal($post->tgl_publish)}} {{@jam(substr($post->tgl_publish,11,5))}}</td>
                                <td >{{$post->rolename}}</td>
                                <td>
                                      @can('mod-posts-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('post.edit',$post->id) }}">Edit</a>
                                        @endcan
                                        
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rotateleftModal{{ $post->id }}">Delete</button>
                                    
                                </td>
                          </tr>
                           <div id="rotateleftModal{{ $post->id }}" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                     <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Posts</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    <p class="modal-text">Anda yakin ingin menghapus {{ $post->titel }}</p>
                                            </div>
                                            <div class="modal-footer md-button">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                @csrf
                                                @method('DELETE')
                                                @can('mod-posts-delete')
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
                  {{-- {!! $posts->links() !!} --}}
                  <button style="display: none" id="btndlt" class="btn btn-warning btn-sm delete_all" data-url="{{ url('post-multidel') }}">Hapus data</button>
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

