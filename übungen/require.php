<?php
require "MMM.php";
echo fSek_plus(1200000);

echo "<br><br>";
echo "---programm 2:---";
echo "<br><br>";

require "getters-setters.php";
echo getName();
setName("Paul");
echo getName();
setName("Karin");
echo getName();



?>

