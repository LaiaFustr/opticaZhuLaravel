<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OpticaZhu</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- todos los links locales (para quefuncione sin internet) -->
     <!-- coreui -->
    <link href="/coreui/coreui.min.css" rel="stylesheet" >
    <!-- <script src="/coreui/bundle.min.css"></script> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/bootstrap/bootstrap.min.css"/>
    <script defer src="/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- font awesome -->
    <link href="/font-awesome/all.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
   <!--  <script defer src="/resources/js/contrasenia.js" ></script> -->

    <!-- nuestros estilos -->
    <link rel="stylesheet" href="./css/styles.css"/>
    <link rel="stylesheet" href="./css/navbar.css"/>
    <link rel="stylesheet" href="./css/card.css"/>

</head>

<body>
    @if (Request::is('*home*'))
        @include('navbar')


    @elseif (Request::is('*propietario*'))
        @include('navbarPro')

    @endif



    <div class="content">
        @yield('content')
    </div>

</body>

</html>
<!-- <script src="{{ asset('resources/js/app.js') }}"></script> -->