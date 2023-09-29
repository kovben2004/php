 <?php
// // $obst= ["Gurke", "Birne", "Organge", "Melone", "Kiwi", "Erdbeer", "Maracuja"];
// // $i = 0;
// // $array_länge = count($obst);
// // echo $array_länge;
// // while($i<=$array_länge-1){
// //     echo $obst[$i];
// //     echo " \$i=$i <br>";
// //     $i+=1;
// // }



// //print_r ($obst);

// // // foreach($obst as $i){
// // //     echo $i;

// // }


// $einkaufliste = ["obst", "gemüse", "salad","öl", "käse"];
// $i=0;
// $array_länge = count($einkaufliste);
// echo $array_länge;
// while ($i<=$array_länge-1){
//     echo $einkaufliste[$i]."<br>";
//     #echo "\$i=$i";
//     $i++;
// }








// $i= 0;
// $zahl=25;

//  while($i <= $zahl){

//      echo $i++ ."<br>";
//  }








 
//   $y=10;
//   $x= -50;
//   while ( $y >= $x) {
//     if ($y == -20){
//         echo "<b>";
//     }
//     echo $y. "<br>".
//        "</b>";
    
//     $y-=3;
   
   
//   }
// #echo $y;
// echo "fertig";




// $a= -22;
// $b= 55;

// while ($a<=$b){
//     echo $a ."<br>";
//     $a+=4;


// }
 




// $w=67;
// $e=-28;

// while ($w>=$e){
//     echo $w."<br>";
//     $w - 10;
    
// }




// $a=50;
// $b=82;
// $zähler=0;


// while ($a <= $b) {
//     echo  "Der Anzahl der Schleife Durchgänge ist: $zähler =>";
//     echo $a ."<br>";
//     $a +=4;
//     $zähler +=1;
    
// }


// 25 schüler, schülernummer 1-25
// schüler 1 hat Sehr Gut
// fNoteFürSchüler() - 2 Argumente/Parameter: schülernummer Punkte 0-100
// 


function fNote($Schüler, $Punkte){
    if($Punkte >= 85){
        echo  " Dieser Schüler ist sehr gut!";
       
    }
    elseif($Punkte >=70 && $Punkte <=84){
        echo  " Dieser Schüler ist gut!";
    }

    elseif($Punkte >=60 && $Punkte <=69){
        echo  " Dieser Schüler Befridiegen!";
    }
    else {
        echo "Du wirst nächtes Mal schaffen keine Sorge!";
    }
    echo  "Schüler $Schüler<br>" ;
   }


$min=45;
$max=100;


// $a=-220;
// $b=550;

// while($a<$b){
//     echo $a . "<br>";
//     $a+=15;
    
// }

// $v=150;
// $n=15;
// while($v>$n){
//     echo $n . "<br>";
//     $n+=100;
    
// }

$Schüler =1;
$SchülerMax= 25;
$is_bold = true;
/*
while($Schüler<=$SchülerMax){
    $is_bold = !$is_bold; //is_bold=false;  

    $zufällige_Punktezahl = rand($min, $max);
    if ($is_bold == false){
        
        echo "<b>$Schüler</b>";
    

    } else {
        echo "$Schüler";
    }

    echo " $zufällige_Punktezahl"."<br>";
    
    fNote($Schüler, $zufällige_Punktezahl);
    $Schüler ++;
}


    $b=1000;
    echo "<ol start=0>";
    while ($b<=1500000){

        echo "<li>" . "\ \ \   $b" . "</li>";
        $b=$b*2;
    }
    echo "</ol>";

*/

/*
echo fNote(1,99);
echo fNote(2,80);
echo fNote(3,55);
echo fNote(4,66);
echo fNote(5,77);
echo fNote(6,85);
echo fNote(7,26);
echo fNote(8,78);
echo fNote(9,80);
echo fNote(10,98);
echo fNote(11,90);
echo fNote(12,80);
echo fNote(13,46);
echo fNote(14,68);
echo fNote(15,75);
echo fNote(16,45);
echo fNote(17,89);
echo fNote(18,55);
echo fNote(19,67);
echo fNote(20,89);
echo fNote(21,78);
echo fNote(22,45);
echo fNote(23,69);
echo fNote(24,91);
echo fNote(25,72);
*/



// $a=false;
// $a=!$a;

// $i=0;
// while ($i<10){
//     $a=!$a; // if false then true; if true then false
//     echo "$a" . "<br>";
//     $i++;
// }

$Zahl= ["1a", "1b", "1c"];

$namen= array( 'Anna', 'John');

print_r ($namen) . "<br>";
echo "<br>";

$obst= ["Banane", "Apfel", "Kiwi"];

print_r ($obst);

foreach ($Zahl as $key) {
    echo "$key " . ". " ;


  
}








?>