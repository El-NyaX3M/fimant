

function setup() {
    var canvasDiv = document.getElementById('contenedor');
    var width = canvasDiv.offsetWidth;
    canvas = createCanvas(width, windowHeight);
    canvas.mouseClicked(agregarFigura);
    canvas.parent('contenedor');
    pila = new Pila();
    figura = 'cursor';
    shapeModif = 'none';
}

function draw(){
    background(255);
    previsual();
    pila.draw();
}

function agregarFigura(){
    if(figura != 'cursor'){
        pila.push(new Figura(mouseX, mouseY, figura))
        //figura = 'cursor';
        console.log(mouseX+", "+mouseY);
        console.log(pila);
    }
    else{
        selectFigura();
    }
    console.log('click')
}

function selectFigura(){
    for(let objeto of pila.getItems()){
        if(mouseX >= objeto.x && mouseX <= objeto.x + objeto.w && mouseY >= objeto.y && mouseY <= objeto.y + objeto.h){
            objeto.diselect();
        }
        else{
            objeto.diselect();
            shapeModif = 'none';
        }
    }
    for(let objeto of pila.getItems()){
        if(mouseX >= objeto.x && mouseX <= objeto.x + objeto.w && mouseY >= objeto.y && mouseY <= objeto.y + objeto.h){
            objeto.selected();
            shapeModif = objeto;
            console.log(objeto);
            break;
        }
        console.log(objeto);
    }
    
}

function previsual(){
    stroke(1);
    fill('rgba(200, 200, 200, 0.2)');
    switch(figura){
        case 'rectángulo':
            rect(mouseX-25, mouseY-25, 50, 50);
            break;
        case 'círculo':
            ellipse(mouseX, mouseY, 50, 50);
            break;
    }
}
function keyTyped(){
    
    switch(key){
        case 'x':
            figura = 'rectángulo';
            
            break;
        case 'c':
            figura = 'círculo';
            break;
        case 'z':
            figura = 'cursor';
            break;
    }
    console.log(figura);
    return false;
}
function setFigura(shape){
    figura = shape;
}