<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecureCheck</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <!-- Favicons -->
    <link href="{{asset('assets/brand/logo1.png')}}" rel="icon">
    <link href="{{asset('assets/img/brand/logo1.png')}}" rel="apple-touch-icon">

    <link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/dist/css/myStyle.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="section-title text-center">
            <img class="mb-4" src="../assets/brand/logo1.png" alt="" width="130" height="130">
            <h1 class="mb-5">Bem-vindo ao SecureCheck!</h1>
            <p>Esta é uma página protegida. Somente usuários autenticados podem acessá-lo...</p>
            <a href="{{ route('logout') }}" class="link-secondary">Terminar sessão</a>
        </div>
    </div>
</body>

</html>