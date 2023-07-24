<?php
/* zwei Arten von ODER:
   - ||: $c = $a || $b; es wird der Inhalt von $a ermittelt. Sollte dieser bereits true sein, so wird der Inhalt von $b gar nicht mehr betrachtet, da das Ergebnis - unabhängig von $b - bereits true ist
   - or: $c = $a or $b; es wird zunächst der Inhalt beider Variablen ermittelt (unabhängig davon, ob $a bereits true ist oder nicht) und dann wird entschieden, was das Ergebnis ist
*/


require("includes/config.inc.php");
require("includes/common.inc.php");

// Schritt 1: Verbindung zum DB-Server herstellen und DB auswählen
require("includes/conn.inc.php");

// Schritt 2: SQL-Statement in Textform formulieren --> Textvariable!
$sql = "
	SELECT * FROM tbl_user
";

// Schritte 3 und 4: SQL-Statement an den DB-Server schicken und Antwort entgegennehmen
$ergebnis = $conn->query($sql);
//$ergebnis = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql); //schickt das SQL-Statement an den DB-Server und speichert das von ihm zurückgelieferte Ergebnis in einem "Ergebnis-Objekt" (hier: $ergebnis) ab
ta($ergebnis);

// Schritt 5: entgegengenommene Daten verarbeiten (je nach SQL-Statement unterschiedlich)
if($ergebnis!==false) {
	while($daten = $ergebnis->fetch_object()) {
		echo('<p>IDUser=' . $daten->IDUser . ', Emailadresse=' . $daten->Emailadresse . '</p>');
	}
}

?>
<!doctype html>
<html lang="de">
	<head>
		<title>Datenbank</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
	</head>
	<body>
		<p>Hallo Welt!</p>
	</body>
</html>