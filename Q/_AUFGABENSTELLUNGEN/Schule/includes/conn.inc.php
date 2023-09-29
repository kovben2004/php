<?php
$conn = new MySQLi(DB["host"],DB["user"],DB["pwd"],DB["name"]);
if($conn->connect_errno>0) {
	if(TESTMODE==1) {
		die("Fehler im Verbindungsaufbau: " . $conn->connect_error);
	}
	else {
		header("errors/db_connect.html");
	}
}
$conn->set_charset("UTF8");
?>