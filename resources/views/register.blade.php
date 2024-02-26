<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!-- Favicons -->
    <link href="{{asset('assets/brand/logo1.png')}}" rel="icon">
    <link href="{{asset('assets/img/brand/logo1.png')}}" rel="apple-touch-icon">

    <link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/dist/css/myStyle.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container" data-aos="fade-up">       
        <div class="section-title text-center">
            <h2>Registro de Usuário</h2>
        </div><br>

        <div class="row">
            <div class="col-lg-12 mt-lg-0">
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 form-group">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="name">Nome:</label>
                            <input type="text" name="name" class="form-control" placeholder="Insira o seu nome" required><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="sexo">E-mail:</label>
                            <input type="email" name="email" class="form-control" placeholder="Insira E-mail"
                                required><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="naturalidade">Nova senha:</label>
                            <input type="password" name="password" class="form-control" placeholder="Crie uma senha com 8 caracter no minímo"
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                        </div>
                        <div class="text-center mt-4"><button type="submit"
                                class="col-md-4 btn btn-secondary">Registrar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                        </div>
                        <div class="text-center mt-4">
                            <a href="/login" class="link-secondary">Iniciar sessão</a>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>


</body>

</html>