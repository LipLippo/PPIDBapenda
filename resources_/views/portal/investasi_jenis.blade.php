<?php 
    $inv       = \DB::table('ms_investasi')->where('id', Request::segment(2))->first();
    $investasi = \DB::table('ms_kategori_investasi')->where('idjenis', Request::segment(2))->get();
?>

{{View::make('portal.header')}}
<section id="page-heading" style="background-image:url({{asset('/assets/images/simpanglima.jpg')}})">
    
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="{{url()}}">Beranda</a></li>
                    <li><a href="{{url()}}/investment">Investasi</a></li>
                    <li class="active">{{@$inv->nama_investasi}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="isi-data">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-heading">Investasi - {{@$inv->nama_investasi}}</div>
            </div>
            @foreach($investasi as $invest)
                @if($invest->isicon == 1)
                    <div class="col-xs-6 col-sm-2 featured-container wow fadeInDown" data-wow-offset="270">
                        <a href="{{url()}}/investment/{{$inv->id}}/{{$invest->id}}" class="featured-item">
                            <i class="{{$invest->icon}}"></i>
                            <span class="label featured-item-label">{{@$invest->nama_kategori}}</span>
                        </a>
                    </div>
                @else
                    <div class="col-xs-6 col-sm-3 col-md-2 grid5">
                        <a href="{{url()}}/investment/{{$inv->id}}/{{$invest->id}}" class="clearfix well well-sm featured-list-item" target="_blank" title="{{@$invest->nama_kategori}}">
                            <div class="col-xs-4">
                                <img src="{{asset('/packages/upload/investasi/'.$invest->foto)}}" alt="{{@$invest->nama_kategori}}" width="100%">
                            </div>
                            <div class="col-xs-8">
                                <b>{{@$invest->nama_kategori}}</b>
                            </div>
                        </a>
                    </div>
                    
                @endif
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <a href="{{url()}}/investment" class="btn btn-warning"><i class="glyphicon glyphicon-th-list"></i> Show all investment</a>
                <hr>
            </div>
        </div>
    </div>
</section>

{{View::make('portal.footer')}}