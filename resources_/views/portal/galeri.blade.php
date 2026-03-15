<?php
if ($cat == 'foto') {
    $albums = get_album($album);
    $galeri = get_galeri($album);
}
?>

{{View::make('portal.header')}}
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">            
            <ul vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb" id="bc1">
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{url('')}}">
                        <span property="name">Beranda</span></a>
                    <span property="position" content="1"></span>
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{url('')}}/galeri/foto/all">
                        <span property="name">Album</span></a>
                    <span property="position" content="2"></span>
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="#">
                        <span property="name">{{$albums->album}}</span></a>
                    <span property="position" content="3"></span>
                </li>
            </ul>
        </div>
        <div class="col-xs-12">
            <h1 class="page-title">{{$albums->album}}</h1>
        </div>        
        <div class="col-xs-12">
            <section class="galeri galeri-foto">
                <div class="clearfix">
                    @foreach($galeri as $media)                    
                    <?php
                        if(@$media->foto != ''){
                            if (file_exists('./packages/upload/galeri/'.@$media->foto)) {
                                $img = asset('/packages/upload/galeri/'.@$media->foto);
                            } else {
                                $img = asset('/packages/photo/noimage.jpg');
                            }
                        }else {
                            $img = asset('/packages/photo/noimage.jpg');
                        }
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <a class="galeri-item" href="{{$img}}" rel="prettyPhoto[pp_gal]" title="{{$media->keterangan}}" class="gambar">                                                    
                            <figure style="background-image:url({{$img}});">                                        
                                <figcaption>
                                    <h4>{{$media->keterangan}}</h4>
                                </figcaption>
                            </figure>                            
                        </a>
                    </div>
                    @endforeach                                        
                </div>
                <div class="artikel-isi">
                    {{$galeri->links()}}
                </div>
            </section>
        </div>     
        
       
    </div>
</div>

{{View::make('portal.footer')}}