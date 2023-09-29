<?php
require("classes/beispielklasse.cls.php");
$bsp0 = new beispielklasse("Uwe","Schwarz"); //Objekt/Instanz der Klasse beispielklasse
$bsp1 = new beispielklasse("Silvia","Blau",23);

$lz = $bsp1->zeigeLZ(); //Aufruf einer Methode der Klasse beispielklasse, angewandt in der Instanz $bsp1
echo('Die Lieblingszahl war ' . $lz . '<br>');
//$lz_out = $bsp1->lz;
//echo('lz_out=' . $lz_out . '<br>');
//nicht mehr erlaubt: $bsp1->lz = 99;
$bsp1->setzeLZ(99);
$bsp1->zeigeLZ();

zeigeLZ();
?>
<!doctype html>
<html lang="de">
	<head>
		<title>OOP</title>
		<meta charset="utf-8">
	</head>
	<body>
	
	</body>
</html>