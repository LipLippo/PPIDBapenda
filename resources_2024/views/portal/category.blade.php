<?php $page = get_posts_paginate_by_cat($cat); ?>

{{View::make('portal.header',array('judul'=> @$page[0]->category,'type' => 'pages'))}}
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title">Indeks {{@$page[0]->category}}</h1>
        </div>
        <div class="col-xs-12">
            <ul class="artikel-daftar">
                @foreach($page as $post)
                <?php                     
                    if(file_exists('./packages/photo/'.@$post->fav)){
                        $img = asset('/packages/photo/'.@$post->fav);                                                
                    }else{
                        $img = asset('/packages/photo/noimage.jpg');
                    }                    
                ?>
                <li class="artikel-items clearfix">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <figure class="artikel-thumb" style="background-image:url({{$img}});"></figure>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <h2 class="artikel-judul"><a href="{{url('')."/p/".$post->id."/".$post->url}}">{{$post->titel}}</a></h2>
                        <div class="artikel-waktu">                            
                            {{-- Diposkan &nbsp; {{@tanggal($post->tgl_publish)}} &nbsp; {{@jam(substr($post->tgl_publish,11,5))}} WIB &nbsp; Oleh : {{($post->isadmin == 2)?'User Pegawai':$post->name}} &nbsp; <a href="{{url('')}}/category/{{strtolower(str_replace(' ','-',strtolower(str_replace(' ','-',@$page[0]->category))))}}"><i class="fa fa-fw fa-tag"></i> {{@$page[0]->category}}</a> --}}
                            Diposkan &nbsp; {{@tanggal($post->tgl_publish)}} &nbsp; {{@jam(substr($post->tgl_publish,11,5))}} WIB &nbsp; Oleh : {{($post->isadmin == 2)?'User Pegawai':$post->name}} &nbsp; <a href="{{url('')}}/categorys/{{ @$page[0]->category }}"><i class="fa fa-fw fa-tag"></i> {{@$page[0]->category}}</a>
                        </div>
                        <div class="artikel-cuplikan">
                            {{{substr($post->desc,0,160)}}}...
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="pagination pagination-lg">
                {{$page->links()}}
                
            </div>
        </div>
    </div>
</div>


{{View::make('portal.footer')}}