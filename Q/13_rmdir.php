<?php
function loescheVZ($vz) {
	echo('
		<ul>
			<li><strong>lese Verzeichnis: ' . $vz . '</strong></li>
	');
	$inhalt = scandir($vz);
	foreach($inhalt as $d) {
		if($d!="." && $d!="..") {
			if(is_dir($vz.$d)) {
				//Verzeichnis...
				echo('<li>Verzeichnis gefunden: ' . $vz . $d . '<ul>');
				loescheVZ($vz.$d."/");
				echo('</ul></li>');
			}
			else {
				echo('<li>Datei/Verlinkung gefunden: ' . $vz . $d . '</li>');
				unlink($vz.$d);
			}
		}
	}
	echo('<li>lösche Verzeichnis: ' . $vz);
	rmdir($vz); //versucht, das Verzeichnis xy zu löschen
	echo('</ul>');
}

loescheVZ("xy/");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Verzeichnisstruktur</title>
		<meta charset="utf-8">
	</head>
	<body>
	</body>
</html>