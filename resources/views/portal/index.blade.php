{{ View::make('portal.header') }}

<!-- ======= Hero Section ======= -->
<section id="herovideo" class="d-flex align-items-center" style="margin-top: -150px;">
    <video autoplay muted loop id="video-bg">
        <source src="{{ asset('portal/video/video.mp4') }}" type="video/mp4" />
    </video>
</section><!-- End Hero -->

<main id="main" style="background-image: url('{{env('APP_URL')}}/portal/images/background-bapenda.jpg'); background-repeat:repeat;">
    <section id="berita-utama" class="well well-lg" style="margin-top: 250px;">
        <div class="container  mb-5 p-0">
            <div class="card  p-4 py-0 mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-heading">Bidang Terkait</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mb-4">
                                <a href="{{ env("APP_URL") }}/page/bidang_sekretariat">
                                    <img style="max-width:120px; border: 1px solid #3B7CDA;" class="rounded-circle" src="{{env("APP_URL")}}/portal/images/Logo-Sekretariat.png?time={{time()}}"/>
                                    <div class="text-dark"><h4>Sekretariat</h4></div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6 text-center">
                                <a href="{{env("APP_URL") }}/page/bidang_pajak_kendaraan_bermotor">
                                    <img style="max-width:120px; border: 1px solid #3B7CDA;" class="rounded-circle" src="{{env("APP_URL")}}/portal/images/Logo-Bidang-Pajak-Kendaraan-Bermotor.png?time={{time()}}"/>
                                    <div class="text-dark"><h4>Bidang Pajak <br/> Kendaraan Bermotor</h4></div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6 text-center">
                                <a href="{{env("APP_URL") }}/page/bidang_retribusi_dan_pendapatan_lain">
                                    <img style="max-width:120px; border: 1px solid #3B7CDA;" class="rounded-circle" src="{{env("APP_URL")}}/portal/images/Logo-Bidang-Retribusi-dan-Pendapatan-Lain.png?time={{time()}}"/>
                                    <div class="text-dark"><h4>Bidang Retribusi <br/> Dan Pendapatan Lain</h4></div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6 text-center">
                                <a href="{{env("APP_URL") }}/page/bidang_evaluasi_dan_pembinaan">
                                    <img style="max-width:120px; border: 1px solid #3B7CDA;" class="rounded-circle" src="{{env("APP_URL")}}/portal/images/Logo-Bidang-Evaluasi-dan-Pembinaan.png?time={{time()}}"/>
                                    <div class="text-dark"><h4>Bidang Evaluasi <br/> Dan Pembinaan</h4></div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6 text-center">
                                <a href="{{env("APP_URL") }}/page/bidang_pengolahan_data_dan_pengembangan_pendapatan">
                                    <img style="max-width:120px; border: 1px solid #3B7CDA;" class="rounded-circle" src="{{env("APP_URL")}}/portal/images/Logo-Bidang-Pengolahan-Data-dan-Pengembangan-Pendapatan.png?time={{time()}}"/>
                                    <div class="text-dark"><h4>Bidang Pengolahan Data <br/> Dan Pengembangan Pendapatan</h4></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-0 d-none">
                <div class="col-md-12">
                    <table border="1" cellspacing="0" cellpadding="8" class="table table-light w-full" style="border-collapse: collapse; font-family: Arial, sans-serif; font-size: 14px; width: 220px;border-color:#dedede;width:100%">
                      <thead>
                        <tr style="background-color: #f44336 !important; color: white;">
                          <th colspan="2" style="background-color: #f44336 !important;text-align: left;font-size:20px">INFORMASI</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(\DB::table('main_menu')->where('id_parent','280')->orderBy('order')->get() as $info)
                        <tr>
                          <td>{{ $info->title }}</td>
                          <td><a href="{{ env('APP_URL').'/page/'.$info->url }}"><b><em>Download</em></b></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                </div>
            </div>
            
        </div>
        <div class="container card mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">Liputan Utama <span class="indeks"><a
                                href="{{ url('') }}/categorys/liputan utama">indeks</a></span></div>
                </div>
            </div>
            <div class="row slick-carousel-1">
                <?php $posts = get_posts_by_cat('Liputan Utama', 8, 'tgl_publish', 'desc'); ?>
                @foreach ($posts as $post)
                    <?php
                    if (@$post->fav != '') {
                        if (file_exists('./packages/photo/' . @$post->fav)) {
                            $img = asset('/packages/photo/' . @$post->fav);
                        } else {
                            $img = asset('/packages/photo/noimage.jpg');
                        }
                    } else {
                        $img = asset('/packages/photo/noimage.jpg');
                    }
                    ?>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                        <figure class="materi-item" style="background-image:url({{ $img }});">
                            <figcaption style="background-color: #00000099;">
                                <h2 class="materi-judul" style="font-size: 10px;"><a
                                        href="{{ url('') . '/p/' . $post->id . '/' . $post->url }}">{{ $post->titel }}</a>
                                </h2>
                                <span class="waktu-upload"><i class="fa fa-fw fa-calendar-plus-o"></i>
                                    {{ @tanggal($post->tgl_publish) }}
                                    {{ @jam(substr($post->tgl_publish, 11, 5)) }}</span> &nbsp;&nbsp;
                                <a href="{{ url('') }}" class="materi-kategori"><i class="fa fa-fw fa-tag"></i>
                                    {{ $post->category }} </a>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="container card">
            <div class="row">
                <div class="col-md-12 wow fadeInDown" data-wow-offset="360">
                    <div class="section-heading">Liputan Daerah <span class="indeks"><a
                                href="{{ url('') }}/categorys/liputan daerah">indeks</a></span></div>
                </div>
            </div>
            <div class="row slick-carousel-1 wow fadeInDown" data-wow-delay=".5s" data-wow-offset="360">
                <?php $posts = get_posts_by_cat('Liputan Daerah', 6, 'tgl_publish', 'desc'); ?>
                @foreach ($posts as $post)
                    <?php
                    if (@$post->fav != '') {
                        if (file_exists('./packages/photo/' . @$post->fav)) {
                            $img = asset('/packages/photo/' . @$post->fav);
                        } else {
                            $img = asset('/packages/photo/noimage.jpg');
                        }
                    } else {
                        $img = asset('/packages/photo/noimage.jpg');
                    }
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <figure class="materi-item" style="background-image:url({{ $img }});">
                            <figcaption style="background-color: #00000099;">
                                <h2 class="materi-judul" style="font-size: 10px;"><a
                                        href="{{ url('') . '/p/' . $post->id . '/' . $post->url }}">{{ $post->titel }}</a>
                                </h2>
                                <span class="waktu-upload"><i class="fa fa-fw fa-calendar-plus-o"></i>
                                    {{ @tanggal($post->tgl_publish) }}
                                    {{ @jam(substr($post->tgl_publish, 11, 5)) }}</span> &nbsp;&nbsp;
                                <a href="{{ url('') }}" class="materi-kategori"><i class="fa fa-fw fa-tag"></i>
                                    {{ $post->category }} </a>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </section>




    <section class="well well-lg" style="background-color: #ecf0f1;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">Instagram</div>
                    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                    <div class="elfsight-app-01ba4cd5-2025-46c0-ae0f-877b4132ee3b"></div>

                    <!-- Place <div> tag where you want the feed to appear -->
                    <div id="curator-feed-mini"><a href="https://curator.io" target="_blank"
                            class="crt-logo crt-tag">Powered by Curator.io</a></div>
                    <!-- The Javascript can be moved to the end of the html page before the </body> tag -->
                    <script type="text/javascript">
                        /* curator-feed-mini */
                        (function() {
                            var i, e, d = document,
                                s = "script";
                            i = d.createElement("script");
                            i.async = 1;
                            i.charset = "UTF-8";
                            i.src = "https://cdn.curator.io/published/4dd02a67-5444-4823-9d56-557b68f8512a_1wy23x56.js";
                            e = d.getElementsByTagName(s)[0];
                            e.parentNode.insertBefore(i, e);
                        })();
                    </script>

                    <!-- LightWidget WIDGET -->
                    <!--<script src="//lightwidget.com/widgets/lightwidget.js"></script>-->
                    <!--<iframe src="//lightwidget.com/widgets/be46ef8736305c6693ece88d3efec55a.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>                        -->

                </div>
                
                <div class="col-md-4">
                    <div class="section-heading">Facebook</div>
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fbapenda.jateng&tabs=timeline&width=500&height=600&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                        width="100%" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section-heading">Twitter</div>
                            <a class="twitter-timeline" data-width="100%" data-height="600"
                                href="https://twitter.com/BPPD_Jateng?ref_src=twsrc%5Etfw">Tweets by BPPD_Jateng</a>
                            <a class="twitter-timeline" href="https://twitter.com/BPPD_JATENG?ref_src=twsrc%5Etfw">Tweets by
                                BPPD_JATENG</a>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                         <div class="col-md-6">
                            <div class="section-heading">Tiktok</div>
                            <a class="twitter-timeline" href="https://www.tiktok.com/@bapenda.jateng">Tiktok by
                                @bapenda.jateng</a>
                        </div>
                    </div>
                    <!--<div class="row">-->
                    <!--    <div class="col-md-12">-->
                    <!--        <img src="{{ asset('portal/img/metodebayar.png') }}" style="width:100%"/>    -->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </section>

    <section class="well well-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-heading" style="color: #fff;">
                        Realisasi Pendapatan
                        <span class="indeks"><a href="{{ url('') }}/realisasi_pendapatan" style="color: #C1D4F1;">indeks</a></span>
                    </div>
                    <div id="statistik" class="table-responsive">
                        <?php
                        $rschart = DB::table('statistik_perizinan')->orderBy('tanggal', 'desc')->first();
                        $label = explode(';', $rschart->label);
                        $value = explode(';', $rschart->value);
                        $n = count($label);
                        
                        ?>

                        <div class="table-responsive">
                            <div id="container" style="min-width: 450px; height: 400px; margin: 0 auto"></div>
                            <table class="table table-hover" id='datatable' style="display: none">
                                <tr>
                                    <td>Perizinan</td>
                                    <td>Jumlah</td>
                                </tr>
                                <?php  for($i = 0; $i < $n; $i++){?>
                                <tr>
                                    <td>{{ $label[$i] }}</td>
                                    <td>{{ $value[$i] }}</td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-6">

                    <div class="section-heading">
                        Statistik Realisasi Investasi
                        <span class="indeks"><a href="https://web.bapenda.jatengprov.go.id/statistik_realisasi">indeks</a></span>
                    </div>
                    <form action="" method="post">
                    <div>
                    Kategori <select id=jenisrealisasi><option value='Sektor'>Sektor</option><option value='Lokasi'>Lokasi</option><option value='PMDN'>PMDN</option><option value='PMA'>PMA</option><option value='Asal Negara PMA'>Asal Negara PMA</option></select>
                    </div>

                    <div id="realisasi" class="table-responsive">
                        
                        <div class="table-responsive">
                            <div id="container2" style="min-width: 450px; height: 400px; margin: 0 auto"></div>
                            <table class="table table-hover" id='datatable2' style="display: none">
                                <tr>
                                    <td>Perizinan</td>
                                    <td>Jumlah</td>
                                </tr>
                                                                <tr>
                                    <td>Listrik, Gas dan Air</td>
                                    <td>10.42</td>
                                </tr>
                                                                <tr>
                                    <td>Konstruksi</td>
                                    <td>6.97</td>
                                </tr>
                                                                <tr>
                                    <td>Jasa Lainnya</td>
                                    <td>2.01</td>
                                </tr>
                                                                <tr>
                                    <td>Transportasi, Gudang dan Telekomunikasi</td>
                                    <td>1.48</td>
                                </tr>
                                                                <tr>
                                    <td>Pertambangan</td>
                                    <td>1.14</td>
                                </tr>
                                                                <tr>
                                    <td>Lainnya</td>
                                    <td>5.61</td>
                                </tr>
                                                            </table>
                        </div>
                    </div>
                    </form>
                </div> -->
            </div>
        </div>
    </section>
    
    

    <section class="well well-lg " style="background-color: #ecf0f1;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeInDown" data-wow-offset="360">
                    <div class="section-heading">Pranala Luar</div>
                </div>
            </div>
            <div class="row slick-carousel-1 wow fadeInDown" data-wow-delay=".5s" data-wow-offset="100">
                <?php $rstautan_imgs = DB::table('tautan')->where('jnstautan', 1)->where('flag', 1)->orderBy('order', 'asc')->get(); ?>
                @foreach ($rstautan_imgs as $rstautan)
                    <?php
                    if (@$rstautan->foto != '') {
                        if (file_exists('./packages/upload/galeri/' . @$rstautan->foto)) {
                            $img = asset('/packages/upload/galeri/' . @$rstautan->foto);
                        } else {
                            $img = asset('/assets/images/banner-pranala.jpg');
                        }
                    } else {
                        $img = asset('/assets/images/banner-pranala.jpg');
                    }
                    ?>
                    <div class="col m-2">
                        <a href="{{ $rstautan->url }}" title="{{ $rstautan->title }}"
                            target="{{ $rstautan->target }}"><img src="{{ $img }}"
                                alt="{{ $rstautan->title }}" width="100%"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- <section id="galeri" class="well well-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-heading wow fadeInDown" data-wow-delay="0" data-wow-offset="500">Album Foto <span class="indeks"><a href="https://web.bapenda.jatengprov.go.id/galeri/foto/all">indeks</a></span></div>
                    <section class="galeri galeri-foto wow fadeInDown" data-wow-delay=".3s" data-wow-offset="500">
                        <div class="row">
                                                                                                                <div class="col-xs-12 col-sm-6">
                                <a class="galeri-item" href="https://web.bapenda.jatengprov.go.id/galeri/foto/20" title="Kunjungan Ibu Plt. Kepala Badan ke desa Dampingan Ds.Gaden, Kecamatan Trucuk, Kab. Klaten">
                                    <figure style="background-image:url(https://web.bapenda.jatengprov.go.id/packages/upload/galeri/DR4F9MW.jpg);">
                                        <figcaption>
                                            <h4>Kunjungan Ibu Plt. Kepala Badan ke desa Dampingan Ds.Gaden, Kecamatan Trucuk, Kab. Klaten</h4>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                                                                                    <div class="col-xs-12 col-sm-6">
                                <a class="galeri-item" href="https://web.bapenda.jatengprov.go.id/galeri/foto/13" title="PELEPASAN PURNA TUGAS">
                                    <figure style="background-image:url(https://web.bapenda.jatengprov.go.id/packages/upload/galeri/GD1uIQx.jpg);">
                                        <figcaption>
                                            <h4>PELEPASAN PURNA TUGAS</h4>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                            
                        </div>
                    </section>
                </div>
                <div class="col-md-6">
                    <div class="section-heading wow fadeInDown" data-wow-delay="1s" data-wow-offset="505">Video <span class="indeks"><a href="https://web.bapenda.jatengprov.go.id/galeri/foto/video">indeks</a></span></div>
                    <section class="galeri galeri-foto wow fadeInDown" data-wow-delay="1.5s" data-wow-offset="505">
                        <div class="row">
                                                                                                                                            <div class="col-xs-12">
                                <a class="galeri-item full" href="https://www.youtube.com/watch?v=OlGAaCT_V_8&t=2s" rel="prettyPhoto" title="NEW SAKPOLE DISKRIPTION">
                                    <figure style="background-image:url(https://web.bapenda.jatengprov.go.id/packages/upload/galeri/mvIOomj.jpg);">
                                        <figcaption>
                                            <h4>NEW SAKPOLE DISKRIPTION</h4>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                                                                                    <div class="col-xs-12">
                                <a class="galeri-item full" href="https://www.youtube.com/watch?v=QeETmD1p6xA" rel="prettyPhoto" title="Selamat Hari Raya Idul Fitri 1443 H">
                                    <figure style="background-image:url(https://web.bapenda.jatengprov.go.id/packages/upload/galeri/P70XzkA.jpg);">
                                        <figcaption>
                                            <h4>Selamat Hari Raya Idul Fitri 1443 H</h4>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                                                                                    <div class="col-xs-12">
                                <a class="galeri-item full" href="https://www.youtube.com/watch?v=FG15JVi4CwE&t=6s" rel="prettyPhoto" title="SAMSAT BUMDES GROBOGAN">
                                    <figure style="background-image:url(https://web.bapenda.jatengprov.go.id/packages/upload/galeri/xlaKUGw.jpg);">
                                        <figcaption>
                                            <h4>SAMSAT BUMDES GROBOGAN</h4>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                                                                                </div>
                    </section>
                </div>
            </div>
        </div>
    </section> -->

    <script type="text/javascript">
        window.onload = function() {
            OpenBootstrapPopup();
        };

        function OpenBootstrapPopup() {
            $("#simpleModal").modal('show');
        }
    </script>

    {{ View::make('portal.footer') }}
