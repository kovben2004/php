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
<form method="post">
    <p>Test:<input type="text" name="testname" id="testid"></p>
    <p><input type="submit" name="submit" id="sub" value="Senden"></p>
</form>
<?php

// wenn durch 3 teilbar dann "fizz", wenn durch 5 teilbar dann "buzz", wenn durch 3 UND 5, dann "fizzbuzz"


if (isset($_POST["testname"])){
    echo $_POST["testname"] . "<br>"; 
    $EingabeZahl = $_POST["testname"];
    
   
  
    if ($EingabeZahl % 5 == 0 && $EingabeZahl %3 == 0 ){
        echo "FizzBuzz <br>";
    }
    else if ( $EingabeZahl %3 == 0 ){
        echo "Fizz<br>";
    }
    else if ( $EingabeZahl %5 == 0 ){
        echo "Buzz  <br>";  
    }
   
    else {
        echo "Dein Zahl ist nicht richtig <br>";
    }
}





?>
</body>

