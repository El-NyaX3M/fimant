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
            <button type="button" class="btn btn-outline-light btn-lg notActive" data-toggle="fun" data-title="guardar" id="savecss" @click="guardar()"><i class="fa-solid fa-floppy-disk"> Guardar</i></button> 
            {{-- FORM PARA GUARDAR EL PROYECTO --}}
            <form action="{{route('projects.save',$project->id)}}" method="post" id="formGuardar">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{$project->id}}">
                <input type="hidden" name="shapes" value="" id="shapes">     
            </form>
            
        </div>
    </div>
    <div class="col-2 bg-dark canvas-container-capas">
        <p class="text-white ms-2 mt-2">Capas</p>
        <hr class="canvas-hr ms-1">
        <div v-for="(figura,index) in figuras" class="mt-3">
            <button type="button" class="btn btn-outline-light btn-block w-50 text-start" @click="seleccionarFigura(index)" :id="'capa'+index">
                @{{figura.figura}}
            </button>
            <button type="button" class="btn btn-outline-light btn-block ms-2 text-start" @click="setHidden(index)"><i class=" fa-regular fa-eye-slash fa-xs" v-if="figuras[index].hidden"></i> <i class="fa-solid fa-eye fa-xs" v-else></i> </button>
            <button type="button" class="btn btn-outline-light btn-block ms-2 text-start" @click="eliminarFigura(index)"><i class="fa-solid fa-trash fa-xs"></i></button>
        </div>
        
    </div>

    <div class="col-8 bg-light canvas-container p-0" id="contenedorCanvas"></div>

    <div class="col-2 bg-dark canvas-container">
        <p class="text-white ms-2 mt-2">Diseño</p>
        <hr class="canvas-hr ms-1">
        <div v-if="figuraSeleccionada">
                <div class="canvas-options-container rounded" >

                    <div class="row">
                        <div class="col-6">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="X" id="xFigura" v-model="figuraSeleccionada.x">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Y" id="yFigura" v-model="figuraSeleccionada.y">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-6" v-if="figura!='texto'">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="W" id="wFigura" v-model="figuraSeleccionada.w">
                            </div>
                        </div>
                        <div class="col-6" v-if="figura=='rectángulo' || figura=='círculo'">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="H" id="hFigura" v-model="figuraSeleccionada.h">
                            </div>
                        </div>
                    </div>
        
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Opacidad relleno" id="opacidadRellenoFigura" v-model="figuraSeleccionada.bgColor.alpha">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Opacidad borde" id="opacidadBordeFigura" v-model="figuraSeleccionada.lineColor.weight">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3 justify-content-center">
                        <div class="col-6" v-if="figura==='rectángulo'">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="R" id="rFigura" v-model="figuraSeleccionada.r">
                            </div>
                        </div>
                    </div>
        
                </div>
        
                <div class="canvas-options-container rounded mt-5" v-if="figura==='rectángulo' || figura==='círculo'">
                    <label for="bgColor" class="form-label text-white">Background Color</label>    
                    <div class="row" id="bgColor">
                        <div class="col-4">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Red" id="bgcolorRed" v-model="figuraSeleccionada.bgColor.red">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Green" id="bgcolorGreen" v-model="figuraSeleccionada.bgColor.green">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Blue" id="bgcolorBlue" v-model="figuraSeleccionada.bgColor.blue">
                            </div>
                        </div>
                    </div>
            
                </div>
        
                <div class="canvas-options-container rounded mt-5">
                    <label for="bgColor" class="form-label text-white">Line Color</label>    
                    <div class="row" id="bgColor">
                        <div class="col-4">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Red" id="linecolorRed">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Green" id="linecolorGreen">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Blue" id="linecolorBlue">
                            </div>
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
                shapes: @json($project->shapes),
                figuras: [],
                tipoFigura: "cursor",
                figura: "cursor",
                figuraSeleccionada: null,
            }
        },
        methods: {
            agregarFigura(mouseX,mouseY){
                if(this.tipoFigura != 'cursor'){
                    this.figuras.push(new Figura(mouseX, mouseY, this.tipoFigura));
                }
            },
            setFigura(shape){
                this.tipoFigura = shape;
                this.figura = shape;
            },
            reset(){
                this.figuraSeleccionada = null;
                this.figuras.forEach((element,index) => {
                    element.select = false;
                    document.getElementById('capa'+index).classList.remove('capa-activa');
                });
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
                this.reset();
                document.getElementById('capa'+index).classList.add('capa-activa');
                this.figuraSeleccionada = this.figuras[index];
                this.figuraSeleccionada.select = true;
                this.figura = this.figuraSeleccionada.figura;    
            },
            guardar(){
                document.getElementById('shapes').value = JSON.stringify(this.figuras);
                console.log(document.getElementById('shapes').value);
                document.getElementById('formGuardar').submit();
            },
            setHidden(index){
                if (this.figuras[index].hidden) {
                    this.figuras[index].hidden=false;
                }else{
                    this.figuras[index].hidden=true;
                }
                
            },
            eliminarFigura(index){
                this.figuras.splice(index,1);
            },

            
        },
        created() {
            if(this.shapes!=null){
                this.shapes = JSON.parse(this.shapes);
                this.shapes.forEach(element => {
                    this.figuras.push(new Figura(element.x,element.y,element.figura));
                    if (element.figura==="rectángulo") {
                        this.figuras[this.figuras.length-1].actualizarMedidas(element.x,element.y,element.w,element.h);
                        this.figuras[this.figuras.length-1].actualizarEsquinas(element.r);
                        this.figuras[this.figuras.length-1].actualizarRelleno(element.bgColor.red, element.bgColor.green, element.bgColor.blue, element.bgColor.alpha);
                    }
                    
                });
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
                            if (!this.figuras[i].hidden) {
                                this.figuras[i].draw(sketch);
                            }    
                        }
                };

                sketch.mouseClicked = () =>{
                    if(this.tipoFigura!="cursor" && sketch.mouseX>0 && sketch.mouseX<sketch.width && sketch.mouseY>0 && sketch.mouseY<sketch.height){
                        this.agregarFigura(sketch.mouseX,sketch.mouseY);
                    }
                    if(this.tipoFigura==="cursor" && sketch.mouseX>0 && sketch.mouseX<sketch.width && sketch.mouseY>0 && sketch.mouseY<sketch.height){
                        sketch.selectFigura();
                    }   
                }

                sketch.selectFigura = () => {
                        for(let objeto of this.figuras){
                            if(sketch.mouseX >= objeto.x && sketch.mouseX <= objeto.x + objeto.w && sketch.mouseY >= objeto.y && sketch.mouseY <= objeto.y + objeto.h){
                                objeto.diselect();
                                document.getElementById('capa'+this.figuras.indexOf(objeto)).classList.remove('capa-activa');
                            }
                            else{
                                objeto.diselect();
                                shapeModif = 'none';
                            }
                        }
                        for(let objeto of this.figuras){
                            if(sketch.mouseX >= objeto.x && sketch.mouseX <= objeto.x + objeto.w && sketch.mouseY >= objeto.y && sketch.mouseY <= objeto.y + objeto.h){
                                this.reset();
                                objeto.selected();
                                shapeModif = objeto;
                                this.figuraSeleccionada = objeto;
                                this.figura = this.figuraSeleccionada.figura;    
                                document.getElementById('capa'+this.figuras.indexOf(objeto)).classList.add('capa-activa');
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
