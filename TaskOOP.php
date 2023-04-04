<?php

/* membuat class 'bangun datar' terdapat (lingkaran, persegi dan persegi panjang)

*function
1. area             : compute 'area of figure' 
2. circumference    : compute ' circum of figure' 
3. enlarge(float scale): compute  enlarge with scale 
4. shrink(float scale): compute shrinked with scale  

*attributes
1. circle   = radius
2. square   = side
3. rectangle= length & width

buat class descriptor dengan fungsi
describe ($figure) untuk menampilkan text
"Bangun datar ini adalah (Lingkaran/Persegi/Persegi Panjang) yang memiliki luas ($luas) dan keliling($circumference)"
*/

class BangunDatar{

    public function __construct(float $a=0, float $b=0){
        $this -> b=$b;
        $this -> a=$a;
     }  
     public function enlarge(float $scale){
         $this->b*=$scale;
         $this->a*=$scale;
     }
     public function shrink(float $scale){
         $this->b/=$scale;
         $this->b*=$scale;
     }  
}
class Circle extends BangunDatar{
    
    public string $nameOfObject = "Lingkaran";

    public function area(){
        $result=3.14*$this->a**2;
        return $result;
    }
    public function circumference(){
        $result = 3.14*($this->a*2);
        return $result;
    }
    public function getJarijari(){
        echo $this->a;
    }
    
}
class Square extends BangunDatar{
    public string $nameOfObject = "Persegi";

    function area(){
        $result=$this->a**2;
        return $result;
    }
    function circumference(){
        $result=$this->a*4;
        return $result;
    } 
    public function getSisi(){
        echo $this->a;
    }
}

class Rectangle extends BangunDatar{

    public string $nameOfObject = "Persegi Panjang";
    public function area(){
        $result = $this->a*$this->b;
        return $result;
    }
    public function circumference(){
        $result =  ($this->a+$this->b)*2;
        return $result;
    }
    public function getPanjang(){
        echo $this->a;
    }
    public function getLebar(){
        echo $this->b;
    }
        
}


class descriptor {
    public function __construct(object $nameOfObject){
        $this->nameOfObject=$nameOfObject;
        $this->describe();
    }
    public function describe(){
    echo "Bangun datar ini adalah " .$this->nameOfObject->nameOfObject. " yang memiliki luas " .$this->nameOfObject->area(). " dan keliling ".$this->nameOfObject->circumference(). "\n";
    }
}

new descriptor(new Circle(2));
new descriptor(new Square(2));
new descriptor(New Rectangle(2,1));