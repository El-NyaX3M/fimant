<x-app-layout>
    <style>
        
        canvas{
            display:block;
        }
    </style>
<div class="row" id="app">
    <div class="container-fluid bg-dark col-12">
        <div class="col-6" id="radioBtn"> 
            <a class="btn btn-outline-light btn-lg active" data-toggle="fun" data-title="cursor" @click="setFigura('cursor')"><i class="fa-solid fa-arrow-pointer fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="cuadrado" @click="setFigura('rectángulo')"><i class="fa-regular fa-square fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="circulo" id="drawEllipse" @click="setFigura('círculo')"><i class="fa-regular fa-circle fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="linea" @click="setFigura('línea')"><i class="fa-solid fa-slash fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="texto" @click="setFigura('texto')"><i class="fa-solid fa-font fa-lg"></i></a>
            {{-- <button class="btn btn-outline-light btn-lg"><i class="fa-solid fa-arrow-pointer fa-lg"></i></button>
            <button class="btn btn-outline-light btn-lg"><i class="fa-regular fa-square fa-lg"></i></button>
            <button class="btn btn-outline-light btn-lg"><i class="fa-regular fa-circle fa-lg"></i></button>
            <button class="btn btn-outline-light btn-lg"><i class="fa-solid fa-slash fa-lg"></i></button>
            <button class="btn btn-outline-light btn-lg"><i class="fa-solid fa-font fa-lg"></i></button> --}}
            <a id="titulo">{{$project->name}}</a> <!--Devolver nombre de proyecto-->
            <a href="{{url('/projects')}}" class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="regresar" id="backcss"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
            <a href="{{url('/projects')}}" class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="guardar" id="savecss"><i class="fa-solid fa-floppy-disk"> Guardar</i></a>
        </div>
    </div>
    <div class="col-2 bg-dark canvas-container">
        <p class="text-white ms-2 mt-2">Capas</p>
        <hr class="canvas-hr ms-1">
        <div v-for="(figura,index) in figuras">
            <h3 class="text-white">
                @{{figura.figura}}
            </h3>
            
        </div>
        
    </div>

    <div class="col-8 bg-light canvas-container p-0" id="contenedorCanvas"></div>

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
{{-- <script src="{{asset('js/sketch.js')}}"></script>
<script src="{{asset('js/pila.js')}}"></script>
 --}}
<script src="{{asset('js/figuraprueba.js')}}"></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>
    const { createApp } = Vue

    createApp({
        data() {
            return {
                figuras: [],
                tipoFigura: "cursor",
                message: 'Hello Vue!'
            }
        },
        methods: {
            agregarFigura(mouseX,mouseY){
                if(this.tipoFigura != 'cursor'){
                    this.figuras.push(new Figura(mouseX, mouseY, this.tipoFigura))
                }
                /* else{
                    selectFigura();
                } */
            },
            setFigura(shape){
                this.tipoFigura = shape;
                console.log(this.tipoFigura);
            },
            selectFigura(){
                for(let objeto of this.figuras){
                    if(mouseX >= objeto.x && mouseX <= objeto.x + objeto.w && mouseY >= objeto.y && mouseY <= objeto.y + objeto.h){
                        objeto.diselect();
                    }
                    else{
                        objeto.diselect();
                        shapeModif = 'none';
                    }
                }
                for(let objeto of this.figuras){
                    if(mouseX >= objeto.x && mouseX <= objeto.x + objeto.w && mouseY >= objeto.y && mouseY <= objeto.y + objeto.h){
                        objeto.selected();
                        shapeModif = objeto;
                        console.log(objeto);
                        break;
                    }
                    console.log(objeto);
                }
            
            }
        },
        mounted() {

            const s = ( sketch ) => {
                sketch.setup = () =>{
                    var canvasDiv = document.getElementById('contenedorCanvas');
                    var width = canvasDiv.offsetWidth;
                    var height = canvasDiv.offsetHeight;
                    sketch.createCanvas(width, height);
                };
                
                sketch.draw = () => {
                    sketch.background(255);
                    for (let i = this.figuras.length - 1; i >= 0; i--) {
                            this.figuras[i].draw(sketch);
                        }
                };

                sketch.mouseClicked = () =>{
                    if(sketch.mouseX>0 && sketch.mouseX<sketch.width && sketch.mouseY>0 && sketch.mouseY<sketch.height){
                        this.agregarFigura();
                    }
                    
                }
            };
            let myp5 = new p5(s, 'contenedorCanvas');
        },

    }).mount('#app')



    $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);

        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    })
</script>


</x-app-layout>
