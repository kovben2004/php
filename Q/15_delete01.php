<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");

$sql = "
	DELETE FROM tbl_user
	WHERE(
		Vorname='Edwin' OR
		Vorname='Susanne'
	)
";
$conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
$betroffen = $conn->affected_rows;
ta("betroffen waren: " . $betroffen . " Datensätze");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>DELETE</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/common.css">
	</head>
	<body>
	</body>
</html>