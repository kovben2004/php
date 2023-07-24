<?php
require("includes/common.inc.php");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Scandir</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
		<style>
		.dir {
			font-weight:bold;
		}
		.file {
			font-weight:normal;
			font-style:italic;
		}
		.link {
			color:green;
		}
		</style>
	</head>
	<body>
	
		<?php
		$vz = "./"; //Hilfsvariable
		$inhalt = scandir($vz); //Pfad zum auszulesenden Verzeichnis, ausgehend von derjenigen Datei, in der sich der Befehl scandir befindet. Das Ergebnis ist ein Array befüllt mit Datei-, Verzeichnis- und Verknüpfungsnamen aller darin befindlichen Elemente
		
		ta($inhalt);
		
		echo('<ul>');
		foreach($inhalt as $d) {
			if($d!="." && $d!="..") {
				if(is_dir($vz . $d)) {
					echo('<li class="dir">' . $d . '</li>');
				}
				else {
					if(is_file($vz . $d)) {
						echo('<li class="file">' . $d . '</li>');
					}
					else {
						echo('<li class="link">' . $d . '</li>');
					}
				}
				
				/*
				switch(true) {
					case is_dir($vz . $d):
						echo('<li class="dir">' . $d . '</li>');
						break;
						
					case is_file($vz . $d):
						echo('<li class="file">' . $d . '</li>');
						break;
						
					case is_link($vz . $d):
						echo('<li class="link">' . $d . '</li>');
						break;
				}
				*/
			}
		}
		echo('</ul>');
		?>
		
	</body>
</html>