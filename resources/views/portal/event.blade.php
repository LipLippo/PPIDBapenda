<?php
    $page = \DB::table('event')->select('event.*', 'users.name')->leftjoin('users', 'event.user_id', '=', 'users.id')->where('event.id',$id)->where('event.flag', 1)->first();
    if(count($page) == 0){
        header('Location: '.url().'/agenda/index');
        exit();
    }
?>

{{View::make('portal.header',array('judul'=> $page->title,'type' => 'pages'))}}
<script>
    $( document ).ready(function() {
        $('#sharesocial').share({
            networks: ['email','pinterest','tumblr','googleplus','digg','in1','facebook','twitter','linkedin','stumbleupon'],
            theme: 'square'
        });
    });

</script>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ul class="breadcrumb">
                <li><a href="{{url()}}">Beranda</a></li>
                <li><a href="{{url()}}/agenda/index">Agenda</a></li>
                <li class="active">{{$page->title}}</li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="artikel-items agenda detail">
                <div class="artikel-waktu">
                    <i class="fa fa-fw fa-calendar-o"></i>&nbsp; {{@tanggal($page->datetime)}} &nbsp;&nbsp;&nbsp; <i class="fa fa-fw fa-clock-o"></i>&nbsp; {{@jam(substr($page->datetime,11,5))}} WIB &nbsp;&nbsp;&nbsp; <i class="fa fa-fw fa-map-marker"></i> {{@$page->lokasi}}
                </div>
                <h1 class="artikel-judul detail">{{$page->title}}</h1>
                
                <div class="artikel-isi">
                    <p>{{$page->deskripsi}}</p>
                </div>
            </div>
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