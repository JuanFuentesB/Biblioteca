<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Biblioteca</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    </head> 
    <body>
        
        <div class="container" id="app_login">
            <div class="col-md-4 offset-md-4 mt-5">
                <h1 class="my-4 text-center">Iniciar Session</h1>
                <div class="card">
                    <div class="card-body">
                        <form id="login-form">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" v-model="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Password</label>
                                <input type="password" v-model="pass" class="form-control" id="pass">
                            </div>
                            <button type="button" class="btn btn-primary" @click="iniciarsession()">Enviar</button>
                        </form>
                    </div>
                </div>
                <p class="mt-3"> ¿No tienes cuenta? <a href="{{ route('agregarusuario') }}">Registrate!</a></p>
            </div>
        </div>
        
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>