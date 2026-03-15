{{View::make('portal.ppid_header')}}

<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ul class="breadcrumb">
                <li><a href="{{url('')}}">Beranda</a></li>
                <li class="active">PPID Bapenda Prov. Jateng</li>
            </ul>
        </div>
        <div class="col-md-12">
            <!-- slider -->
            <div class="camera_wrap camera_orange_skin" id="slider1">
                <?php $rssliders = DB::table('ppid_image_slider')->where('flag_portal', 1)->orderBy('order', 'asc')->get(); ?>
                @if(count($rssliders) > 0)
                @foreach($rssliders as $rsslider)
                <div data-src="{{asset('/packages/upload/slider/'.$rsslider->img)}}">
                    <div class="camera_caption fadeIn">
                        <!--<h1>{{$rsslider->caption}}</h1>-->
                        {{$rsslider->caption}}
                    </div>
                </div>
                @endforeach
                @endif
            </div><!-- #slider1 -->            
        </div>
        <!-- <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9"> -->
        <div class="col-xs-12">
            <div class="artikel-items detail">
                <h1 class="artikel-judul detail">Sambutan PPID Bapenda Prov. Jateng</h1>
                <div class="artikel-isi">
                    <?php
                    $row = DB::table('ppid_main_menu')->where('id', 1)->first();
                        echo $row->konten;
                    ?>
                </div>
            </div>
        </div>
      
    </div>
</div>

{{View::make('portal.ppid_footer')}}