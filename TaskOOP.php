<?php

/* membuat class 'bangun datar' terdapat (lingkaran, persegi dan persegi panjang)

*function
1. area             : compute & show 'area of figure' 
2. circumference    : compute & show ' circum of figure' 
3. enlarge(float scale): compute & show enlarge with scale 
4. shrink(float scale): compute & show shrinked with scale  

*attributes
1. circle   = radius
2. square   = side
3. rectangle= length & width

buat class descriptor dengan fungsi
describe ($figure) untuk menampilkan text
"Bangun datar ini adalah (Lingkaran/Persegi/Persegi Panjang) yang memiliki luas ($luas) dan keliling($circumference)"
*/
class Circle{
    
    public function __construct(float $radius){
       $this -> radius=$radius;
    } 
    private float $radius;
    public string $object = "Lingkaran";

    public function enlarge(float $scale){
        $this->radius*=$scale;
    }
    public function shrink(float $scale){
        $this->radius/=$scale;
    }
    public function area(){
        return 3.14*$this->radius*$this->radius;
    }
    public function circumference(){
        return 3.14*($this->radius*2);
    }
    
}
class Square{
    
    public function __construct(float $side){
       $this -> side=$side;
    } 
    private float $side;
    public string $object = "Persegi";

    public function enlarge(float $scale){
        $this->side*=$scale;
    }
    public function shrink(float $scale){
        $this->side/=$scale;
    }
    public function area(){
        return $this->side**2;
    }
    public function circumference(){
        return $this->side*4;
    }
    
}

class Rectangle{
    
    public function __construct(float $length, float $width){
       $this -> length=$length;
       $this -> width=$width;
    } 
    public string $object = "Persegi Panjang";
    private float $length;
    private float $width;

    public function enlarge(float $scale){
        $this->length*=$scale;
        $this->width*=$scale;
    }
    public function shrink(float $scale){
        $this->length/=$scale;
        $this->width/=$scale;

    }
    public function area(){
        return $this->length*$this->width;
    }
    public function circumference(){
        return ($this->length+$this->width)*2;
    }    
}

class descriptor {
    private object $object;
    public function __construct(object $object){
        $this->object=$object;
        $this->describe();
    }
    public function describe(){
    echo "Bangun datar ini adalah " .$this->object->object. " yang memiliki luas " .$this->object->area(). " dan keliling ".$this->object->circumference(). "\n";
    }
    
    public function __destruct(){
        
    }
}

new descriptor(new Circle(7));
new descriptor(new Square(8));
new descriptor(New Rectangle(4,8));
