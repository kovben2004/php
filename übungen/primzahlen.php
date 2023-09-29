<!DOCTYPE html>
<html lang="de">

<head>

<meta chaeset="UTF_8">
<title>Primzahl</title>


</head>
<body>
    <form action="" method="post">
        <p>Primzahl: <input type="text" name="zahl"></p>
        <p>Primzahl= <input type="submit" name="sub" value="Rechnen"></p>

    </form>



<?php

// $i ist die Aktive Zahl, wobei wir in der for-schleife anschauen wollen,
// ob sie eine Primzahl ist.

// $a ist die Zahl, durch die wir $i versuchen zu teilen. ($a % $i == 0)


if (isset($_POST["zahl"])) {
    $zahl = $_POST["zahl"];
    if ($zahl <= 1) {
        echo "Die $zahl Zahl ist keine Primzahl.";
    } else {
        // alle Zahlen durchlaufen
        for ($i = 2; $i <= $zahl; $i++){
            $istPrimzahl = true;
            //schauen ob $a eine Primzahl ist
            for ($a = 2; $a <= sqrt($zahl); $a++){
                if ($i % $a == 0) {
                    $istPrimzahl = false;
                    break;
                }
            }
            if ($istPrimzahl>0) {
                echo "$i" . "<br>";
            }           
        }
    }
/*
    if ($istPrimzahl) {
        echo "Super! $zahl ist eine Primzahl!";
    } else {
        echo "Die $zahl ist keine Primzahl.";
    }
    }
*/
} else {
    echo "Keine Zahl eingegeben." . "<br>";
}



?>
</body>
</html>