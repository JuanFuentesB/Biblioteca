<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    </head> 
    <body>
        <div class="container" id="app_registro">
            <div class="col-md-4 offset-md-4 mt-5">
                <h1 class="my-4 text-center">Registro</h1>
                <div class="card">
                    <div class="card-body">
                        <form id="login-form">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" v-model="nombre" class="form-control" id="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" v-model="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" v-model="password" class="form-control" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="password2" class="form-label">Confirmar Contraseña</label>
                                <input type="password" v-model="password2" class="form-control" id="password2">
                            </div>
                            <div class="mb-3">
                                <label for="rol" class="form-label">Tipo de Usuario</label>
                                <select class="form-select" aria-label="Default select example" v-model="tusuario">
                                    <option value="1" selected>Administrador</option>
                                    <option value="2">Usuario</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" @click="addusuario()">Guardar</button>
                        </form>
                    </div>
                </div>
                <p class="mt-3"> ¿Ya tienes cuenta? <a href="{{ route('login') }}">Iniciar Session!</a></p>
            </div>
        </div>
        
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>