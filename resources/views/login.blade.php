<x-app-layout>
  <style>
      .bg-black {
          --bs-bg-opacity: 1;
          background-color: rgba(var(--bs-black-rgb), var(--bs-bg-opacity)) !important;
      }
  </style>
  <form action="{{route('login')}}" method="post">
      @csrf
      <body class="d-flex flex-column" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4eYu5hgqQ-gIpEP6DqRBWdpAlSm5vE2V0E1icTtQPnyyYoN24wFnj4bjXxWlRdQH5ZHw&usqp=CAU'); ">
          <div class="row justify-content-center mt-5 mb-5" >
          <div class="p-5 rounded-5 text-secondary shadow bg-black" style="width: 25rem; --bs-bg-opacity: .9;" id="caja-Login">
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
                <input class="btn btn-success text-white w-100 mt-4 fw-semibold shadow-sm" type="submit" name="Iniciar Sesión">
              </div>
          </form>
              <div class="text-white w-100 mt-4 fw-semibold shadow-sm text-center" id="links-Login">
                  ¿No tiene cuenta? de<a href="{{url('register')}}" class="link-success fw-semibold shadow-sm text-decoration-none"> Click Aqui</a>
                   O Puede<a href="{{url('/')}}" class="link-success fw-semibold shadow-sm text-decoration-none"> Regresar Al Inicio</a>
              </div>
          </div>
      </div>
  </div>
  </body>
  
  </x-app-layout>
  