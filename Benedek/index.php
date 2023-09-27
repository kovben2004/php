<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
?>

<!doctype html>
<html lang="de">
    
	<head>
		<title>Willkommen</title>
        <meta charset="utf-8">
		<style>
		.ta {
			background-color:#ffc;
			border:1px solid orange;
			border-left-width:5px;
			padding:0.2em 1em;
			margin:1em 0px;
			font-family:"Courier New", monospace;
			font-size:0.9rem;
		}
		</style>
	</head>
	<body>
        <nav>
            <a href="login.php">Login/Registrierung</a>
            <a href="Reisen.php">Reisen</a>
            <a href="Bewertungen.php">Bewertungen</a>
        </nav>
		<h1>Willkommen. Bitte wählen Sie die Zielwebsite aus.</h1> 
	</body>
</html>