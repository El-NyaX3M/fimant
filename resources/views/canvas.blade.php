<x-app-layout>
    <style>
        
        canvas{
            display:block;
        }
    </style>
<div class="row">
    <div class="container-fluid bg-dark col-12">
        <div class="col-6" id="radioBtn"> 
            <a class="btn btn-outline-light btn-lg active" data-toggle="fun" data-title="cursor" onclick="setFigura('cursor')"><i class="fa-solid fa-arrow-pointer fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="cuadrado" onclick="setFigura('rectángulo')"><i class="fa-regular fa-square fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="circulo" id="drawEllipse" onclick="setFigura('círculo')"><i class="fa-regular fa-circle fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="linea" onclick="setFigura('línea')"><i class="fa-solid fa-slash fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="texto" onclick="setFigura('texto')"><i class="fa-solid fa-font fa-lg"></i></a>
            {{-- <button class="btn btn-outline-light btn-lg"><i class="fa-solid fa-arrow-pointer fa-lg"></i></button>
            <button class="btn btn-outline-light btn-lg"><i class="fa-regular fa-square fa-lg"></i></button>
            <button class="btn btn-outline-light btn-lg"><i class="fa-regular fa-circle fa-lg"></i></button>
            <button class="btn btn-outline-light btn-lg"><i class="fa-solid fa-slash fa-lg"></i></button>
            <button class="btn btn-outline-light btn-lg"><i class="fa-solid fa-font fa-lg"></i></button> --}}
            <a id="titulo">Nombre</a> <!--Devolver nombre de proyecto-->
            <a href="{{url('/projects')}}" class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="regresar" id="backcss"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
            <a href="{{url('/projects')}}" class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="guardar" id="savecss"><i class="fa-solid fa-floppy-disk"> Guardar</i></a>
        </div>
    </div>
    <div class="col-2 bg-dark canvas-container">
        <p class="text-white ms-2 mt-2">Capas</p>
        <hr class="canvas-hr ms-1">
    </div>

    <div class="col-8 bg-light canvas-container" id="contenedor"></div>

    <div class="col-2 bg-dark canvas-container">
        <p class="text-white ms-2 mt-2">Diseño</p>
        <hr class="canvas-hr ms-1">
        <div class="canvas-options-container rounded">

            <div class="row">
                <div class="col-6">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="X">
                    </div>
                </div>
                <div class="col-6">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="Y">
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-6">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="W">
                    </div>
                </div>
                <div class="col-6">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="H">
                    </div>
                </div>
            </div>
            
            <div class="row mt-3 justify-content-center">
                <div class="col-6">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="R">
                    </div>
                </div>
            </div>

        </div>

        <div class="canvas-options-container rounded mt-5">    
            <div class="row">
                <div class="col-6">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="Color">
                    </div>
                </div>
            </div>
    
        </div>
    </div>

    
</div>
    
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/p5@1.6.0/lib/p5.js"></script>
<script src="{{asset('js/sketch.js')}}"></script>
<script src="{{asset('js/pila.js')}}"></script>
<script src="{{asset('js/figura.js')}}"></script>
<script>
    $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);

        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    })
</script>


</x-app-layout>
