<?php
class buildCar{
    function __construct($model, $color) {
        $this->model = $model;
        $this->color = $color;
     }

    function hupen(){
        echo "Dein $model mit Farbe $color hupt gerade! <br>";
    }
}
$BenedekAuto = new buildCar("Lamborghini", "Gelb");
$MortazaAuto = new buildCar("Maybach", "Schwarz");

$BenedekAuto->hupen();
$MortazaAuto->hupen();
?>