
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
                    <a property="item" typeof="WebPage" href="{{url()}}/tracking">
                        <span property="name">Lacak Perizinan</span></a>
                    <span property="position" content="2"></span>
                </li>
            </ul>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
            <div class="artikel-items detail">
                <h1 class="artikel-judul detail">Lacak Perizinan</h1>

                <div class="artikel-isi">
                    <form class="navbar-form navbar-left" id="track" role="form" method="post">
                        <p>Masukkan nomor tiket Anda</p>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control num" id="nomor" placeholder="Nomor Tiket..." maxlength="12" required="" type="text" autocomplete="off" style="width:300px">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>
                        </div>

                    </form>

                    

                    <br/><br/><br/><br/><br/>
                    <div id="hasil">
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

{{View::make('portal.footer')}}

<script type="text/javascript">
//ptsp.bpmd.jatengprov.go.id/ptsp/public/search
    $(document).ready(function(){
        $('#track').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: "{{url()}}/trackizin",
                type: "post",
                data: {'ticket' : $('#nomor').val()},
                beforeSend: function(){
                    $('#hasil').html('Fetching data...');
                },
                success: function(data){
                    $('#hasil').html(data);
                }
            });
        });
    });
</script>