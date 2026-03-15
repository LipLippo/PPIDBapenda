<style type="text/css">
    .biru_tua{
        background-color: #3ba8ce;
        background-image: linear-gradient(to bottom, #72cfef 0%, #44bfea 100%);
        background-repeat: repeat-x;
        border-color: #16ace0;
        color: #ffffff;
    }
</style>
{{View::make('portal.header')}}
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">                        
            <ul vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb" id="bc1">
                <li property="itemListElement" typeof="ListItem" >
                    <a property="item" typeof="WebPage" href="{{url()}}">
                        <span property="name">Beranda</span></a>
                    <span property="position" content="1"></span>
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{url()}}/perizinan">
                        <span property="name">Perizinan</span></a>
                    <span property="position" content="2"></span>
                </li>
            </ul>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
            <div class="artikel-items detail">
                <h1 class="artikel-judul detail">Perizinan</h1>
                Kategori
                {{  \MasterizinModel::listKategoriIzin('kategori', 1) }}
                <br/><br/>
                <div class="row" id="listizin">

                </div>
            </div>
        </div>
        
    </div>
</div>

{{View::make('portal.footer')}}

<script type="text/javascript">
    $(document).ready(function(){
        initPerizinan();
        $('#kategori').trigger('change');
        // $('select').select2();
        $('#track').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: "http://ptsp.bpmd.jatengprov.go.id/ptsp/public/search",
                type: "post",
                jsonpCallback: 'jsonCallback',
                dataType: "jsonp",
                
                data: {'t': 'searchTicket', 'ticket' : $('#nomor').val()}
                // success: function(ret){
                    // res = JSON.parse(ret);
                    // console.log(ret);


                // }
            });
        });

        function jsonCallback(json){
          console.log(json.toString());
        }
        function initPerizinan(){
            $('#kategori').on('change', function(e){
                e.preventDefault();
                $.ajax({
                    url: '{{url()}}/listizin',
                    type: 'post',
                    data: {'kategori' : $('#kategori').val()},
                    success: function(html){
                        $('#listizin').html(html);
                    }
                });
            });
        }

    });
</script>