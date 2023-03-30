<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoalKe_1 extends Controller
{
/* Cetaklah angka baris demi baris dari 1 hingga 100.

1. Untuk angka kelipatan 3 memanggil function luas lingkaran dengan jari-jari dari angka tersebut dibagi 3 dan mencetak hasil luasnya.

2. Untuk kelipatan 5 memanggil function keliling lingkaran dengan jari-jari dari angka tersebut dibagi 5 dan mencetak hasil kelilingnya,

3. apabila angka tersebut kelipatan 3 dan 5 maka memanggil function luas persegi dengan panjang angka tersebut dibagi 3 dan lebar angka tersebut dibagi 5.
Semua angka menggunakan 2 angka dibelakang koma. Note: nilai pi = 3.14
 */

 public function square(float $param){
    //p=parameter/3
    $long=$param/3;
    //l=parameter/5
    $wide=$param/5;
    return $long*$wide;
}
public function circleArea(float $param){
    //r=parameter/3
    $radius=$param/3;
    //luas lingkaran = pi*r^2
    return 3.14*$radius*$radius;
}
public function circleAround(float $param){
    //r=parameter/5
    $radius=$param/5;
    //keliling lingkaran=pi*diameter
    $diameter=$radius*2;
    return 3.14*$diameter;
}



    public function index(){

         for($i=1;$i<=100;$i++){

            if($i%3 == 0 && $i%5==0 ){
                $value=$this->square($i);
                $string=' Luas persegi = ';
            }else if($i%3 == 0){
                $value =$this-> circleArea($i);
                $string=' Luas Lingkaran = ';
            }else if($i%5==0){
                $value=$this->circleAround($i);
                $string=' Keliling Lingkaran = ';
            }else{
                $value=0;
            }
            echo ''.$i.'.<br>';
            if($value==0){

            }else{
            $value=round($value,2);
            echo ''.$string. ''.$value. '<br>';}
        }
    }

}
