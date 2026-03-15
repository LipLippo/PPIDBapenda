
{{View::make('portal.header',array('judul'=> 'PTSP Kabupaten Kota','type' => 'pages'))}}
<br>
<div id="isi_data">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-heading">PTSP Kabupaten Kota</div>
            </div>

            <?php $rstautans = \DB::table('tautan')->where('jnstautan', 2)->where('flag', 1)->orderBy('order', 'asc')->get(); ?>
            @if(count($rstautans) > 0)
            @foreach($rstautans as $rstautan)
            <?php
                if(@$rstautan->foto != ''){
                    if (file_exists('./packages/upload/galeri/'.@$rstautan->foto)) {
                        $img = asset('/packages/upload/galeri/'.@$rstautan->foto);
                    } else {
                        $img = asset('/assets/images/banner-pranala.jpg');
                    }
                }else {
                    $img = asset('/assets/images/banner-pranala.jpg');
                }
            ?>

                <div class="col-xs-6 col-sm-3 col-md-2 grid5">
                    <a href="{{$rstautan->url}}" target="{{$rstautan->target}}" title="{{$rstautan->title}}" class="clearfix well well-sm featured-list-item">
                        <div class="col-xs-4">
                            <img src="{{$img}}" alt="{{$rstautan->title}}" width="100%">
                        </div>
                        <div class="col-xs-8">
                            <b>{{$rstautan->title}}</b>
                        </div>
                    </a>
                </div>
            @endforeach
            @else
                Tautan PTSP Kabupaten Kota tidak tersedia.
             @endif
        </div>
    </div>
</div>

{{View::make('portal.footer')}}