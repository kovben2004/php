<!DOCTYPE html>
<html lang="de">

<head>

<meta chaeset="UTF_8">
<title>Primzahl</title>

</head>
<body>
    <form action="" method="post">
        <p>Dein Wort: <input type="text" name="wort"></p>
        <p>Groß Buchstaben:<input type="submit" name="sub" value="Suchen"></p>

    </form>



<?php


if (isset($_POST["wort"])) {
    $wort = $_POST["wort"];
    //echo "$zahl";
    // eingabe: Hallo, mein Name ist John Cena!
    // echo: H N J C

    // schleife: Buchstaben einzeln extrahieren
    // array: A B C D E

//     $str = "apple Pen, pinapple pen";
 
//     $length = strlen($str);
//     for ($index = 0; $index < $length; $index++) {
//         $AktiveBuchstabe = $str[$index];
//         echo "<br>";
// }

// }
// else {
//     echo "Keine Zahl eingegeben." . "<br>";


$Buchstaben= ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];

    $length = strlen($wort);
    for($index = 0; $index <$length; $index++)
    {
        $AktiveBuchstabe = $wort[$index];
        echo ("$AktiveBuchstabe" . "<br>");
        foreach ($Buchstaben as $key) {
            if ($AktiveBuchstabe == $key){
                echo "$key";
            }
       }
    }

}












?>
</body>
</html>