<!doctype html>
<html lang="de">
	<head>
		<title>Grundlagen der Programmierung: Variablen</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
		/* Variablen:
		   - implizite Typdeklaration: die Variable erfährt ihren Typen erst bei Wertzuweisung
		   - schwache Typisierung: die Variable darf ihren Typen ändern
		*/

		$a = 23; // der Wert 23 wird der Variable a zugewiesen; die Variable a wird somit zu einer numerischen Variable, sprich, der Typ der Variable ist numerisch
		$b = 17; // der Wert 17 wird der Variable b zugewiesen
		
		$c = "Uwe"; //String-Variable (da textueller Inhalt)
		$d = 'Uwe'; //String-Variable
		
		$e = true; //Boolsche Variable; Wert true
		$f = false; //Boolsche Variable; Wert false
		
		$a = "Test"; //Änderung im Typen: zuvor war die Variable vom Typ Numerisch, nun ist sie vom Typ String
		
		/* Konstanten:
	       - können ihren Wert nicht ändern
		   - die Namen der Konstanten werden idR. in Großbuchstaben geschrieben
		*/
		define("ABSNULLPUNKT",-271.16); //der Konstante ABSNULLPUNKT wird der Wert -273.16 zugewiesen; dieser Wert ist unveränderlich
		?>
	</body>
</html>