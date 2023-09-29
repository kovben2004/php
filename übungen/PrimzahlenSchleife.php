
<!DOCTYPE html>
<html lang="de">

<head>

<meta chaeset="UTF_8">
<title>Primzahl</title>


</head>
<body>
    <form action="" method="post">
        <p>Primzahl: <input type="text" name="zv"></p>
        <p>Primzahl= <input type="submit" name="sub" value="Rechnen"></p>

    </form>



<?php

if (isset($_POST["zv"])) {
    $zv = $_POST["zv"];

    
    $AllePrimzahlen = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37 ];
    foreach ($AllePrimzahlen as $AktivesElement){
        if($zv>$AktivesElement){
            echo "$AktivesElement". "<br>";
    
        }
    }

} else {
    echo "Keine Zahl eingegeben." . "<br>";
}

?>
</body>
</html>




