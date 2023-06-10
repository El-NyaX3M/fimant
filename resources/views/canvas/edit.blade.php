<x-app-layout>
    <style>
        
        canvas{
            display:block;
        }
    </style>
<div class="row" id="app">
    <div class="container-fluid bg-dark col-12">
        <div class="col-6" id="radioBtn"> 
            <a class="btn btn-outline-light btn-lg active ms-1" data-toggle="fun" data-title="cursor" @click="setFigura('cursor')"><i class="fa-solid fa-arrow-pointer fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive ms-1" data-toggle="fun" data-title="cuadrado" @click="setFigura('rectángulo')"><i class="fa-regular fa-square fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive ms-1" data-toggle="fun" data-title="circulo" id="drawEllipse" @click="setFigura('círculo')"><i class="fa-regular fa-circle fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive ms-1" data-toggle="fun" data-title="linea" @click="setFigura('línea')"><i class="fa-solid fa-slash fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive ms-1" data-toggle="fun" data-title="texto" @click="setFigura('texto')"><i class="fa-solid fa-font fa-lg"></i></a>
            <a class="btn btn-outline-light btn-lg notActive ms-1" data-toggle="fun" data-title="mover" @click="setFigura('mover')"><i class="fa-solid fa-arrows-up-down-left-right fa-lg"></i></a>
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
                <input type="hidden" name="cover" value="" id="cover">      
            </form>
            
        </div>
    </div>
    <div class="col-3 bg-dark canvas-container-capas">
        <p class="text-white ms-2 mt-2">Capas</p>
        <hr class="canvas-hr ms-1">
        <div v-for="(figura,index) in figuras" class="mt-3 mb-3">
            <button type="button" class="btn btn-outline-light btn-block w-50 text-start" @click="seleccionarFigura(index)" :id="'capa'+index">
                @{{figura.figura}}
            </button>
            <button type="button" class="btn btn-outline-light ms-2" @click="setHidden(index)"><i class=" fa-regular fa-eye-slash fa-xs" v-if="figuras[index].hidden"></i> <i class="fa-solid fa-eye fa-xs" v-else></i> </button>
            <button type="button" class="btn btn-outline-danger ms-2" @click="eliminarFigura(index)"><i class="fa-solid fa-trash fa-xs"></i></button>
                <button type="button" class="btn btn-outline-light ms-2" v-if="index!==0" @click="cambiarOrden(index,'subir')"><i class="fa-sharp fa-solid fa-arrow-up fa-2xs"></i></button>
                <button type="button" class="btn btn-outline-light ms-2" v-if="index!=figuras.length-1" @click="cambiarOrden(index,'bajar')"><i class="fa-sharp fa-solid fa-arrow-down fa-2xs"></i></button>
            
        </div>
        
    </div>

    <div class="col-7 bg-light canvas-container p-0" id="contenedorCanvas"></div>

    <div class="col-2 bg-dark canvas-container">
        <p class="text-white ms-2 mt-2">Diseño</p>
        <hr class="canvas-hr ms-1">
        <div v-if="figuraSeleccionada">
                <div class="canvas-options-container rounded" >

                    <div class="row" v-if="figuraSeleccionada.figura==='texto'">
                        <div class="col-12">
                            <div class="canvas-options rounded">
                                <input type="text" class="canvas-inputs bg-dark rounded" placeholder="Texto" id="palabraFigura" v-model="figuraSeleccionada.palabra">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="fuenteFigura" class="text-white">Tamaño</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Fuente" id="fuenteFigura" v-model="figuraSeleccionada.fuente">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="xFigura" class="text-white">X</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="X" id="xFigura" v-model="figuraSeleccionada.x">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="yFigura" class="text-white">Y</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Y" id="yFigura" v-model="figuraSeleccionada.y">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3" v-if="figuraSeleccionada.figura!='texto' && figuraSeleccionada.figura!='línea'">
                        <div class="col-6" >
                            <label for="wFigura" class="text-white">W</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="W" id="wFigura" v-model="figuraSeleccionada.w">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="hFigura" class="text-white">H</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="H" id="hFigura" v-model="figuraSeleccionada.h">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3" v-if="figuraSeleccionada.figura==='línea'">
                        <div class="col-6" >
                            <label for="x1Figura" class="text-white">X1</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="X1" id="x1Figura" v-model="figuraSeleccionada.x1">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="y1Figura" class="text-white">Y1</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Y1" id="y1Figura" v-model="figuraSeleccionada.y1">
                            </div>
                        </div>
                    </div>
        
                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="opacidadRellenoFigura" class="text-white">Opacidad relleno</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Opacidad relleno" id="opacidadRellenoFigura" v-model="figuraSeleccionada.bgColor.alpha">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="opacidadBordeFigura" class="text-white">Opacidad borde</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Opacidad borde" id="opacidadBordeFigura" v-model="figuraSeleccionada.lineColor.weight">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3 justify-content-center">
                        <div class="col-6" v-if="figuraSeleccionada.figura==='rectángulo'">
                            <label for="rFigura" class="text-white">R</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="R" id="rFigura" v-model="figuraSeleccionada.r">
                            </div>
                        </div>
                    </div>
        
                </div>
        
                <div class="canvas-options-container rounded mt-5" v-if="figuraSeleccionada.figura!=='línea'">
                    <label for="bgColor" class="form-label text-white">Background Color</label>    
                    <div class="row" id="bgColor">
                        <div class="col-4">
                            <label for="bgcolorRed" class="text-white">Red</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Red" id="bgcolorRed" v-model="figuraSeleccionada.bgColor.red">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="bgcolorGreen" class="text-white">Green</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Green" id="bgcolorGreen" v-model="figuraSeleccionada.bgColor.green">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="bgcolorBlue" class="text-white">Blue</label>
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Blue" id="bgcolorBlue" v-model="figuraSeleccionada.bgColor.blue">
                            </div>
                        </div>
                    </div>
            
                </div>
        
                <div class="canvas-options-container rounded mt-5" v-if="figuraSeleccionada.figura!=='texto'">
                    <label for="bgColor" class="form-label text-white">Line Color</label>    
                    <div class="row" id="bgColor">
                        <div class="col-4">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Red" id="linecolorRed" v-model="figuraSeleccionada.lineColor.red">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Green" id="linecolorGreen" v-model="figuraSeleccionada.lineColor.green">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="canvas-options rounded">
                                <input type="number" class="canvas-inputs bg-dark rounded" placeholder="Blue" id="linecolorBlue" v-model="figuraSeleccionada.lineColor.blue">
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
                figuraSeleccionada: null,
                primerClick: [],
                segundoClick: [],
            }
        },
        methods: {
            agregarFigura(mouseX,mouseY){
                if(this.tipoFigura != 'cursor' || this.tipoFigura != 'mover'){
                    this.figuras.push(new Figura(mouseX, mouseY, this.tipoFigura));
                }
            },
            reset(){
                this.figuraSeleccionada = null;
                this.figuras.forEach((element,index) => {
                    element.select = false;
                    document.getElementById('capa'+index).classList.remove('capa-activa');
                });
            },
            setFigura(shape){
                this.tipoFigura = shape;
                if (shape!=='mover') {
                    this.reset();
                }
            },
            previsual(sketch){
                sketch.stroke(1);
                sketch.fill('rgba(200, 200, 200, 0.2)');
                sketch.strokeWeight(1);
                    switch(this.tipoFigura){
                        case 'rectángulo':
                            sketch.rect(sketch.mouseX-25, sketch.mouseY-25, 50, 50);
                            break;
                        case 'círculo':
                            sketch.ellipseMode(sketch.CENTER);
                            sketch.ellipse(sketch.mouseX, sketch.mouseY, 50, 50);
                            break;
                        case 'texto':
                            sketch.textSize(20);
                            sketch.text('Texto',sketch.mouseX, sketch.mouseY);
                            break;    
                    }
            },
            seleccionarFigura(index){     
                this.reset();
                document.getElementById('capa'+index).classList.add('capa-activa');
                this.figuraSeleccionada = this.figuras[index];
                console.log(this.figuraSeleccionada);
                this.figuraSeleccionada.select = true;   
            },
            guardar(){
                let canvas = document.getElementById("defaultCanvas0");
                let cover = canvas.toDataURL('image/png');
                document.getElementById('shapes').value = JSON.stringify(this.figuras);
                console.log(document.getElementById('shapes').value);      
                document.getElementById("cover").value = cover;
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
            cambiarOrden(index,direccion){
                let aux = this.figuras[index];
                if (direccion==='bajar') {
                    this.figuras[index] = this.figuras[index+1];
                    this.figuras[index+1] = aux;
                }else{
                    this.figuras[index] = this.figuras[index-1];
                    this.figuras[index-1] = aux;
                }
                
            }

            
        },
        created() {
            if(this.shapes!=null){
                this.shapes = JSON.parse(this.shapes);
                this.shapes.forEach(element => {
                    this.figuras.push(new Figura(element.x,element.y,element.figura));
                    if (element.figura === 'línea') {
                        this.figuras[this.figuras.length-1].actualizarMedidasLinea(element.x,element.y,element.x1, element.y1);
                        this.figuras[this.figuras.length-1].actualizarBorde(element.lineColor.red, element.lineColor.green, element.lineColor.blue, element.lineColor.weight);
                    }else if (element.figura === 'círculo') {
                        this.figuras[this.figuras.length-1].actualizarRelleno(element.bgColor.red, element.bgColor.green, element.bgColor.blue, element.bgColor.alpha);
                        this.figuras[this.figuras.length-1].actualizarBorde(element.lineColor.red, element.lineColor.green, element.lineColor.blue, element.lineColor.weight);
                        this.figuras[this.figuras.length-1].actualizarMedidas(element.x,element.y,element.w,element.h);
                    }else if(element.figura === 'rectángulo'){
                        this.figuras[this.figuras.length-1].actualizarRelleno(element.bgColor.red, element.bgColor.green, element.bgColor.blue, element.bgColor.alpha);
                        this.figuras[this.figuras.length-1].actualizarBorde(element.lineColor.red, element.lineColor.green, element.lineColor.blue, element.lineColor.weight);
                        this.figuras[this.figuras.length-1].actualizarMedidas(element.x,element.y,element.w,element.h);
                        this.figuras[this.figuras.length-1].actualizarEsquinas(element.r);
                    }else if(element.figura === 'texto'){
                        this.figuras[this.figuras.length-1].actualizarTexto(element.palabra, element.x, element.y, element.fuente);
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
                    if (this.tipoFigura==='mover') {
                        sketch.cursor(sketch.MOVE);
                    }else if (this.tipoFigura==='texto') {
                        sketch.cursor(sketch.TEXT);
                    }else if(this.tipoFigura!=='cursor'){
                        sketch.cursor(sketch.CROSS);
                    }
                    else{
                        sketch.cursor(sketch.CURSOR);
                    }
                };

                sketch.distanciaPuntoSegmento = (px, py, x1, y1, x2, y2) =>{
                    let A = px - x1;
                    let B = py - y1;
                    let C = x2 - x1;
                    let D = y2 - y1;

                    let dot = A * C + B * D;
                    let lenSq = C * C + D * D;
                    let param = -1;
                    if (lenSq !== 0) param = dot / lenSq;

                    let xx, yy;

                    if (param < 0) {
                        xx = x1;
                        yy = y1;
                    } else if (param > 1) {
                        xx = x2;
                        yy = y2;
                    } else {
                        xx = x1 + param * C;
                        yy = y1 + param * D;
                    }

                    let dx = px - xx;
                    let dy = py - yy;
                    return Math.sqrt(dx * dx + dy * dy);
                }

                /* CODIGO PARA SELECCIONAR LA FIGURA EN EL CANVAS */
                sketch.selectFigura = () => {
                        for(let objeto of this.figuras){
                            if(sketch.mouseX >= objeto.x && sketch.mouseX <= objeto.x + objeto.w && sketch.mouseY >= objeto.y && sketch.mouseY <= objeto.y + objeto.h){
                                this.figuraSeleccionada = null;
                                objeto.diselect();
                                document.getElementById('capa'+this.figuras.indexOf(objeto)).classList.remove('capa-activa');
                            }
                            else{
                                this.figuraSeleccionada = null;
                                objeto.diselect();
                                document.getElementById('capa'+this.figuras.indexOf(objeto)).classList.remove('capa-activa');
                            }
                        }
                        for(let objeto of this.figuras){
                            /* DETECTAR SELECCION EN CANVAS */
                            if (objeto.figura === "rectángulo") {
                                if (objeto.w > 0 && objeto.h > 0) {
                                    if (
                                        sketch.mouseX >= objeto.x &&
                                        sketch.mouseX <= objeto.x + objeto.w &&
                                        sketch.mouseY >= objeto.y &&
                                        sketch.mouseY <= objeto.y + objeto.h
                                    ) {
                                        this.reset();
                                        objeto.selected();
                                        this.figuraSeleccionada = objeto;
                                        document
                                            .getElementById("capa" + this.figuras.indexOf(objeto))
                                            .classList.add("capa-activa");
                                    }
                                } else if (objeto.w < 0 && objeto.h < 0) {
                                    if (
                                        sketch.mouseX >= objeto.x + objeto.w &&
                                        sketch.mouseX <= objeto.x &&
                                        sketch.mouseY >= objeto.y + objeto.h &&
                                        sketch.mouseY <= objeto.y
                                    ) {
                                        this.reset();
                                        objeto.selected();
                                        this.figuraSeleccionada = objeto;
                                        document
                                            .getElementById("capa" + this.figuras.indexOf(objeto))
                                            .classList.add("capa-activa");
                                    }
                                } else if (objeto.w < 0 && objeto.h > 0) {
                                    if (
                                        sketch.mouseX >= objeto.x + objeto.w &&
                                        sketch.mouseX <= objeto.x &&
                                        sketch.mouseY >= objeto.y &&
                                        sketch.mouseY <= objeto.y + objeto.h
                                    ) {
                                        this.reset();
                                        objeto.selected();
                                        this.figuraSeleccionada = objeto;
                                        document
                                            .getElementById("capa" + this.figuras.indexOf(objeto))
                                            .classList.add("capa-activa");
                                    }
                                } else if (objeto.w > 0 && objeto.h < 0) {
                                    if (
                                        sketch.mouseX >= objeto.x &&
                                        sketch.mouseX <= objeto.x + objeto.w &&
                                        sketch.mouseY >= objeto.y + objeto.h &&
                                        sketch.mouseY <= objeto.y
                                    ) {
                                        this.reset();
                                        objeto.selected();
                                        this.figuraSeleccionada = objeto;
                                        document
                                            .getElementById("capa" + this.figuras.indexOf(objeto))
                                            .classList.add("capa-activa");
                                    }
                                }
                            }
                            /* CIRCULO */
                            else if (objeto.figura === "círculo") {
                                if (objeto.x>objeto.w && objeto.y>objeto.h) {
                                    if(sketch.mouseX >= objeto.w && sketch.mouseX <= objeto.x && sketch.mouseY >= objeto.h && sketch.mouseY <= objeto.y){
                                        this.reset();
                                        objeto.selected();
                                        this.figuraSeleccionada = objeto;  
                                        document.getElementById('capa'+this.figuras.indexOf(objeto)).classList.add('capa-activa');
                                        break;
                                    }
                                }else if (objeto.x<objeto.w && objeto.y<objeto.h) {
                                    if(sketch.mouseX >= objeto.x && sketch.mouseX <= objeto.w && sketch.mouseY >= objeto.y && sketch.mouseY <= objeto.h){
                                        this.reset();
                                        objeto.selected();
                                        this.figuraSeleccionada = objeto;  
                                        document.getElementById('capa'+this.figuras.indexOf(objeto)).classList.add('capa-activa');
                                        break;
                                    }
                                }else if (objeto.x>objeto.w && objeto.y<objeto.h) {
                                    if(sketch.mouseX >= objeto.w && sketch.mouseX <= objeto.x && sketch.mouseY >= objeto.y && sketch.mouseY <= objeto.h){
                                        this.reset();
                                        objeto.selected();
                                        this.figuraSeleccionada = objeto;  
                                        document.getElementById('capa'+this.figuras.indexOf(objeto)).classList.add('capa-activa');
                                        break;
                                    }
                                }
                                else if (objeto.x<objeto.w && objeto.y>objeto.h) {
                                    if(sketch.mouseX >= objeto.x && sketch.mouseX <= objeto.w && sketch.mouseY >= objeto.h && sketch.mouseY <= objeto.y){
                                        this.reset();
                                        objeto.selected();
                                        this.figuraSeleccionada = objeto;  
                                        document.getElementById('capa'+this.figuras.indexOf(objeto)).classList.add('capa-activa');
                                        break;
                                    }
                                }
                            }
                            /* LINEA */
                            else if (objeto.figura === "línea") {
                                let distancia = sketch.distanciaPuntoSegmento(sketch.mouseX, sketch.mouseY, objeto.x, objeto.y, objeto.x1, objeto.y1);
                                let umbral = 5; // Umbral de tolerancia para el clic

                                if (distancia <= umbral) {
                                    this.reset();
                                    objeto.selected();
                                    this.figuraSeleccionada = objeto;  
                                    document.getElementById('capa'+this.figuras.indexOf(objeto)).classList.add('capa-activa');
                                    break;
                                }
                                
                            }
                            /* TEXTO */
                            else if (objeto.figura === "texto") {
                                let distancia = sketch.dist(sketch.mouseX, sketch.mouseY, objeto.x, objeto.y);
                                let umbral = sketch.textWidth(objeto.palabra);  // Umbral de tolerancia para el clic

                                if (distancia <= umbral) {
                                    this.reset();
                                    objeto.selected();
                                    this.figuraSeleccionada = objeto;  
                                    document.getElementById('capa'+this.figuras.indexOf(objeto)).classList.add('capa-activa');
                                    break;
                                }
                            }
                        }
                } 

                sketch.mousePressed = () => {
                    if (this.tipoFigura==='mover'  && sketch.mouseX>0 && sketch.mouseX<sketch.width && sketch.mouseY>0 && sketch.mouseY<sketch.height) {
                        for(let objeto of this.figuras){
                            if (objeto.select===true) {
                                let figuraActual = this.figuras[this.figuras.indexOf(objeto)];
                                if (objeto.figura!=='texto') {
                                    if (this.primerClick.length === 0) {
                                        this.primerClick = {
                                                    x: sketch.mouseX,
                                                    y: sketch.mouseY,
                                        }
                                    }else if (this.segundoClick.length === 0) {
                                        this.segundoClick = {
                                                    x: sketch.mouseX,
                                                    y: sketch.mouseY,
                                        }
                                        if (objeto.figura === 'círculo') {
                                            figuraActual.actualizarMedidas(this.primerClick.x,this.primerClick.y, this.segundoClick.x, this.segundoClick.y);
                                        }else if (objeto.figura === 'rectángulo') {
                                            figuraActual.actualizarMedidas(this.primerClick.x,this.primerClick.y, this.segundoClick.x - this.primerClick.x, this.segundoClick.y - this.primerClick.y);
                                        }
                                        else if (objeto.figura === 'línea') {
                                            figuraActual.actualizarMedidasLinea(this.primerClick.x,this.primerClick.y, this.segundoClick.x, this.segundoClick.y);
                                        }
                                        
                                        this.primerClick = [];
                                        this.segundoClick = [];
                                    }    
                                }else if (objeto.figura==='texto') {
                                    figuraActual.actualizarTexto(objeto.palabra, sketch.mouseX, sketch.mouseY,objeto.fuente);
                                } 
                                  
                            }
                        }  
                    }
                    if(this.tipoFigura!=="cursor" && this.tipoFigura!=="mover" && this.tipoFigura!=="texto" && sketch.mouseX>0 && sketch.mouseX<sketch.width && sketch.mouseY>0 && sketch.mouseY<sketch.height){
                        if (this.primerClick.length === 0) {
                            this.primerClick = {
                                x: sketch.mouseX,
                                y: sketch.mouseY,
                            }
                        }else if (this.segundoClick.length === 0) {
                            this.segundoClick = {
                                x: sketch.mouseX,
                                y: sketch.mouseY,
                            }

                            this.agregarFigura(this.primerClick.x, this.primerClick.y);
                            if (this.tipoFigura==="línea") {
                                this.figuras[this.figuras.length-1].actualizarMedidasLinea(this.primerClick.x,this.primerClick.y, this.segundoClick.x, this.segundoClick.y);
                            }else if (this.tipoFigura === "rectángulo" ) {
                                this.figuras[this.figuras.length-1].actualizarMedidas(this.primerClick.x,this.primerClick.y, this.segundoClick.x - this.primerClick.x, this.segundoClick.y - this.primerClick.y);
                            }else if (this.tipoFigura === "círculo") {
                                this.figuras[this.figuras.length-1].actualizarMedidas(this.primerClick.x,this.primerClick.y, this.segundoClick.x, this.segundoClick.y);
                            }
                            this.figuraSeleccionada = this.figuras[this.figuras.length-1];
                            
                            this.primerClick = [];
                            this.segundoClick = [];

                        }
                    }else if(this.tipoFigura==="texto" && sketch.mouseX>0 && sketch.mouseX<sketch.width && sketch.mouseY>0 && sketch.mouseY<sketch.height){
                        this.agregarFigura(sketch.mouseX, sketch.mouseY);
                        this.figuraSeleccionada = this.figuras[this.figuras.length-1];
                    }
                    if(this.tipoFigura==="cursor" && sketch.mouseX>0 && sketch.mouseX<sketch.width && sketch.mouseY>0 && sketch.mouseY<sketch.height){
                        sketch.selectFigura();
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
