

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
    
    pila.draw();
}

function agregarFigura(){
    if(figura != 'cursor'){
        pila.push(new Figura(mouseX, mouseY, figura))
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