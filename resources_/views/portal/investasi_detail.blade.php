<?php 
    $ms        = \DB::table('ms_investasi')->where('id', Request::segment(2))->first();
    $inv       = \DB::table('ms_kategori_investasi')->where('id', Request::segment(3))->first();
    $invest    = \DB::table('ms_konten_investasi')->where('id', Request::segment(4))->first();
    $gambars   = \DB::table('ms_investasi_foto')
    // ->where('idkat', Request::segment(2))
    //                                             ->where('idjenis', Request::segment(3))
                                                ->where('idinvestasi', Request::segment(4))
                                                ->get();
?>

<style type="text/css">
    #map_canvas{
        width: 100%;
        height: 300px;
    }
</style>

{{View::make('portal.header')}}
<section id="page-heading" style="background-image:url({{asset('/assets/investasi/sapi.jpg')}})">

    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="{{url()}}">Beranda</a></li>
                    <li><a href="{{url()}}/investment">Investasi</a></li>
                    <li><a href="{{url()}}/investment/{{$ms->id}}">{{@$ms->nama_investasi}}</a></li>
                    <li><a href="{{url()}}/investment/{{$ms->id}}/{{$inv->id}}">{{$inv->nama_kategori}}</a></li>
                    <li class="active">{{$invest->judul}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="isi-data">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="section-heading">{{$invest->judul}}</div>
                <br>
                
                    {{$invest->konten}}
                
                <hr>
                
            </div>
            <div class="col-md-4">
                @foreach($gambars as $gbr)
                    <a href="{{asset('/assets/investasi/'.$gbr->foto)}}" class="thumbnail" rel="prettyPhoto[pp_gal]">
                        <img class="img-responsive" src="{{asset('/packages/upload/investasi/'.$gbr->foto)}}" alt="">
                        <div class="caption">
                            <b>{{$gbr->judul_foto}}</b>
                        </div>
                    </a>
                @endforeach

                @if($invest->lonlat != '')
                    <div id="map_canvas"></div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <a href="{{url()}}/investment/{{$ms->id}}" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i> Investasi {{$ms->nama_investasi}}</a> &nbsp; 
                <a href="{{url()}}/investment/{{$ms->id}}/{{$inv->id}}" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> Investasi {{$inv->nama_kategori}}</a> &nbsp; 
                <a href="{{url()}}/investment" class="btn btn-warning"><i class="glyphicon glyphicon-th-list"></i> Show all investment</a>
                <hr>
            </div>
        </div>
    </div>
</section>

{{View::make('portal.footer')}}

<script type="text/javascript">
    var loadAPIPromise;
    function loadAPI(callback) {
        if (!loadAPIPromise) {
            var deferred = $.Deferred();
                $.ajax({
                    url: 'http://www.google.com/jsapi/',
                    dataType: "script",
                    success: function() {
                        google.load('maps', '3', {
                            callback: function() {
                                deferred.resolve();
                            }, 
                            other_params: 'sensor=false'
                        });
                    }
                });
                loadAPIPromise = deferred.promise();
        }
        loadAPIPromise.done(callback);
    };

    function initialize() {
        var myLatLng = new google.maps.LatLng({{$invest->lonlat}});
        var mapOptions = {
            zoom: 15,
            minZoom: 8,
            center: myLatLng
        };

        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: '{{@$invest->lonlat}}'
        });
    }

    $(document).ready(function(){
        loadAPI(initialize); 
    });
</script>