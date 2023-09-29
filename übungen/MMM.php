<?php


$stunden =2;
$minuten =45;
$sekunden =12;

function fSek_Plus($add){
    global $stunden,$minuten,$sekunden;
    $sekunden=$sekunden+$add; //$sek wird erhöht um $add
    while($sekunden >60){
        $minuten++;
        $sekunden=$sekunden -60;
    }  
    if ($sekunden <10){
        $sekunden="0$sekunden";

    }

    while($minuten >60){
        $stunden++;
        $minuten=$minuten-60;


    }
    if ($minuten <10){
        $minuten="0$minuten";

    }

    $zeit= "$stunden: $minuten:$sekunden:";
    return $zeit;
    


    
}







?>