<?php 
    $sarpras = \DB::table('ms_sarpras')->where('id', $id)->first();
    $fotos   = \DB::table('ms_sarpras_foto')->where('id_sarpras', $id)->get();
    $src    = "https://www.google.com/maps/embed/v1/place?q=".$sarpras->lokasi."&amp;key=AIzaSyBIQD78uOWLcLkWMAG0-gRWEK5Qf2LAzeE";
      
?>
<style type="text/css">
    #map_canvas{
        width: 100%;
        height: 300px;
    }
</style>

{{View::make('portal.header')}}
<section id="page-heading" style="background-image:url({{asset('/assets/sarpras/simpanglima.jpg')}})">

    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="{{url()}}">Beranda</a></li>
                    <li><a href="{{url()}}/sarpras">Sarpras</a></li>
                    <li class="active">{{@$sarpras->jenis_sarpras}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="isi-data">
    @if($sarpras)
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="section-heading">{{$sarpras->judul_artikel}}</div>
                <br>

                <p>{{$sarpras->konten}}</p>
                <hr>
                
            </div>
            <div class="col-md-4">
                @if($fotos)
                    @foreach($fotos as $foto)
                        <a href="{{asset('/packages/upload/sarpras/'.$foto->foto)}}" class="thumbnail" rel="prettyPhoto[pp_gal]">
                            <img class="img-responsive" src="{{asset('/packages/upload/sarpras/'.$foto->foto)}}" alt="">
                            <div class="caption">
                                <b>{{$foto->judul_foto}}</b>
                            </div>
                        </a>
                    @endforeach
                @endif

                @if($sarpras->lokasi != '')
                    <!-- <iframe src="{{$src}}" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                    <div id="map_canvas"></div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <!-- <a href="sarpras-bandara.php" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i> Bandara International</a> &nbsp;  -->
                <a href="{{url().'/sarpras'}}" class="btn btn-warning"><i class="glyphicon glyphicon-th-list"></i> Semua Sarpras</a>
                <hr>
            </div>
        </div>
    </div>
    @else
        not found
    @endif
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
        var myLatLng = new google.maps.LatLng({{@$sarpras->lokasi}});
        var mapOptions = {
            zoom: 15,
            minZoom: 8,
            center: myLatLng
        };

        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: '{{@$sarpras->jenis_sarpras}}'
        });
    }

    $(document).ready(function(){
        loadAPI(initialize); 
    });
</script>