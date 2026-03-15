<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah </title>
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
  
 <style>
  @import url(https://fonts.googleapis.com/css?family=Open+Sans);


  .search {
    width: 100%;
    position: relative;
    display: flex;
  }

  .searchTerm {
    width: 100%;
    border: 1px solid #C0392B;
    border-right: none;
    padding: 5px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #9DBFAF;
  }

  .searchTerm:focus{
    color: #1a1818;
  }

  .searchButton {
    width: 40px;
    
    border: 0px solid #C0392B;
    background: #C0392B;
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
  }

  /*Resize the wrap to see the search bar change!*/
  .wrap{
    width: 20%;
    position: absolute;
    top: 50%;
    left: 70%;
    transform: translate(-50%, -50%);
  }
 </style>

</head>

<body>
  @if ( Request::segment(1) == null)
    <div class="modal fade" id="global-modal" role="dialog">
      <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" style="margin-top: -16px; font-size: 28px;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
          </div> 
          <?php $modal = getmodal(); ?>
                @foreach($modal as $post)
                <?php
                    if(@$post->image != ''){
                        if(file_exists('./packages/upload/modal/'.@$post->image)){
                            $img = asset('/packages/upload/modal/'.@$post->image);
                        }else{
                            $img = asset('/packages/photo/noimage.jpg');
                        }
                    }else{
                        $img = asset('/packages/photo/noimage.jpg');
                    }
                ?>
                 
                  <div class="modal-body" style="padding: 20;">
                    <img class="img-full img-responsive" src="{{ $img }}">
                    
                  </div>
                @endforeach
        </div>
      </div>
    </div>
  @else
      
  @endif
  
<!-- partial -->
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
  $(document).ready(function() {
  $('#global-modal').modal('show');
});
</script>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">bapenda@jatengprov.go.id </a>
        <i class="bi bi-telephone"></i> (024) 3515514
      </div>
      
      
      <div class="d-none d-lg-flex social-links align-items-center">
        <div class="wrap">
          {!! Form::open(array('route' => 'search-result.index','method'=>'POST' ,'enctype'=>'multipart/form-data')) !!}
            <div class="search">
                <input type="text" class="searchTerm" name="search" placeholder="Search..">
                <button type="submit" class="searchButton">
                  <i class="fa fa-search"></i>
              </button>
            </div>
          {!! Form::close() !!}
      </div>
        <a href="https://www.facebook.com/bapenda.jateng" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://twitter.com/BPPD_JATENG" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.instagram.com/bapenda_jateng/" class="instagram"><i class="bi bi-instagram"></i></a>
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
                    <li><a href="https://website.bapenda.jatengprov.go.id/" target="_parent">BERANDA BAPENDA</a></li>
                    <li><a href="https://website.bapenda.jatengprov.go.id/ppid" target="_parent">BERANDA PPID BAPENDA</a></li>
                </ul>
            </li> --}}
            
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
  