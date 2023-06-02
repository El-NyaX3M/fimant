<x-app-layout>
    <body class="d-flex flex-column" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4eYu5hgqQ-gIpEP6DqRBWdpAlSm5vE2V0E1icTtQPnyyYoN24wFnj4bjXxWlRdQH5ZHw&usqp=CAU%27); ">
    <div class="container-fluid">
        <div class="row">
          <!-- Sidebar -->
          <div class="col-md-2 sidebar text-center min-vh-100" style="background-color: rgba(0,0,0,.9);">
            <h1 class="mt-4" style="color:white;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Proyectos</h1>
            <br>
            <br>
            <p style="color:white;font-size:25px;">{{Auth::user()->name}}</p>
            <br>
            <br>
            <div class="mt-2">
                <button class="btn btn-success text-white w-45 mt-4 fw-semibold shadow-sm"data-bs-toggle="modal" data-bs-target="#modalDetalle">Detalles</button>
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
                        <div class="col-11 header mt-2 rounded">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <p class="mb-sm-0" style="font-size: 50px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color:white;">Archivos</p>

                                <div class="col-2 page-title-right ">
                                    <button class="btn btn-success ms-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Crear Proyecto</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row mt-3">
                      <div class="col-md-12">
                          @if(session()->has('success'))
                          <x-status-alert color="primary" status="Hecho"></x-status-alert>
                          @endif
                          @if(session()->has('error'))
                          <x-status-alert color="danger" status="Error"></x-status-alert>
                          @endif
                      </div>
                  </div>
                </div>
                <!-- container-fluid -->
                <!--Cartas de proyectos-->
                <div class="row p-2">
                    @foreach ($projects as $project)
                        <div class="card col-2 text-center m-2" style="background-color: rgba(49,50,57,255);">
                      <img class="card-img-top img-fluid m-2 rounded mx-auto d-block" src="https://pbs.twimg.com/media/BghFfeGIUAERzGb.jpg:large" alt="Card image cap" style="width: 150px;height: 150px;">
                        <div class="card-body">
                            <h4 class="card-title mb-2" id="nProyectos">{{$project->name}}</h4>
                            <h6 class="card-title mb-2" id="fechaP"> Fecha: {{$project->created_at}}.</h6>
                            <div class="text-end text-center">
                                  <a href="{{url('/canvas',$project->id)}}" class="btn btn-success">Abrir</a>
                            </div>
                        </div>
                      </div>
                    @endforeach
                      
                      
                    
                </div>
                <!--Fin de cartas de proyectos-->
                
            </div>

            <!--Modales-->
              <!-- Modal 1 -->
              <form action="{{route('projects.store')}}" method="post">
                @csrf
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmacion</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!--Cuerpo del Modal-->
                      
                      <h5>Nombre del proyecto:</h5>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Nombre del Proyecto..." aria-label="Nombre del Proyecto..." name="projectName" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-success" type="submit">Crear Proyecto</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>

              <!-- Modal 2 -->
              <div class="modal fade" id="modalDetalle" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="modalDetalleLabel">Detalles de Usuario</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!--Cuerpo del Modal-->
                      <h6>Nombre de Usuario: {{Auth::user()->name}}.</h6>
                      <h6>E-mail del usuario: {{Auth::user()->email}}.</h6>
                      <h6>Numero de proyectos realizados: {{$projectsCount}}.</h6> 
                    </div>
                  </div>
                </div>
              </div>
        </div>
            
          </div>
        </div>
      </div>
</body>


</x-app-layout>