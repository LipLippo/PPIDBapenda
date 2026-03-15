{{View::make('portal.header')}}
<section id="page-heading" style="background-image:url({{asset('/assets/investasi/simpanglima.jpg')}})">

    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="{{url()}}">Beranda</a></li>
                    <li class="active">Investasi</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php 
    $investasi = \DB::table('ms_investasi')->get();
?>

<section id="isi-data">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-heading">Investasi</div>
            </div>
            @foreach($investasi as $invest)
                <div class="col-xs-6 col-sm-3 featured-container wow fadeInDown" data-wow-offset="270">
                    <a href="{{url()}}/investment/{{$invest->id}}" class="featured-item">
                        <i class="{{ $invest->icon }}"></i>
                        <span class="label featured-item-label">{{ $invest->nama_investasi }}</span>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
    </div>
</section>

{{View::make('portal.footer')}}