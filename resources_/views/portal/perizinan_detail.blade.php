
{{View::make('portal.header')}}
<?php 
    $izin = \DB::table('tr_izin')
                ->join('ms_izin', 'ms_izin.id', '=', 'tr_izin.idizin')
                ->where('tr_izin.id', $id)
                ->first();
?>
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
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{url()}}/perizinan">
                        <span property="name">{{$izin->namaizin}}</span></a>
                    <span property="position" content="3"></span>
                </li>
            </ul>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
            <div class="artikel-items detail">
                <h1 class="artikel-judul detail">{{  $izin->namaizin }}</h1>
                <h3>{{  $izin->judul }}</h3>

                <br/><br/>
                <div class="row" id="detailizin">
                    <ul class="nav nav-tabs">
                          <li class="active"><a href="#syarat"  data-toggle="tab">Persyaratan</a></li>
                          <li><a href="#mekanisme" data-toggle="tab">Mekanisme Pelayanan</a></li>
                          <li><a href="#dasar" data-toggle="tab">Dasar Hukum</a></li>
                          <li><a href="#definisi" data-toggle="tab">Definisi</a></li>
                          <li><a href="#biaya" data-toggle="tab">Biaya</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="syarat">{{ ($izin->persyaratan != '')?$izin->persyaratan:'<br>Tidak ada data' }}</div>
                        <div class="tab-pane" id="mekanisme">{{ ($izin->mekanisme != '')?$izin->mekanisme:'<br>Tidak ada data' }}</div>
                        <div class="tab-pane" id="dasar">{{ ($izin->dasar_hukum != '')?$izin->dasar_hukum:'<br>Tidak ada data' }}</div>
                        <div class="tab-pane" id="definisi">{{ ($izin->definisi != '')?$izin->definisi:'<br>Tidak ada data' }}</div>
                        <div class="tab-pane" id="biaya">{{ ($izin->biaya != '')?$izin->biaya:'<br>Tidak ada data' }}</div>
                    </div>
                </div>

                <br>
                <a href="http://perizinan.dpmptsp.jatengprov.go.id" class="btn btn-lg btn-success" target="_blank"> Ajukan Ijin <i class="fa fa-fw fa-angle-double-right"></i></a>
            </div>
        </div>
        
    </div>
</div>

{{View::make('portal.footer')}}

<script type="text/javascript">
    $(document).ready(function(){
        

    });
</script>