<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");

$sql = "
	INSERT INTO tbl_user
		(Emailadresse, Passwort, Nachname, Vorname, GebDatum)
	VALUES 
		('test10@test.at','test123','Maierhuberhofer','Edwin','1988-09-14'),
		('test11@test.at','test123','Maierhuberhofer','Edwin','1988-09-14')
";
$conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
?>
<!doctype html>
<html lang="de">
	<head>
		<title>INSERT</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/common.css">
	</head>
	<body>
	</body>
</html>