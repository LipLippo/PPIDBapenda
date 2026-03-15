
{{View::make('portal.header',array('judul'=> 'Testimonial','type' => 'pages'))}}

<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ul vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb" id="bc1">
                <li property="itemListElement" typeof="ListItem" >
                    <a property="item" typeof="WebPage" href="{{url()}}">
                        <span property="name">Beranda</span></a>
                    <span property="position" content="1"></span>
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="#">
                        <span property="name">Testimonial</span></a>
                    <span property="position" content="2"></span>
                </li>
            </ul>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
            <div class="artikel-items detail">

                <h1 class="artikel-judul detail">Testimonial</h1>

                <ul class="artikel-daftar row">

                    <?php $rs = \DB::table('testimonial')->where('flag', 1)->orderBy('order', 'asc')->paginate($_ENV['configurations']['list-limit']);?>
                    @if(count($rs) > 0)
                    @foreach($rs as $item)
                    <li class="testimonial-item col-md-3 wow fadeInDown" data-wow-delay=".5s" data-wow-offset="450">
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="{{asset('/packages/upload/users/'.$item->foto)}}" alt="{{$item->nama}}" class="img-responsive img-circle">
                            </div>
                            <div class="col-xs-8 small-padding">
                                <b class="nama">{{$item->nama}}</b>
                                <b class="jabatan">{{$item->institusi}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 isi">
                                <p><em>{{$item->testimonial}}</em></p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    @else
                        Testimonial tidak tersedia.
                    @endif

                </ul>

                <div class="pagination pagination-lg">
                    {{$rs->links()}}
                </div>

            </div>
        </div>
    </div>
</div>

{{View::make('portal.footer')}}