<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecureCheck</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <!-- Favicons -->
    <link href="{{asset('assets/brand/logo1.png')}}" rel="icon">
    <link href="{{asset('assets/img/brand/logo1.png')}}" rel="apple-touch-icon">

    <link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/dist/css/myStyle.css')}}" rel="stylesheet">

</head>

<body class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger">                    
                        @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                        @endforeach                    
                </div>
                @endif
            </div>
        </div>

        <main class="form-signin w-100 m-auto">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <img class="mb-4" src="../assets/brand/logo1.png" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Iniciar Sessão</h1>

                <div class="form-floating">
                    <input type="email" name="email" required class="form-control" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" required class="form-control" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">

                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2024 Jeremias Dinzinga</p>
            </form>
        </main>
    </div>
</body>

</html>