class Pila {
    constructor(){
        this.pila = [];
    }

    push(objeto){
        this.pila.push(objeto);
        return this.pila;
    }
    pop(){
        return this.pila.pop;
    }
    first(){
        return this.pila[this.pila.length - 1];
    }
    size(){
        return this.pila.length;
    }
    
    draw(){
        for(let figura of this.pila){
            figura.draw();
            
        }
    }

}