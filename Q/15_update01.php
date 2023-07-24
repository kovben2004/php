<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");

$sql = "
	UPDATE tbl_user SET
		Vorname='Uwe',
		Nachname='Müller'
	WHERE(
		IDUser=16 OR
		IDUser=23
	)
";
$conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
$betroffen = $conn->affected_rows;
ta("betroffen waren: " . $betroffen . " Datensätze");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>UPDATE</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/common.css">
	</head>
	<body>
	</body>
</html>