<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("classes/person.cls.php");
require("classes/teilnehmer.cls.php");

$uwe = new person("Uwe","Mutz",17,"Schwarz");
$silvia = new teilnehmer("Silvia","Mutz",2,12434);
$n = $silvia->name_get();
ta($n);
$nr = $silvia->tnnr_get();
ta($nr);
$n2 = $silvia->name_tag_get();
ta($n2);

?>
<!doctype html>
<html lang="de">
	<head>
		<title>OOP</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
	</head>
	<body>
	
	</body>
</html>