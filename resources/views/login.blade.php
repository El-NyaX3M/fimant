<x-app-layout>
<form action="{{route('login')}}" method="post">
    @csrf
    <body class="body d-flex justify-content-center align-items-center vh-100" id="fondo">
        <div class="p-5 rounded-5 text-secondary shadow" style="width: 25rem" id="caja-Login">
            <div class="d-flex justify-content-center">
                <img src="\img\img-noIcons\logo_uabcs.png" alt="login-icon" style="height: 7rem"/>
                <!--Imagen Original-->
                <!--<img src="\img\login-icon.svg" alt="login-icon" style="height: 7rem"/>-->
            </div>
            <div class="text-center fs-3 fw-bold text-light">Inicio de Sesion</div>
            <div class="input-group mt-4">
              <div class="input-group-text bg-success"><img src="https://freesvg.org/img/Minduka-mail.png" alt="username-icon" style="height: 1rem" />
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
            <div>
              <input class="btn btn-success text-white w-100 mt-4 fw-semibold shadow-sm bg-success" type="submit" name="Iniciar Sesión">
            </div>
        </form>
            <div class="text-white w-100 mt-4 fw-semibold shadow-sm" id="links-Login">
                ¿No tiene cuenta? de<a href="{{url('register')}}" class="text-succes w-100 mt-4 fw-semibold shadow-sm"> Click Aqui</a>
                 O Puede<a href="{{url('/')}}" class="text-succes w-100 mt-4 fw-semibold shadow-sm"> Regresar Al Inicio</a>
            </div>
        </div>
    </div>
</body>

</x-app-layout>
