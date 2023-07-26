<style>
    @import url('https://fonts.googleapis.com/css2?family=Saira+Stencil+One&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,700;1,700&family=Saira+Stencil+One&display=swap');
  </style>
<!DOCTYPE html>
<html>
<head>
    <title>MyWallet</title>
    <!-- Importe o arquivo CSS usando a função asset() -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="tudo">
        <div class="container">
            @yield('content')
        </div>
    </div>
    
</body>
</html>