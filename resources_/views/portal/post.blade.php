<?php
    $page = get_post($id); 
    $cat = get_post_categories($id);
    $rolebahasa = \Session::get('bahasa');
?>

{{View::make('portal.header',array('judul'=> @$page->titel,'type' => 'pages'))}}
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">                        
            <ul vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb" id="bc1">
                <li property="itemListElement" typeof="ListItem" >
                    <a property="item" typeof="WebPage" href="{{url('')}}">
                        <span property="name">Beranda</span></a>
                    <span property="position" content="1"></span>
                </li>
                <li property="itemListElement" typeof="ListItem" >
                    <a property="item" typeof="WebPage" href="{{url('')}}/category/{{strtolower(str_replace(' ','-',strtolower(str_replace(' ','-',@$cat[0]))))}}">
                        <span property="name">{{@$cat[0]}}</span></a>
                    <span property="position" content="2"></span>
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{url('')}}/p/{{@$page->id}}/{{@$page->url}}">
                        <span property="name">{{($rolebahasa == 'en')?@$page->titel_english:@$page->titel}}</span></a>
                    <span property="position" content="3"></span>
                </li>
            </ul>
        </div>
        <div class="col-xs-12">
            <div class="artikel-items detail">
                @if(count((array)$page) > 0)
                <div class="artikel-waktu">
                    Diposkan &nbsp; {{@tanggal($page->tgl_publish)}} &nbsp; {{@jam(substr($page->tgl_publish,11,5))}} WIB &nbsp; Oleh : {{($page->isadmin == 2)?'Pegawai':$page->name}} &nbsp; <a href="{{url('')}}/category/{{strtolower(str_replace(' ','-',strtolower(str_replace(' ','-',@$cat[0]))))}}"><i class="fa fa-fw fa-tag"></i> {{@$cat[0]}}</a>
                </div>
                <h1 class="artikel-judul detail">{{($rolebahasa == 'en')?$page->titel_english:$page->titel}}</h1>
                @if(@$page->fav != '')
                <figure>
                    <?php
                        if(@$page->fav != ''){
                            if (file_exists('./packages/photo/' . @$page->fav)) {
                                $img = asset('/packages/photo/' . @$page->fav);
                            } else {
                                $img = asset('/packages/photo/noimage.jpg');
                            }
                        }else {
                            $img = asset('/packages/photo/noimage.jpg');
                        }
                    ?>
                    <div class="text-center mb-5">
                        <img src="{{$img}}" alt="{{$page->titel}}" width="50%">
                    </div>
                    <!--<figcaption>
                        <p>keterangan gambar</p>
                    </figcaption>-->
                </figure>
                @endif
                <div class="artikel-isi">
                    {{($rolebahasa == 'en')?$page->content_english:$page->content}}
                </div>

                <hr>
                    <p>
                        <strong>Share: </strong>
                        <div id="sharesocial"></div>
                    </p>
                <hr>

                <div class="komentar">
                    <div class="fb-comments" data-href="{{url('')}}/p/{{@$page->id}}/{{@$page->url}}" data-numposts="100" data-width="670"></div>
                </div>
                @else
                    Halaman tidak ditemukan.<br>
                    » <a href="{{url('')}}">Kembali ke Beranda</a>
                @endif
            </div>
        </div>
        <!-- {{View::make('portal.sidebar')}}         -->
    </div>
</div>

<section id="berita-utama" class="well well-lg " >
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInDown" data-wow-offset="360">
                <div class="section-heading">Liputan Utama <span class="indeks"><a href="{{url('')}}/category/liputan utama">indeks</a></span></div>
            </div>
        </div>
        <div class="row slick-carousel-1 wow fadeInDown" data-wow-delay=".5s" data-wow-offset="360">
            <?php $posts = get_posts_by_cat('Liputan Utama',6,'tgl_publish','desc'); ?>
            @foreach($posts as $post)
            <?php
                if(@$post->fav != ''){
                    if(file_exists('./packages/photo/'.@$post->fav)){
                        $img = asset('/packages/photo/'.@$post->fav);
                    }else{
                        $img = asset('/packages/photo/noimage.jpg');
                    }
                }else{
                    $img = asset('/packages/photo/noimage.jpg');
                }
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <figure class="materi-item" style="background-image:url({{$img}});">
                    <figcaption>
                        <h2 class="materi-judul"><a href="{{url('')."/p/".$post->id."/".$post->url}}">{{($rolebahasa=='en')?$post->titel_english:$post->titel}}</a></h2>
                        <span class="waktu-upload"><i class="fa fa-fw fa-calendar-plus-o"></i> {{@tanggal($post->tgl_publish)}} {{@jam(substr($post->tgl_publish,11,5))}}</span> &nbsp;&nbsp;
                        <a href="{{url('')}}" class="materi-kategori"><i class="fa fa-fw fa-tag"></i> {{$post->category}} </a>
                    </figcaption>
                </figure>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="berita-daerah" class="well well-lg " >
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInDown" data-wow-offset="360">
                <div class="section-heading">Liputan Daerah <span class="indeks"><a href="{{url('')}}/category/liputan daerah">indeks</a></span></div>
            </div>
        </div>
        <div class="row slick-carousel-1 wow fadeInDown" data-wow-delay=".5s" data-wow-offset="360">
            <?php $posts = get_posts_by_cat('Liputan Daerah',6,'tgl_publish','desc'); ?>
            @foreach($posts as $post)
            <?php
                if(@$post->fav != ''){
                    if(file_exists('./packages/photo/'.@$post->fav)){
                        $img = asset('/packages/photo/'.@$post->fav);
                    }else{
                        $img = asset('/packages/photo/noimage.jpg');
                    }
                }else{
                    $img = asset('/packages/photo/noimage.jpg');
                }
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <figure class="materi-item" style="background-image:url({{$img}});">
                    <figcaption>
                        <h2 class="materi-judul"><a href="{{url('')."/p/".$post->id."/".$post->url}}">{{($rolebahasa=='en')?$post->titel_english:$post->titel}}</a></h2>
                        <span class="waktu-upload"><i class="fa fa-fw fa-calendar-plus-o"></i> {{@tanggal($post->tgl_publish)}} {{@jam(substr($post->tgl_publish,11,5))}}</span> &nbsp;&nbsp;
                        <a href="{{url('')}}" class="materi-kategori"><i class="fa fa-fw fa-tag"></i> {{$post->category}} </a>
                    </figcaption>
                </figure>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{View::make('portal.footer')}}