class Figura{
    constructor(x, y, figura){
        this.w = 50;
        this.h = 50;
        switch (figura){
            case 'rectángulo':
                this.x = x - this.w/2;
                this.y = y - this.h/2;
                break;
            case 'círculo':
                this.x = x - this.w/2;
                this.y = y - this.h/2;
                this.x1 = x;
                this.y1 = y;
        }
        
        this.bgColor = {
            red: 200,
            green: 200,
            blue: 200, 
            alpha: 0.8
        }
        this.lineColor = {
            red: 0,
            green: 0,
            blue: 0,
            weight: 1
        }
        this.select = false;
        this.border = true;
        this.bg = true;
        this.figura = figura;
        
    }

    draw(){
        if(this.border){
            strokeWeight(this.lineColor.weight);
            stroke(this.lineColor.red, this.lineColor.green, this.lineColor.blue);
        } 
        else noStroke();
        
        (this.bg) ? fill('rgba('+this.bgColor.red+', '+this.bgColor.green+', '+this.bgColor.blue+', '+this.bgColor.alpha+')') : noFill();    
        
        
        switch(this.figura){
            case 'rectángulo':
                rect(this.x, this.y, this.w, this.h);
                //console.log('hola wapo');
                break;
            case 'círculo':
                ellipse(this.x1, this.y1, this.w, this.h);
        }
        
        if(this.select){
            strokeWeight(1);
            noFill();
            stroke(255, 25, 25);
            rect(this.x - 15, this.y - 15, this. w + this.lineColor.weight + 15, this.h + this.lineColor.weight + 15);
        }
        
    }

    selected(){
        this.select = true;
    }
    diselect(){
        this.select = false;
    }
    move(){
        this.x = mouseX;
        this.y = mouseY;
        this.draw();
    }
}

