

<!doctype html>
<html lang="{{ app()->getLocale() }}" >
    <head>
        <title>Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah</title>
        <meta charset="UTF-8">
        {{-- <meta name="author" href="dinustek">	 --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <meta name="keyword" content="">	
        <link href="{{asset('/assets/img/logo.png')}}" rel='icon' type='image/x-icon'/>
        <link rel="stylesheet" href="{{ url('packages/tugumuda/claravel/assets/plugins/font-awesome/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ url('packages/tugumuda/claravel/assets/login.css') }}" />
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,700,500italic,700italic,300italic,300,900,900italic' rel='stylesheet' type='text/css'>
        <script src="{{ url('packages/tugumuda/claravel/assets/jquery-1.11.0.js') }}"></script>
        <script src="{{ url('packages/tugumuda/claravel/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    </head>
    <body id="login">
        @yield('content')
    </body>
</html>
</html>

 


