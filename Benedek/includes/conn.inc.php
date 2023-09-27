<?php
$conn = new MySQLi(DB["host"],DB["user"],DB["pwd"],DB["name"]); //versucht, eine Verbindung zum (entfernten) DB-Server herzustellen und dort die gewünschte Datenbank auszuwählen
if($conn->connect_errno>0) {
	//Verbindung konnte nicht hergestellt werden
	//Weiterleitung auf ein Fehlerdokument in der Realphase: header("Location: errors/db_connect.html");
	die("Fehler im Verbindungsaufbau: " . $conn->connect_error); //Fehlerdarstellung in der Entwicklungsphase, NICHT in der Realphase
}
$conn->set_charset("UTF8"); //legt den Zeichensatz für die Kommunikation zw. Web- und DB-Server fest
?>