<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ url('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ url('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ url('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ url('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ url('assets/js/app.js')}}"></script>
    {{-- CKEDITOR --}}
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
    {{-- END CKEDITOR --}}

    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ url('assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ url('plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{ url('assets/js/dashboard/dash_1.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{ url('assets/js/scrollspyNav.js')}}"></script>
    <script src="{{ url('plugins/select2/select2.min.js')}}"></script>
    <script src="{{ url('plugins/select2/custom-select2.js')}}"></script>
    <script src="{{ url('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script src="{{ url('plugins/flatpickr/flatpickr.js')}}"></script>
    <script src="{{ url('plugins/noUiSlider/nouislider.min.js')}}"></script>

    <script src="{{ url('plugins/flatpickr/custom-flatpickr.js')}}"></script>
    <script src="{{ url('plugins/noUiSlider/custom-nouiSlider.js')}}"></script>
    <script src="{{ url('plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js')}}"></script>
    <script src="{{ url('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ url('plugins/table/datatable/datatables.js')}}"></script>
    <script>
        // var e;
         c1 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"30px",
                className:"",
                orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5,
            "responsive": true
        });

        multiCheck(c1);
        
  

   
        c2 = $('#style-2').DataTable({
           
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"20px",
                
                className:"",
                orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                },
            }
        ],
          "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10,
            "responsive": true,
            
            
        });

        multiCheck(c2);
        
    </script>
 
 
<script>
    var ss = $(".basic").select2({
    tags: true,
    });
    var firstUpload = new FileUploadWithPreview('myFirstImage')

</script>
<script>
    var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    });
</script>
<script>
    $(document).ready(function() {
  // Configure/customize these variables.
  var showChar = 20; // How many characters are shown by default
  var ellipsestext = "...";
  var moretext ='<p style="color:blue;">Read more...</p>';
  var lesstext = '<p style="color:blue;">Show less...</p>';


    $('.more').each(function() {
        var content = $(this).html();

        if (content.length > showChar) {

        var c = content.substr(0, showChar);
        var h = content.substr(showChar, content.length - showChar);

        var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

        $(this).html(html);
        }

    });

    $(".morelink").click(function() {
        if ($(this).hasClass("less")) {
        $(this).removeClass("less");
        $(this).html(moretext);
        } else {
        $(this).addClass("less");
        $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
    });
</script>

<script type="text/javascript">
  $(function () {
    var table = $('.post_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('posts.index') }}",
        columns: [
            {data: 'titel', name: 'titel'},
            {data: 'desc', name: 'desc'},
            {data: 'publish', name: 'publish'},
            {data: 'titel_english', name: 'titel_english'},
            {data: 'desc_english', name: 'desc_english'},
            {data: 'publish_english', name: 'publish_english'},
            {data: 'category', name: 'category'},
            {data: 'headline', name: 'headline'},
            {data: 'tgl_publish', name: 'tgl_publish'},
            {data: 'user_id', name: 'user_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>
{{-- HIDE SHOW INPUT --}}
<script>
    $(function() {
    $('#dokumen').hide(); 
    $('#pdf').hide(); 
    $('#link').hide(); 
    $('#jeniskonten').change(function(){
        if($('#jeniskonten').val() == '1') {
            $('#dokumen').show(); 
        } else {
            $('#dokumen').hide(); 
        } 
        if($('#jeniskonten').val() == '2') {
            $('#link').show(); 
        } else {
            $('#link').hide(); 
        } 
        if($('#jeniskonten').val() == '3') {
            $('#pdf').show(); 
        } else {
            $('#pdf').hide(); 
        } 
        
    });
});
</script>
{{-- // END HID SHOW --}}
<script>
     $(document).ready(function(){
        
             if($('#jeniskonten') == 1){
                    $('#xkonten').show();
                    $('#xpdf').hide();
                    $('#xurl').hide();
                }else if($('#jeniskonten') == 2){
                    $('#xkonten').hide();
                    $('#xpdf').show();
                    $('#xurl').hide();
                }else if($('#jeniskonten') == 3){
                    $('#xkonten').hide();
                    $('#xpdf').hide();
                    $('#xurl').show();
                }else{
                    $('#xkonten, #xpdf, #xurl').hide();
                }
            $('#xkonten, #xpdf, #xurl').hide();
            $('#jeniskonten').change(function(e){
                e.preventDefault();
                if($('#jeniskonten').val() == 1){
                    $('#xkonten').show();
                    $('#xpdf').hide();
                    $('#xurl').hide();
                }else if($('#jeniskonten').val() == 2){
                    $('#xkonten').hide();
                    $('#xpdf').show();
                    $('#xurl').hide();
                }else if($('#jeniskonten').val() == 3){
                    $('#xkonten').hide();
                    $('#xpdf').hide();
                    $('#xurl').show();
                }else{
                    $('#xkonten, #xpdf, #xurl').hide();
                }
            });
       });
</script>