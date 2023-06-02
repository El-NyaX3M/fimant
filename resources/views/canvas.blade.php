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
    <div class="col-2 bg-dark canvas-container-capas">
        <p class="text-white ms-2 mt-2">Capas</p>
        <hr class="canvas-hr ms-1">
        <div v-for="(figura,index) in figuras" class="d-grid gap-2 mt-1">
            <button type="button" class="btn btn-outline-light btn-block text-start" @click="seleccionarFigura(index)" :id="'capa'+index">
                @{{figura.figura}}
            </button>
            
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
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="X" id="xFigura">
                    </div>
                </div>
                <div class="col-6">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="Y" id="yFigura">
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-6">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="W" id="wFigura">
                    </div>
                </div>
                <div class="col-6">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="H" id="hFigura">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="X1" id="x1Figura">
                    </div>
                </div>
                <div class="col-6">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="Y1" id="h1Figura">
                    </div>
                </div>
            </div>
            
            <div class="row mt-3 justify-content-center">
                <div class="col-6">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="R" id="rFigura">
                    </div>
                </div>
            </div>

        </div>

        <div class="canvas-options-container rounded mt-5">
            <label for="bgColor" class="form-label text-white">Background Color</label>    
            <div class="row" id="bgColor">
                <div class="col-4">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="Red" id="bgcolorRed">
                    </div>
                </div>
                <div class="col-4">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="Green" id="bgcolorGreen">
                    </div>
                </div>
                <div class="col-4">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="Blue" id="bgcolorBlue">
                    </div>
                </div>
            </div>
    
        </div>

        <div class="canvas-options-container rounded mt-5">
            <label for="bgColor" class="form-label text-white">Line Color</label>    
            <div class="row" id="bgColor">
                <div class="col-4">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="Red" id="linecolorRed">
                    </div>
                </div>
                <div class="col-4">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="Green" id="linecolorGreen">
                    </div>
                </div>
                <div class="col-4">
                    <div class="canvas-options rounded">
                        <input type="text" class="canvas-inputs bg-dark rounded" placeholder="Blue" id="linecolorBlue">
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
                    this.figuras.push(new Figura(mouseX, mouseY, this.tipoFigura));
                    console.log(this.figuras);
                }
            },
            setFigura(shape){
                this.tipoFigura = shape;
                console.log(this.tipoFigura);
            },
            previsual(sketch){
                sketch.stroke(1);
                sketch.fill('rgba(200, 200, 200, 0.2)');
                    switch(this.tipoFigura){
                        case 'rectángulo':
                        sketch.rect(sketch.mouseX-25, sketch.mouseY-25, 50, 50);
                            break;
                        case 'círculo':
                        sketch.ellipse(sketch.mouseX, sketch.mouseY, 50, 50);
                            break;
                    }
            },
            seleccionarFigura(index){
                document.getElementById('xFigura').value = this.figuras[index].x;
                document.getElementById('yFigura').value = this.figuras[index].y;
                document.getElementById('hFigura').value = this.figuras[index].h;
                document.getElementById('wFigura').value = this.figuras[index].w;
                /* document.getElementById('x1Figura').value = this.figuras[index].x1;
                document.getElementById('y1Figura').value = this.figuras[index].y1; */
                document.getElementById('bgcolorRed').value = this.figuras[index].bgColor.red;
                document.getElementById('bgcolorGreen').value = this.figuras[index].bgColor.green;
                document.getElementById('bgcolorBlue').value = this.figuras[index].bgColor.blue;
                document.getElementById('linecolorRed').value = this.figuras[index].lineColor.red;
                document.getElementById('linecolorGreen').value = this.figuras[index].lineColor.green;
                document.getElementById('linecolorBlue').value = this.figuras[index].lineColor.blue
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
                    this.previsual(sketch);
                    for (let i = this.figuras.length - 1; i >= 0; i--) {
                            this.figuras[i].draw(sketch);
                        }
                };

                sketch.mouseClicked = () =>{
                    if(sketch.mouseX>0 && sketch.mouseX<sketch.width && sketch.mouseY>0 && sketch.mouseY<sketch.height){
                        this.agregarFigura(sketch.mouseX,sketch.mouseY);
                    }
                    if(this.tipoFigura==="cursor"){
                        sketch.selectFigura();
                    }   
                }

                sketch.selectFigura = () => {
                        for(let objeto of this.figuras){
                            if(sketch.mouseX >= objeto.x && sketch.mouseX <= objeto.x + objeto.w && sketch.mouseY >= objeto.y && sketch.mouseY <= objeto.y + objeto.h){
                                objeto.diselect();
                            }
                            else{
                                objeto.diselect();
                                shapeModif = 'none';
                            }
                        }
                        for(let objeto of this.figuras){
                            if(sketch.mouseX >= objeto.x && sketch.mouseX <= objeto.x + objeto.w && sketch.mouseY >= objeto.y && sketch.mouseY <= objeto.y + objeto.h){
                                objeto.selected();
                                shapeModif = objeto;
                                console.log(objeto);
                                break;
                            }
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
