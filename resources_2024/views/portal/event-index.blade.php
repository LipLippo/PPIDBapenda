<?php
    if($halaman == 'sekarang'){
        $page = \DB::table('event')->select('event.*', 'users.name')
            ->leftjoin('users', 'event.user_id', '=', 'users.id')
            ->whereRaw('event.flag =1 and (CURDATE() = DATE_FORMAT(datetime, "%Y-%m-%d"))')
            ->orderBy('event.datetime','desc')
            ->paginate($_ENV['configurations']['list-limit']);
    }else if($halaman == 'besok'){
        $page = \DB::table('event')->select('event.*', 'users.name')
            ->leftjoin('users', 'event.user_id', '=', 'users.id')
            ->whereRaw('event.flag =1 and (DATE_ADD(CURDATE(), INTERVAL 1 DAY) = DATE_FORMAT(datetime, "%Y-%m-%d"))')
            ->orderBy('event.datetime','desc')
            ->paginate($_ENV['configurations']['list-limit']);
    }else{
        $page = \DB::table('event')->select('event.*', 'users.name')
            ->leftjoin('users', 'event.user_id', '=', 'users.id')->where('event.flag',1)
            ->orderBy('event.datetime','desc')
            ->paginate($_ENV['configurations']['list-limit']);
    }
?>

{{View::make('portal.header',array('judul'=> 'Agenda Kegiatan','type' => 'pages'))}}

<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title">Indeks Agenda</h1>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <ul class="artikel-daftar">
                @foreach($page as $p)
                <li class="artikel-items agenda clearfix">
                    <div class="col-sm-12">
                        <h2 class="artikel-judul"><a href="{{url()}}/agenda/detail/{{$p->id}}/{{$p->url}}">{{$p->title}}</a></h2>
                        <div class="artikel-waktu">
                            <i class="fa fa-fw fa-calendar-plus-o"></i>&nbsp; {{@tanggal($p->datetime)}} &nbsp;&nbsp;&nbsp; <i class="fa fa-fw fa-clock-o"></i>&nbsp; {{@jam(substr($p->datetime,11,5))}} WIB &nbsp;&nbsp;&nbsp; <i class="fa fa-fw fa-map-marker"></i> {{@$p->lokasi}}
                        </div>
                        <div class="artikel-cuplikan">
                            {{substr(strip_tags($p->deskripsi),0,160)}}{{($p->deskripsi!='')?'...':''}}
                        </div>
                    </div>
                </li>
                @endforeach
                {{$page->links()}}
            </ul>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title">Filter Agenda</h3>
                </div>
                <div class="list-group">
                    <a href="{{url()}}/agenda/index" class="list-group-item {{($halaman == 'index')?'active':''}}"><h4>Tampilkan semua agenda</h4></a>
                    <a href="{{url()}}/agenda/sekarang" class="list-group-item {{($halaman == 'sekarang')?'active':''}}"><h4>Tampilkan agenda hari ini</h4></a>
                    <a href="{{url()}}/agenda/besok" class="list-group-item {{($halaman == 'besok')?'active':''}}"><h4>Tampilkan agenda besok</h4></a>
                </div>
            </div>
        </div>
    </div>
</div>

{{View::make('portal.footer')}}