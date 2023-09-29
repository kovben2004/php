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


if (isset($_POST["zahl"])) {
    $zahl = $_POST["zahl"];

    if ($zahl <= 1) {
        echo "Die $zahl Zahl ist keine Primzahl.";
    } else {
        $istPrimzahl = true;

        for ($i = 2; $i <= sqrt($zahl); $i++){
            if ($zahl % $i == 0) {
                $istPrimzahl = false;
                break;
            }
        }

        if ($istPrimzahl) {
            echo "Super! $zahl ist eine Primzahl!";
        } else {
            echo "Die $zahl ist keine Primzahl.";
        }
    }
} else {
    echo "Keine Zahl eingegeben." . "<br>";
}

?>
</body>
</html>