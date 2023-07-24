<?php
function f0() {
	//Funktion ohne Übergabevariablen und ohne Rückgabewert
	$a = 23;
	$b = 17;
	$c = $a + $b;
	echo("c=" . $c);
}

function f1($a,$b) {
	//Funktion mit zwei Übergabevariablen ($a, $b), ohne Rückgabewert
	$c = $a + $b;
	echo("c=" . $c);
}

function f2() {
	//Funktion ohne Übergabevariablen, aber mit Rückgabewert
	$a = 23;
	$b = 17;
	$c = $a + $b;
	return $c;
}

function f3(float $a, float $b=0):float {
	//Funktion mit Übergabevariablen und Rückgabewert
	$c = $a + $b;
	return $c;
}

function f4(int $a, int|bool $b, float $c=2.55, ?bool $d):void {
	
}

function f5(int $a, int $b):int {
	
}

f0(); //Aufruf der Funktion f0
f1(17,23); //Aufruf der Funktion f1 mit den Übergabewerten (Parametern) 17 und 23
$erg0 = f2(); //Aufruf der Funktion f2, die einen Rückgabewert liefert
echo("erg0=" . $erg0);
$erg1 = f3(17.53,24.15);
echo("erg1=" . $erg1);

$erg2 = f3(31);
echo("erg2=" . $erg2);

f3("abc",23);
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Grundlagen der Programmierung: Funktionen</title>
		<meta charset="utf-8">
	</head>
	<body>
		<p>Hallo Welt!</p>
	</body>
</html>