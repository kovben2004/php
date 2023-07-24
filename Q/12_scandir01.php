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
		$inhalt = scandir("pdf/"); //Pfad zum auszulesenden Verzeichnis, ausgehend von derjenigen Datei, in der sich der Befehl scandir befindet. Das Ergebnis ist ein Array befüllt mit Datei-, Verzeichnis- und Verknüpfungsnamen aller darin befindlichen Elemente
		
		ta($inhalt);
		
		echo('<ul>');
		foreach($inhalt as $d) {
			if($d!="." && $d!="..") {
				if(is_dir("pdf/" . $d)) {
					echo('<li class="dir">' . $d . '</li>');
				}
				else {
					if(is_file("pdf/" . $d)) {
						echo('<li class="file">' . $d . '</li>');
					}
					else {
						echo('<li class="link">' . $d . '</li>');
					}
				}
				
				/*
				switch(true) {
					case is_dir("pdf/" . $d):
						echo('<li class="dir">' . $d . '</li>');
						break;
						
					case is_file("pdf/" . $d):
						echo('<li class="file">' . $d . '</li>');
						break;
						
					case is_link("pdf/" . $d):
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