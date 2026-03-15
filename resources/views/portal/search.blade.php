<script type="text/javascript">
	 $(".datablejs.nosorting").DataTable({ "ordering":false });
</script>
{{View::make('portal.header')}}
@if($posts->first() == null)
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
            </ul>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="artikel-items detail">                
                <h1>Pencarian "{{$search}}" Tidak ditemukan</h1>                
            </div>
        </div>
        {{View::make('portal.sidebar')}}        
    </div>
</div>
@else
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
            </ul>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="artikel-items detail">
                <h1>Hasil Pencarian "{{ $search }}"</h1>                
                <ul class="artikel-daftar">
                    @foreach($posts as $post)
                    <?php
                        if (file_exists('./packages/photo/' . @$post->fav)) {
                            $img = asset('/packages/photo/' . @$post->fav);
                        } else {
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
                                Diposkan &nbsp; {{@tanggal($post->tgl_publish)}} &nbsp; {{@jam(substr($post->tgl_publish,11,5))}} WIB &nbsp; Oleh : {{($post->isadmin == 2)?'User Pegawai':$post->name}} &nbsp; <a href="{{url('')}}/category/{{strtolower(str_replace(' ','-',strtolower(str_replace(' ','-',@$page[0]->category))))}}"><i class="fa fa-fw fa-tag"></i> {{@$page[0]->category}}</a>
                            </div>
                            <div class="artikel-cuplikan">
                                {{{substr($post->desc,0,160)}}}...
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                {{-- {{$posts->links()}} --}}
            </div>
        </div>
        {{View::make('portal.sidebar')}}        
    </div>
</div>
@endif
{{View::make('portal.footer')}}
