 <!-- <?php

function fDays($tag,$color="violet"){
    echo "<h1 style= 'background:$color'>$tag</h1>";
    
}



function fMinus($zahl1, $zahl2){

    $ergebniss= $zahl1-$zahl2;

    return $ergebniss; 
    
    
}

$result= fMinus (15, 10);
var_dump ($result);


function Fgreet($name){

 echo ("<p>Hallo , $name<button>X</button></p>");

}

$array_namen = ["Mortaza", "Uwe", "Uwe's Frau", "Christina"];
foreach($array_namen as $i){
    Fgreet($i);
}

fDays("Montag","red");
fDays("Dienstag","green");
fDays("Mittwoch");
fDays("Donnerstag", "brown");
fDays("Freitag","yellow");
fDays("Samstag");


$array1 = ["mazda", "volvo", "toyota", "lamborghini"];
#echo($array1);

print_r($array1);
?>  -->

<!-- 
<?php
//
 
function fIs_tooYoung($name,$age){
    if($age>=18 ){
      echo "Willkommen $name!";

      
    }
    else {
     echo   "Geh Weg $name!";
    }
}

fIs_tooYoung("Paul",19);
fIs_tooYoung("Bene",18);
fIs_tooYoung("Mortaza",16);
fIs_tooYoung("Erina",16);



?> -->

<?php
// fWelcheNote() -- punkte übergeben -- 100 punkte 

function fWelcheNote($name,$Punkte){

    switch ($Punkte){
        case 1:
            echo "$name sehr gut";
            break;
        case 2:
            echo "$name gut";
            break;
        case 3:
            echo "$name befriedigend";
            break;
        default:
            echo "falsche Note";
            break;
    }
    echo "<br>";


}

fWelcheNote("Ben",1);
fWelcheNote("Tobias",3);
fWelcheNote("John",2);
fWelcheNote("Alina",5);
fWelcheNote("Martin",4);



?>