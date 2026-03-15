<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('portal/img/favicon.png')}}" rel="icon">
  <link href="{{url('portal/img/favicon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('portal/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{url('portal/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('portal/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{url('portal/css/prettyPhoto.css')}}" media="screen" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{url('portal/plugin/camera/css/camera.css')}}" media="screen" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{url('portal/css/animate.css')}}" media="screen" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{url('portal/css/main.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{url('portal/plugin/smartmenu/jquery.smartmenus.bootstrap.css')}}" media="screen" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{url('portal/css/jquery.share.css')}}" media="screen">  
    <link rel="stylesheet" type="text/css" href="{{url('portal/css/datatables.min.css')}}" media="screen">

  <!-- Template Main CSS File -->
  <link href="{{url('portal/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">info@bapenda.jatengprov.go.id</a>
        <i class="bi bi-telephone"></i> (024) 3515514
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="https://www.facebook.com/bapenda.jateng" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://twitter.com/BPPD_JATENG" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.instagram.com/BPPD_Jateng" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo me-auto"><a href="/">BAPENDA Prov. Jateng</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="/" class="logo me-auto"><img src="{{url('portal/img/logo-bapenda.png')}}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        {{-- {{showmenuatas($id='0')}} --}}
        {{-- <ul> --}}
            {{-- <li data-sm-reverse="true" class="dropdown"><a href="#">Beranda <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="https://web.bapenda.jatengprov.go.id/" target="_parent">BERANDA BAPENDA</a></li>
                    <li><a href="https://web.bapenda.jatengprov.go.id/ppid" target="_parent">BERANDA PPID BAPENDA</a></li>
                </ul>
            </li>
            <li><a href="https://web.bapenda.jatengprov.go.id/ppid" target="_parent">PPID</a></li> --}}
            {{-- jika jenis konten 0 --}}
            <?php 
             
             $num = $mainmenu->count();
                $i = 0;
                $j = 0;
                $id = 0;
                foreach($mainmenu->get() as $item){
                    if($i == 0 and $id==0) echo "\n<ul>";
                    if($i == 0 and $id>0) echo "\n<ul>";
                    $i++;

                    if ((strpos($item->url, 'http') !== false) or (strpos($item->url, 'www') !== false)) {
                        $link = $item->url;
                    }else{
                        $link = url('').'/'.$item->url;
                    }

                    $url = (($item->jenis_konten==3)?$link:((($item->jenis_konten==1) or ($item->jenis_konten==2))?url('')."/page/".$item->url:"#"));
                    $target = (($item->jenis_konten==3)?" target='". $item->target. "'":"");
                    $cek = DB::table('main_menu')->where('id_parent',$item->id)->count();
                    if($item->jenis_konten==0){
                        echo "<li data-sm-reverse='true'  class='dropdown'><a href='#'>$item->title <i class='bi bi-chevron-down'></i></a>";
                    }else{
                        echo "<li><a href='$url' $target>$item->title</a>";
                    }
                    $j++;
                    showmenuatas2($item->id);
                    echo "</li>";
                    echo ((($cek > 0) and ($item->id_parent != 0))?'</li>':'');
                    if($i == $num)echo "</ul>";
                }
            ?> 
            
           
        {{-- </ul> --}}
  
   
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="margin-top: -150px;">
    <div class="container">
      <h1>Selamat Datang</h1>
      <h2>Badan Pengelola Pendapatan Daerah<br>Provinsi Jawa Tengah</h2>
      <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
    </div>
  </section><!-- End Hero -->

<main id="main">

    <section id="berita-utama" class="well well-lg " >
        <div class="container card">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">Liputan Utama <span class="indeks"><a href="category/liputan utama">indeks</a></span></div>
                </div>
            </div>
            <div class="row slick-carousel-1">
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
                            <h2 class="materi-judul"><a href="{{url('')."/p/".$post->id."/".$post->url}}">{{$post->titel}}</a></h2>
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
                    <div class="section-heading">Liputan Daerah <span class="indeks"><a href="https://web.bapenda.jatengprov.go.id/category/liputan daerah">indeks</a></span></div>
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
                            <h2 class="materi-judul"><a href="{{url('')."/p/".$post->id."/".$post->url}}">{{$post->titel}}</a></h2>
                            <span class="waktu-upload"><i class="fa fa-fw fa-calendar-plus-o"></i> {{@tanggal($post->tgl_publish)}} {{@jam(substr($post->tgl_publish,11,5))}}</span> &nbsp;&nbsp;
                            <a href="{{url('')}}" class="materi-kategori"><i class="fa fa-fw fa-tag"></i> {{$post->category}} </a>
                        </figcaption>
                    </figure>
                </div>
                @endforeach
            </div>
    </section>


    

    <section class="well well-lg" style="background-color: #ecf0f1;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-heading">Facebook</div>
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fbapenda.jateng&tabs=timeline&width=500&height=600&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="500" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="section-heading">Twitter</div>
                    <a class="twitter-timeline" data-width="100%" data-height="600" href="https://twitter.com/BPPD_Jateng?ref_src=twsrc%5Etfw">Tweets by BPPD_Jateng</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <!--<div class="col-md-4">-->
                <!--    <div class="section-heading">Instagram</div>-->
                <!--    <script src="https://apps.elfsight.com/p/platform.js" defer></script>-->
                <!--    <div class="elfsight-app-01ba4cd5-2025-46c0-ae0f-877b4132ee3b"></div>-->
                    <!-- LightWidget WIDGET -->
                        <!--<script src="//lightwidget.com/widgets/lightwidget.js"></script>-->
                        <!--<iframe src="//lightwidget.com/widgets/be46ef8736305c6693ece88d3efec55a.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>                        -->
                <!--</div>-->
            </div>
        </div>
    </section>

    <section class="well well-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-heading">
                        Realisasi Pendapatan
                        <span class="indeks"><a href="https://web.bapenda.jatengprov.go.id/realisasi_pendapatan">indeks</a></span>
                    </div>
                    <div id="statistik" class="table-responsive">
                        <?php
                            $rschart = DB::table('statistik_perizinan')->orderBy('tanggal', 'desc')->first();
                            $label = explode(";",$rschart->label);
                            $value = explode(";",$rschart->value);
                            $n  =  count($label);
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
                                    <td>{{$label[$i]}}</td>
                                    <td>{{$value[$i]}}</td>
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
                    @foreach($rstautan_imgs as $rstautan)
                    <?php
                        if(@$rstautan->foto != ''){
                            if (file_exists('./packages/upload/galeri/'.@$rstautan->foto)) {
                                $img = asset('/packages/upload/galeri/'.@$rstautan->foto);
                            } else {
                                $img = asset('/assets/images/banner-pranala.jpg');
                            }
                        }else {
                            $img = asset('/assets/images/banner-pranala.jpg');
                        }
                    ?>                        
                    <div class="col m-2">
                        <a href="{{$rstautan->url}}" title="{{$rstautan->title}}" target="{{$rstautan->target}}"><img src="{{$img}}" alt="{{$rstautan->title}}" width="100%"></a>
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


</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <!-- <h3>Medilab</h3> -->
            <img src="{{asset('/assets/img/logo.png')}}" width="88" />
            <p class="mt-2">
              BAPENDA Prov. Jateng<br>
              Badan Pengelolaan Pendapatan Daerah<br>
              Provinsi Jawa Tengah
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Alamat</h4>
            <p>
              Jl. Pemuda No 1<br>
              Semarang<br>
              Jawa Tengah - Indonesia<br>
              Telp. (024) 3515514<br>
              Fax (024) 3555704
            </p>
            <!-- <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul> -->
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <!-- <h4>Tautan</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Tautan terkait</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Tautan terkait</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Tautan terkait</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Tautan terkait</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Tautan terkait</a></li>
              </ul> -->
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <!-- <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form> -->
             <a href='https://dissertation-writingservice.com/'>Dissertation WritingService</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=41a0193ecc42ac1bddf918231ff7dc6e418af212'></script>
             <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/948099/t/0"></script>
        </div>
      </div>
    </div>

      <div class="container py-4">
        <div class="text-center">
          Copyright © 2022. Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah.
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->
  <!-- <div id="preloader">
    <img src="https://web.bapenda.jatengprov.go.id/assets/img/logo.png" width="88" />
  </div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <!-- <script src="assets/vendor/purecounter/purecounter.js"></script> -->
 <script src="{{url('portal/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 
  <!-- Template Main JS File -->
  <script src="{{url('portal/js/main.js')}}"></script>

    <script type="text/javascript" src="{{url('portal/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/camera/scripts/jquery.easing.1.3.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/camera/scripts/jquery.mobile.customized.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/camera/scripts/camera.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/wow/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/js/jquery.share.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/metismenu/metisMenu.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/smartmenu/jquery.smartmenus.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/smartmenu/jquery.smartmenus.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/timelinr/jquery.timelinr-0.9.6.js')}}"></script>
    {{-- <!-- <script type="text/javascript" src="{{url('packages/tugumuda/claravelportal/js/jquery.dataTables.min.js')}}"></script> --> --}}
    <script type="text/javascript" src="{{url('portal/js/datatables.min.js')}}"></script>
    {{-- <!--<script type="text/javascript" src="{{asset('packages/tugumuda/claravel/assets/js/main.js')}}"></script>--> --}}
    <!--CHART-->
    <script type="text/javascript" src="{{ asset('packages/tugumuda/claravel/assets/js/chart/highcharts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/tugumuda/claravel/assets/js/chart/highcharts-3d.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/tugumuda/claravel/assets/js/chart/data.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/tugumuda/claravel/assets/js/chart/exporting.js') }}"></script>
    <!--CHART-->
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=nulYJYgA"></script>
    <script>(function(d){var s = d.createElement("script");s.setAttribute("data-account", "2AoQe2qVIk");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>
    <script>
      wow = new WOW(
        {
          boxClass:     'wow',      // default
          animateClass: 'animated', // default
          offset:       0,          // default
          mobile:       false,       // default
          live:         false        // default
        }
      )
      wow.init();
    </script>

    <!-- Camera Slider -->
    <script>
      jQuery(function(){
        jQuery('#slider1').camera({
          height: '515px',
          loader: 'bar',
          pagination: true,
          thumbnails: false
        });
      });
    </script>

    <!-- Slick Slider -->
    <script type="text/javascript" src="{{ url('portal/js/slick.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.datatablejs').dataTable();
        // $(window).bind("load resize", function() {
        //   var wWidth = this.window.innerWidth;
        //   if(wWidth <= 768){
            
        //   }
        // });

        // Tambah class untuk top nav agar lebih kecil saat scroll ke bawah
          $(window).scroll(function(){
            if($(this).scrollTop()>55){
              $('#navigasi-utama').addClass('kecil');
            } else {
              $('#navigasi-utama').removeClass('kecil');
            }
          });    

        // Slick Carousel Global    
          $('.slick-carousel').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 3000,
            // appendArrows: $(".panah"),
            // prevArrow: '<i class="fa fa-fw fa-chevron-circle-left"></i>',
            // nextArrow: '<i class="fa fa-fw fa-chevron-circle-right"></i>',
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    arrows: false,
                    slidesToShow: 3,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]
          });
        
        // Headline Carousel
          $('.slick-carousel-1').slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: false,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 10000,
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]
          });

            $(function () {
                $('#container').highcharts({
                    data: {
                        table: 'datatable',
                        endRow: 19
                    },
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie',
                        options3d: {
                            enabled: true,
                            alpha: 45,
                            beta: 0
                        }
                    },
                    title: {
                                                text: 'Capaian Target Pendapatan s/d 07 Maret 2022'
                    },
                    yAxis: {
                        allowDecimals: false,
                        title: {
                            text: ''
                        }
                    },
                    xAxis: {
                        labels:
                        {
                            enabled: false
                        }
                    },
                    exporting: {
                        enabled: false
                    },
                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.point.name + '</b><br/> JUMLAH : ' +
                                this.point.y;
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            size: 200,
                            depth: 35,
                            //center: [150, 100],
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.y} ',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                                    width: '160px'
                                }
                            }
                        }
                    }
                });

                                chart2('Realisasi Investasi Berdasarkan Sektor Semester I Tahun 2018 (Triliyun)');
                
            });

            function chart2(judul=''){
                  $('#container2').highcharts({
                      data: {
                          table: 'datatable2',
                          endRow: 19
                      },
                      chart: {
                          plotBackgroundColor: null,
                          plotBorderWidth: null,
                          plotShadow: false,
                          type: 'pie',
                          options3d: {
                              enabled: true,
                              alpha: 45,
                              beta: 0
                          }
                      },
                      title: {
                                                    text: judul
                      },
                      yAxis: {
                          allowDecimals: false,
                          title: {
                              text: ''
                          }
                      },
                      xAxis: {
                          labels:
                          {
                              enabled: false
                          }
                      },
                      exporting: {
                          enabled: false
                      },
                      tooltip: {
                          formatter: function () {
                              return '<b>' + this.point.name + '</b><br/> JUMLAH : ' +
                                  this.point.y;
                          }
                      },
                      plotOptions: {
                          pie: {
                              allowPointSelect: true,
                              cursor: 'pointer',
                              size: 200,
                              depth: 35,
                              //center: [150, 100],
                              dataLabels: {
                                  enabled: true,
                                  format: '<b>{point.name}</b>: {point.y} ',
                                  style: {
                                      color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                                      width: '150px'
                                  }
                              }
                          }
                      }
                  });
                }

            $('#jenisrealisasi').on('change', function(){
              val = $(this).val();
              $.ajax({
                type: 'post',
                url:  'changechart',
                data: {'idchart' : val },
                success: function(res){
                  ret = JSON.parse(res);
                  $('#realisasi').html(ret.chart);
                  chart2(ret.title);
                }
              })
            });

            $('.bahasa').on('click', function(e){
                e.preventDefault();
                e.stopPropagation();
                var bahasa = $(this).attr('lang');
                $.ajax({
                    type: 'post',
                    url: 'bahasa',
                    data: {'bahasa':bahasa, '_token': 'xyXVg6wqdUdR2S1eOaUJAEmgI8hLybCMYPePcbJl'},
                    success:function(){
                        window.location.reload();
                    }
                });
            });

            
            /*$(document).ready(function() {
                $('a#embed').gdocsViewer({width: 700, height: 800});
            });*/
        });

        function claravel_modal_close(elemen){
            $('#' + elemen + '').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        }

        function claravel_modal(judul,isi,elemen){
            elemen = (elemen == '')?'modal2':elemen;
            $('#' + elemen + '').modal({ keyboard: true });
            $('#' + elemen + ' .modal-title').html(judul);
            $('#' + elemen + ' .modal-body').html(isi);
        }

        function getPengumuman(id){
            claravel_modal('Pengumuman','Loading...','main_modal');
            $.ajax({
                type:'post',
                url : 'pengumuman',
                data: {'id': id, '_token' : 'xyXVg6wqdUdR2S1eOaUJAEmgI8hLybCMYPePcbJl'},
                success:function(html){
                    $('#main_modal .modal-body').html(html);
                }
            });
        };
    </script>

    <script>
        // Metis Menu Folder
        $(function() {
            $('.metisFolder').metisMenu({
                toggle: false
            });
        });
    </script>

    <script>
        $(function(){
            $('#timeline').timelinr({
                arrowKeys: 'true'
            })
        });
    </script>

    <!-- PrettyPhoto -->
    <script type="text/javascript" src="{{ url('portal/js/jquery.prettyPhoto.js') }}" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function(){
        $("a[rel^='prettyPhoto']").prettyPhoto();                
        $('#sharesocial').share({
            networks: ['email', 'pinterest', 'tumblr', 'googleplus', 'digg', 'in1', 'facebook', 'twitter', 'linkedin', 'stumbleupon'],
            theme: 'square'
        });    
      });
    </script>

</body>

</html>