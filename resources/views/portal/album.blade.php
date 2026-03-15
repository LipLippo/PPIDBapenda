<?php
    if ($cat == 'all') {
        $albums = get_list_album();
    } elseif ($cat == 'video') {
        $albums = get_list_video();
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
                    <a property="item" typeof="WebPage" href="#">
                        @if($cat == 'all')
                        <span property="name">Album Foto</span>
                        @elseif($cat == 'video')
                        <span property="name">Album Video</span>
                        @endif
                    </a>
                    <span property="position" content="2"></span>
                </li>
            </ul>
        </div>
        <div class="col-xs-12">
            <h1 class="page-title">{{($cat == 'all')?'Album Foto':'Album Video'}}</h1>
        </div>
        <div class="col-xs-12">
            <section class="galeri galeri-foto">
                <div class="clearfix">                    
                    @foreach($albums as $album)
                        <?php
                            if ($cat == 'all') {
                                $q = DB::table('galeri')->where('flag', 1)->where('id_album', $album->id)->get();

                                if(@$q[0]->foto != ''){
                                    if (file_exists('./packages/upload/galeri/'.@$q[0]->foto)) {
                                        $img = asset('/packages/upload/galeri/'.@$q[0]->foto);
                                    } else {
                                        $img = asset('/packages/photo/noimage.jpg');
                                    }
                                }else {
                                    $img = asset('/packages/photo/noimage.jpg');
                                }
                            } else {
                                if(@$album->foto != ''){
                                    if (file_exists('./packages/upload/galeri/' .@$album->foto)) {
                                        $img = asset('/packages/upload/galeri/'.@$album->foto);
                                    } else {
                                        $img = asset('/packages/photo/noimage.jpg');
                                    }
                                }else {
                                    $img = asset('/packages/photo/noimage.jpg');
                                }
                            }
                        ?>
                        @if($cat == 'all')                                
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <a class="galeri-item" href="{{url('')}}/galeri/foto/{{$album->id}}" title="{{$album->album}}" class="gambar">                                
                                <figure style="background-image:url({{$img}});">                                        
                                    <figcaption>
                                        <h4>{{$album->album}}</h4>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>                                                 
                        @else     
                        {{-- <?php
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $album->url, $matches);
                            $id_video_youtube = $matches[1];
                            $link_youtube = "https://www.youtube.com/embed/".$id_video_youtube."?rel=0";
                        ?> --}}
                        <div class="col-xs-12 col-sm-6">
                            <!-- <a class="galeri-item" href="{{$album->url}}" title="{{$album->keterangan}}" rel="prettyPhoto[pp_gal]" class="gambar">
                                <figure style="background-image:url({{$img}});">
                                    <figcaption>
                                        <h4>{{$album->keterangan}}</h4>
                                    </figcaption>
                                </figure>
                            </a> -->
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$album->url}}" allowfullscreen></iframe>
                               
                            </div>
                        </div>                                                
                        @endif
                    @endforeach                                                           
                </div>
                                
                <div class="artikel-isi">
                    {{$albums->links()}}
                </div>
            </section>
        </div>


    </div>
</div>

{{View::make('portal.footer')}}