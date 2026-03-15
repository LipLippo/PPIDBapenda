<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Badan Pengelolaan Pendapatan Daerah Provinsi Jawa Tengah</title>
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
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
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
        {{showmenuatas_uppd($uppd_id, $url, $id='0' )}}
        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


    