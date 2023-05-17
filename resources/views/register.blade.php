<form action="{{route('register.create')}}" method="post">
    @csrf
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <body class="body d-flex justify-content-center align-items-center vh-100" id="fondo">
        <div class="p-4 rounded-5 text-secondary shadow" style="width: 25rem" id="caja-registro">
            <div class="d-flex justify-content-center">
                <img src="\img\img-noIcons\logo_uabcs.png" alt="login-icon" style="height: 7rem"/>
                <!--Imagen Original-->
                <!--<img src="\img\login-icon.svg" alt="login-icon" style="height: 7rem"/>-->
            </div>
            <div class="text-center fs-3 fw-bold text-light">Registro</div>
            <div class="input-group mt-4">
              <div class="input-group-text bg-success"><img src="\img\username-icon.svg" alt="username-icon" style="height: 1rem" />
              </div>
              <!--Nombre de usuario-->
              <input class="form-control bg-light" placeholder="Nombre de usuario" type="text" name="name" id="name"/>
            </div>
            <br>
            <div class="input-group mt-1">
              <div class="input-group-text bg-success">
                <img src="https://freesvg.org/img/Minduka-mail.png" alt="password-icon" style="height: 1rem"/>
              </div>
              <!--E-mail-->
              <input class="form-control bg-light" placeholder="E-Mail (example@outlook.com)" input type="email" name="email" id="email"/>
            </div>
            <br>
            <div class="input-group mt-1">
              <div class="input-group-text bg-success">
                <img src="\img\password-icon.svg" alt="password-icon" style="height: 1rem"/>
              </div>
              <!--Contraseña-->
              <input class="form-control bg-light" type="password" placeholder="Contraseña" name="password" id="password"/>
            </div>
            <br>
            <div class="input-group mt-1">
                <div class="input-group-text bg-success">
                  <img src="\img\password-icon.svg" alt="password-icon" style="height: 1rem"/>
                </div>
                <!--Repetir Contraseña-->
                <input class="form-control bg-light" type="password" placeholder="Repetir Contraseña" name="repPass" id="repPass"/>
              </div>
            <div>
              <input class="btn btn-success text-white w-100 mt-4 fw-semibold shadow-sm bg-success" type="submit" name="Iniciar Sesión">
            </div>
        </form>
            <div class="text-white w-150 mt-4 fw-semibold shadow-sm" id="links-Login">
                ¿Ya tiene cuenta? de<a href="{{url('login')}}" class="text-succes w-100 mt-4 fw-semibold shadow-sm"> Click Aqui</a>
                 O Puede<a href="{{url('/')}}" class="text-succes w-100 mt-4 fw-semibold shadow-sm"> Regresar Al Inicio</a>
            </div>
        </div>
    </div>
</body>

<footer class="footer">
    <div class="container">
        <h4>Dev's:</h4>
        <ul id="nombres">
            <li>Altamirano Niggel.</li>
            <li>Cota Isael.</li>
            <li>Juarez Xavier.</li>
            <li>Sanchez Daniel</li>
        </ul>

        <h4>Universidad: </h4>
        <ul>
            <li>Universidad Autonoma de Baja California Sur</li>
        </ul>

        <h4>Carrera: </h4>
        <ul>
            <li>Ingenieria en Desarrollo de Software</li>
        </ul>
    </div>
</footer>