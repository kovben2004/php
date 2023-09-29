<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>lern.php</title>
        <style>

.ta {
  background-color: yellow;
}
        </style>
    </head>
<body>

<div>
    <form method="post">
        <p>Test:<input type="text" name="testname" id="testid"></p>
        <p>Password:<input type="password" name="testpassword" id="asdf"></p>
        <p><input type="submit" name="submit" id="sub" value="Senden"></p>

    
    </form>
    </div>
<?php
/*
function fta($eingabe){
    echo $eingabe;
    $a = ($eingabe);
    $imploded = implode($a);
    echo "<pre><p class='ta'>$a</p>";
    echo "</pre>";
}


// fta($_POST);
// fta("hallo");
$i = 0;
while ($i<200){
    fta("$_POST");
    $i++;
}
*/  
/*
$arrayTiere = ["Hund ", "Katze ", "Elephant "];

$imploded = implode($arrayTiere);
$exploded = explode(" ",$imploded);
echo "<pre>";
var_dump ($imploded);
var_dump ($exploded);
echo "</pre>";
*/
/*
$arrayAuswahl = ["Vorname", "Nachname", "Lieblingsfarbe"];
echo implode(" AND ", $arrayAuswahl);
*/
if (isset($_POST["testname"])){
    $Username = $_POST["testname"];
    echo $Username . "<br>";
}
if (isset($_POST["testpassword"])){
    echo $_POST["testpassword"];
}


    ?>
</body>
</html>