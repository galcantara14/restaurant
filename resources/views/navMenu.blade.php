<!-- resources/views/layouts/navMenu.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Restaurante')</title>
    <!-- seus links e estilos aqui -->
     <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php    
            
            date_default_timezone_set('America/Sao_Paulo');
        ?>
			
        <title>Restaurant</title>        
		<link rel="sortcut icon" href=/shortLogo2.png type="image/png" />
        <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- CSS -->
        <link href=" /css/app.css" rel="stylesheet">
        <link href="/css/root.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Select -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

        <!-- Swiper (se realmente usar) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

        <!-- JS -->
        <!-- jQuery SEMPRE primeiro -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Bootstrap Select -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

        <!-- Swiper -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Seus scripts -->
        <script src="/js/base.js"></script>        
   

    <style>
          
       
        
    </style>
     @yield('head')
</head>
<body class="body-navMenu">
    <!-- NAV -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow ">
        <a href="{{ url('/') }}">
            <img src="/shortLogo2.png" alt="Logo" class="navbar-brand" style="height: 100px; width: 100px;">
        </a>
        <div class="collapse navbar-collapse justify-content-between align-items-center">
            <ul class="navbar-nav">
                <a href="{{ route('cardapio') }}" class="nav-link text-white">Cardápio</a>
            </ul>
        </div>          
    </nav>
</body>
</html>
