<x-app-layout>
    <body class="d-flex flex-column" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4eYu5hgqQ-gIpEP6DqRBWdpAlSm5vE2V0E1icTtQPnyyYoN24wFnj4bjXxWlRdQH5ZHw&usqp=CAU%27); ">
    <div class="container-fluid">
        <div class="row">
          <!-- Sidebar -->
          <div class="col-md-3 sidebar text-center min-vh-100" style="background-color: rgba(0,0,0,.9);">
            <h1 style="color:white;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Proyectos</h1>
            <br>
            <br>
            <p style="color:white;font-size:25px;">{{Auth::user()->name}}</p>
            <br>
            <br>
            <div class="mt-2">
                <button class="btn btn-success text-white w-45 mt-4 fw-semibold shadow-sm">Detalles</button>
            </div>
            <div class="mt-3">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <input class="btn btn-danger text-white w-45 mt-4 fw-semibold shadow-sm" type="submit" name="Cerrar sesión" value="Cerrar Sesión">
                </form>
            </div>
            <div class="mt-12"></div>
          </div>
          
          
          <!-- Contenido principal -->
          <div class="col-md-9 container-fluid">
            <!-- Aquí va el contenido principal de tu página -->
          <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <p class="mb-sm-0" style="font-size: 50px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Archivos</p>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                </div>
                <!-- container-fluid -->
                <!--Cartas de proyectos-->
                <div class="row p-2">
                      <div class="card col-2 text-center m-2">
                      <img class="card-img-top img-fluid m-2 rounded mx-auto d-block" src="img_prueba.png" alt="Card image cap" style="width: 150px;height: 150px;">
                      <div class="card-body">
                          <h4 class="card-title mb-2">Proyecto A</h4>
                          <div class="text-end">
                              <a href="javascript:void(0);" class="btn btn-primary">Abrir</a>
                          </div>
                      </div>
                    </div>
                      <div class="card col-2 text-center m-2">
                        <img class="card-img-top img-fluid m-2 rounded mx-auto d-block" src="img_prueba.png" alt="Card image cap" style="width: 150px;height: 150px;">
                        <div class="card-body">
                            <h4 class="card-title mb-2">Proyecto A</h4>
                            <div class="text-end">
                                <a href="javascript:void(0);" class="btn btn-primary">Abrir</a>
                            </div>
                        </div>
                    </div>
                      <div class="card col-2 text-center m-2">
                        <img class="card-img-top img-fluid m-2 rounded mx-auto d-block" src="img_prueba.png" alt="Card image cap" style="width: 150px;height: 150px;">
                        <div class="card-body">
                            <h4 class="card-title mb-2">Proyecto A</h4>
                            <div class="text-end">
                                <a href="javascript:void(0);" class="btn btn-primary">Abrir</a>
                            </div>
                        </div>
                    </div>
                      <div class="card col-2 text-center m-2">
                        <img class="card-img-top img-fluid m-2 rounded mx-auto d-block" src="img_prueba.png" alt="Card image cap" style="width: 150px;height: 150px;">
                        <div class="card-body">
                            <h4 class="card-title mb-2">Proyecto A</h4>
                            <div class="text-end">
                                <a href="javascript:void(0);" class="btn btn-primary">Abrir</a>
                            </div>
                        </div>
                    </div>
                      <div class="card col-2 text-center m-2">
                        <img class="card-img-top img-fluid m-2 rounded mx-auto d-block" src="img_prueba.png" alt="Card image cap" style="width: 150px;height: 150px;">
                        <div class="card-body">
                            <h4 class="card-title mb-2">Proyecto A</h4>
                            <div class="text-end">
                                <a href="javascript:void(0);" class="btn btn-primary">Abrir</a>
                            </div>
                        </div>
                    </div>
                      <div class="card col-2 text-center m-2">
                        <img class="card-img-top img-fluid m-2 rounded mx-auto d-block" src="img_prueba.png" alt="Card image cap" style="width: 150px;height: 150px;">
                        <div class="card-body">
                            <h4 class="card-title mb-2">Proyecto A</h4>
                            <div class="text-end">
                                <a href="javascript:void(0);" class="btn btn-primary">Abrir</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!--Fin de cartas de proyectos-->
                
            </div>
        </div>
            
          </div>
        </div>
      </div>
</body>
    

<a href="{{route('projects.create')}}"><button>Crear Proyecto</button></a>


</x-app-layout>