<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    {{-- <title>{{ config('app.name', 'Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah') }}</title> --}}
    <title>Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/assets/img/logo.png')}}"/>
    <link href="{{ url('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ url('assets/js/loader.js')}}"></script>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ url('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ url('plugins/noUiSlider/nouislider.min.css')}}" rel="stylesheet" type="text/css">
     <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ url('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('plugins/table/datatable/dt-global_style.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ url('plugins/table/datatable/custom_dt_custom.css')}}"> --}}
    <link href="{{ url('plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ url('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ url('plugins/select2/select2.min.css')}}">
    <link href="{{ url('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ url('plugins/noUiSlider/custom-nouiSlider.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ url('plugins/bootstrap-range-Slider/bootstrap-slider.css')}}" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/1531875d2d.js" crossorigin="anonymous"></script>
{{-- 
    <link rel="stylesheet" href="{{ url('plugins/font-icons/fontawesome/css/regular.css')}}">
    <link rel="stylesheet" href="{{ url('plugins/font-icons/fontawesome/css/fontawesome.css')}}"> --}}
    <link href="{{ url('assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('plugins/bootstrap-select/bootstrap-select.min.css')}}">
    <link href="{{ url('assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
  {{-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script> --}}

  {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script type="text/javascript">
    function checkAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox' ) {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }
    </script>
   
<style>
           
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>

</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="{{ url('/home') }}">
                        <img src="{{asset('/assets/img/logo.png')}}" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="{{ url('/home') }}" class="nav-link"> BAPENDA </a>
                </li>
            </ul>

            <ul class="navbar-item flex-row ml-md-0 ml-auto">
                <li class="nav-item align-self-center search-animated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        </div>
                    </form>
                </li>
            </ul>

            <ul class="navbar-item flex-row ml-md-auto">
                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        
                        <p><img src="{{ url('assets/img/90x90.jpg') }}" alt="avatar"> {{ Auth::user()->name }}</p>
                    </a>
                    
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">
                            {{-- <div class="dropdown-item">
                                <a class="" href="{{ route('users.show',Auth::user()->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Profile</a>
                            </div> --}}
                            {{-- <div class="dropdown-item">
                                <a class="" href="apps_mailbox.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A22 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> Inbox</a>
                                </div>
                                <div class="dropdown-item">
                                    <a class="" href="auth_lockscreen.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Lock Screen</a>
                            </div> --}}
                            <div class="dropdown-item">
                                <a class="" href="{{ route('logout') }}""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard </a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{ Str::ucfirst(Request::segment(1))  }} </span></li>
                            </ol>
                            
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @foreach (Auth::user()->roles as $x)   

            {{ $role_id =$x->pivot->role_id; }}   
                    
        @endforeach
        <div class="sidebar-wrapper sidebar-theme">
            
            <nav id="sidebar">
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="#dashboard" data-active="{{ Request::is('home') ? 'true':''; }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard </span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ Request::is('home') ? 'show':''; }}" id="dashboard" data-parent="#accordionExample">
                            <li class="{{ Request::is('home') ? 'active':''; }}">
                                <a href="{{ url('/home') }}"> Portal </a>
                            </li>
                            <li>
                                <a href="{{ url('/') }}"> Halaman Utama </a>
                            </li>
                        </ul>
                    </li>
                {{----------------------------------ADMIN WEB---------------------------}}
                    @if ($role_id <= 2)
                    <li class="menu">
                        <a href="#app" data-active="{{ Request::is('users','roles') ? 'true':''; }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                                <span>Master Data</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ Request::is('users','roles') ? 'show':''; }}" id="app" data-parent="#accordionExample">
                            <li class="{{ Request::is('users') ? 'active':''; }}">
                                <a href="{{ route('users.index') }}"> Master User </a>
                            </li>
                            {{-- <li class="{{ Request::is('roles') ? 'active':''; }}">
                                <a href="{{ route('roles.index') }}"> Master Role </a>
                            </li> --}}
                    
                        </ul>
                    </li>
                   
                    <li class="menu">
                        <a href="#components" data-active="{{ Request::is('main','posts','category','album','galeri','slider','video','tautan') ? 'true':''; }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span>Main Content</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ Request::is('main','main/create','main/edit','posts','posts/create','posts/edit','category','album','galeris','sliders','videos','tautans') ? 'show':''; }}" id="components" data-parent="#accordionExample">
                            <li class="{{ Request::is('main') ? 'active':''; }}">
                                <a href="{{ route('main.index') }}"> Main Menu </a>
                            </li>
                            <li class="{{ Request::is('posts','posts/create') ? 'active':''; }}">
                                <a href="{{ route('post.index') }}"> Post  </a>
                            </li>
                             <li class="{{ Request::is('category','category/create') ? 'active':''; }}">
                                <a href="{{ route('category.index') }}"> Category </a>
                            </li>                            
                            <li  class="{{ Request::is('album','album/create') ? 'active':''; }}">
                                <a href="{{ route('album.index') }}"> Album </a>
                            </li>
                            <li  class="{{ Request::is('galeris','galeris/create') ? 'active':''; }}">
                                <a href="{{ route('galeris.index') }}">Galery</a>
                            </li>
                            <li  class="{{ Request::is('sliders','sliders/create') ? 'active':''; }}">
                                <a href="{{ route('sliders.index') }}"> Image Slider </a>
                            </li>
                            <li  class="{{ Request::is('videos','videos/create') ? 'active':''; }}">
                                <a href="{{ route('videos.index') }}"> Video </a>
                            </li>
                            <li  class="{{ Request::is('tautans','tautans/create') ? 'active':''; }}">
                                <a href="{{ route('tautans.index') }}"> Tautan </a>
                            </li>
                            <li  class="{{ Request::is('modals','modals/create') ? 'active':''; }}">
                                <a href="{{ route('modals.index') }}"> Modal </a>
                            </li>
                            
                        </ul>
                    </li>
                    

                    <li class="menu">
                        <a href="#elements" data-active="{{ Request::is('sotk','sotk_pejabat','sotksejarah') ? 'true':''; }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                <span>Profil Instansi</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ Request::is('sotk','sotk/create','sotk_pejabat','sotk_pejabat/create','sotksejarah','sotksejarah/create') ? 'show':''; }}" id="elements" data-parent="#accordionExample">
                            <li class="{{  Request::is('sotk','sotk/create') ? 'active':''; }}">
                                <a href="{{ route('sotk.index') }}"> Sotk </a>
                            </li>
                            <li class="{{  Request::is('sotk_pejabat','sotk_pejabat/create') ? 'active':''; }}">
                                <a href="{{ route('sotk_pejabat.index') }}"> Pejabat </a>
                            </li>
                            <li class="{{  Request::is('sotksejarah','sotksejarah/create') ? 'active':''; }}"> 
                                <a href="{{ route('sotksejarah.index') }}"> Sejarah </a>
                            </li>
                            
                        </ul>
                    </li>

                   

                    <li class="menu">
                        <a href="#datatables" data-active="{{ Request::is('mainppid','sliderppid','sotkppid','pejabatppid') ? 'true':''; }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                <span>PPID</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ Request::is('mainppid','mainppid/create','sliderppid','sliderppid/create','sotkppid','sotkppid/create','pejabatppid','pejabatppid/create') ? 'show':''; }}" id="datatables" data-parent="#accordionExample">
                            <li class="{{  Request::is('mainppid','mainppid/create') ? 'active':''; }}">
                                <a href="{{ route('mainppid.index') }}"> Menu Utama </a>
                            </li>
                            <li class="{{  Request::is('sliderppid','sliderppid/create') ? 'active':''; }}">
                                <a href="{{  route('sliderppid.index') }}"> Slider Image </a>
                            </li>
                            <li class="{{  Request::is('sotkppid','sotkppid/create') ? 'active':''; }}">
                                <a href="{{  route('sotkppid.index') }}"> Sotk PPID </a>
                            </li>
                            <li class="{{  Request::is('pejabatppid','pejabatppid/create') ? 'active':''; }}">
                                <a href="{{ route('pejabatppid.index') }}"> Pejabat PPID </a>
                            </li>
                            <li  class="{{ Request::is('ppidmodal','ppidmodal/create') ? 'active':''; }}">
                                <a href="{{ route('ppidmodal.index') }}"> Modal </a>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#forms" data-active="{{ Request::is('statizin') ? 'true':''; }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                <span>Statistik</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ Request::is('statizin','statizin/create') ? 'show':''; }}" id="forms" data-parent="#accordionExample">
                            <li class="{{  Request::is('statizin','statizin/create') ? 'active':''; }}">
                                <a href="{{ route('statizin.index') }}"> Realisasi Pendapatan </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li class="menu">
                        <a href="#users" data-active="{{ Request::is('uppdmain') ? 'true':''; }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>UPPD</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">
                            <li class="{{  Request::is('uppdmain','uppdmain/create') ? 'active':''; }}">
                                <a href="{{ route('uppdmain.index') }}"> Menu Utama </a>
                            </li>
                            
                        </ul>
                    </li>
                    @endif
                {{----------------------------------END ADMIN---------------------------}}

                {{----------------------------------ADMIN POSTING---------------------------}}
                    @if ($role_id == 3)
                    <li class="menu">
                        <a href="#components" data-active="{{ Request::is('main','posts','category','album','galeri','slider','video','tautan') ? 'true':''; }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span>Main Content</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ Request::is('main','main/create','main/edit','posts','posts/create','posts/edit','category','album','galeris','sliders','videos','tautans') ? 'show':''; }}" id="components" data-parent="#accordionExample">
                           
                            <li class="{{ Request::is('posts','posts/create') ? 'active':''; }}">
                                <a href="{{ route('post.index') }}"> Post  </a>
                            </li>
                                                      
                            <li  class="{{ Request::is('album','album/create') ? 'active':''; }}">
                                <a href="{{ route('album.index') }}"> Album </a>
                            </li>
                            <li  class="{{ Request::is('galeris','galeris/create') ? 'active':''; }}">
                                <a href="{{ route('galeris.index') }}">Galery</a>
                            </li>
                           
                            <li  class="{{ Request::is('videos','videos/create') ? 'active':''; }}">
                                <a href="{{ route('videos.index') }}"> Video </a>
                            </li>
                           
                            
                        </ul>
                    </li>
                    
                    @endif
                {{----------------------------------END ADMIN POSTING---------------------------}}

                {{----------------------------------UPPD---------------------------}}
                    @if ($role_id >= 4)
                    <li class="menu">
                        <a href="#components" data-active="{{ Request::is('main','posts','category','album','galeri','slider','video','tautan') ? 'true':''; }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span>Main Content</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ Request::is('main','main/create','main/edit','posts','posts/create','posts/edit','category','album','galeris','sliders','videos','tautans') ? 'show':''; }}" id="components" data-parent="#accordionExample">
                           
                            <li class="{{ Request::is('posts','posts/create') ? 'active':''; }}">
                                <a href="{{ route('post.index') }}"> Post  </a>
                            </li>
                                                      
                            <li  class="{{ Request::is('album','album/create') ? 'active':''; }}">
                                <a href="{{ route('album.index') }}"> Album </a>
                            </li>
                            <li  class="{{ Request::is('galeris','galeris/create') ? 'active':''; }}">
                                <a href="{{ route('galeris.index') }}">Galery</a>
                            </li>
                           
                            <li  class="{{ Request::is('videos','videos/create') ? 'active':''; }}">
                                <a href="{{ route('videos.index') }}"> Video </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#datatables" data-active="{{ Request::is('mainppid','sliderppid','sotkppid','pejabatppid') ? 'true':''; }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                <span>PPID</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ Request::is('mainppid','mainppid/create','sliderppid','sliderppid/create','sotkppid','sotkppid/create','pejabatppid','pejabatppid/create') ? 'show':''; }}" id="datatables" data-parent="#accordionExample">
                            <li class="{{  Request::is('mainppid','mainppid/create') ? 'active':''; }}">
                                <a href="{{ route('mainppid.index') }}"> Menu Utama </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#users" data-active="{{ Request::is('uppdmain') ? 'true':''; }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>UPPD</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">
                            <li class="{{  Request::is('uppdmain','uppdmain/create') ? 'active':''; }}">
                                <a href="{{ route('uppdmain.index') }}"> Menu Utama </a>
                            </li>
                            
                        </ul>
                    </li>
                    @endif
                {{----------------------------------END UPPD---------------------------}}
                </ul>
               
            </nav>

        </div>
        <!--  END SIDEBAR  -->
        
        <script src="{{ url('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
        <script src="{{ url('assets/js/libs/jquery-ui.js')}}"></script>
        <script src="{{ url('plugins/table/datatable/datatables.js')}}"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/super-build/ckeditor.js"></script>
        <!--<script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/super-build/ckeditor.js"></script>-->
        
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> --}}
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script> --}}
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
             @yield('content')
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2022 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    
    <!-- END MAIN CONTAINER -->
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    
    <script src="{{ url('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ url('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ url('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ url('assets/js/app.js')}}"></script>
   

    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ url('assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ url('plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{ url('assets/js/dashboard/dash_1.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{ url('assets/js/scrollspyNav.js')}}"></script>
    <script src="{{ url('plugins/select2/select2.min.js')}}"></script>
    <script src="{{ url('plugins/select2/custom-select2.js')}}"></script>
    <script src="{{ url('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script src="{{ url('plugins/flatpickr/flatpickr.js')}}"></script>
    <script src="{{ url('plugins/noUiSlider/nouislider.min.js')}}"></script>

    <script src="{{ url('plugins/flatpickr/custom-flatpickr.js')}}"></script>
    <script src="{{ url('plugins/noUiSlider/custom-nouiSlider.js')}}"></script>
    <script src="{{ url('plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js')}}"></script>
     <script src="{{ url('assets/js/users/account-settings.js') }}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    
     {{-- CKEDITOR --}}
    {{-- <script src="{{ url('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
        
    </script> --}}
    
    
   {{-- CKeditor --}}
<script>
    var allEditors = document.querySelectorAll('.editor');
    for (var i = 0; i < allEditors.length; ++i) {
    CKEDITOR.ClassicEditor.create(allEditors[i],{
    
    // This sample still does not showcase all CKEditor 5 features (!)
    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
    // CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        ckfinder: {
                    uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                    },
        toolbar: {
            items: [
                'exportPDF','exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link','insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        // placeholder: 'Welcome to CKEditor 5!',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            // 'CKFinder',
            // 'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    })};
</script>
{{--END CKeditor --}}
    {{-- END CKEDITOR --}}
    <script>
        // var e;
         c1 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" >\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"30px",
                className:"",
                orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" >\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [10, 20, 50, 100],
            "pageLength": 5,
            "responsive": true
        });

        multiCheck(c1);
        
  

   
        c2 = $('#style-2').DataTable({
           
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"20px",
                
                className:"",
                orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                },
                // targets:3, width:"20px",
            }
        ],
          "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [10, 20, 50],
            "pageLength": 10,
            "responsive": true,
            
            
        });

        multiCheck(c2);
        
    </script>
    
 
 
<script>
    var ss = $(".basic").select2({
    tags: true,
    });
    var firstUpload = new FileUploadWithPreview('myFirstImage')

</script>
<script>
    var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.nav a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script> 

</body>
</html>