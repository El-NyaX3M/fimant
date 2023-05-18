

function setup(){
    canvas = createCanvas(windowWidth, windowHeight);
    canvas.mouseClicked(agregarFigura);
    pila = new Pila();
    figura = 'cursor';
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
    console.log('click')
}

function keyTyped(){
    
    switch(key){
        case 'x':
            figura = 'rectángulo';
            
            break;
        
        case 'z':
            figura = 'cursor';
    }
    console.log(figura);
    return false;
}