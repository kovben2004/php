<?php
require("includes/common.inc.php");

function loescheVZ($vz) {
	$inhalt = scandir($vz);
	foreach($inhalt as $d) {
		if($d!="." && $d!="..") {
			if(is_dir($vz.$d)) {
				//Verzeichnis...
				loescheVZ($vz.$d."/");
			}
			else {
				unlink($vz.$d);
			}
		}
	}
	rmdir($vz); //versucht, das Verzeichnis xy zu löschen
}

function zeigeVZe($vz) {
	echo('<ul>');
	$inhalt = scandir($vz);
	foreach($inhalt as $d) {
		if($d!="." && $d!="..") {
			if(is_dir($vz.$d)) {
				echo('
					<li>' . $d . '
						<button type="button" onclick="merkeVZ(\'' . $vz.$d . '/\');">x</button>
				');
				zeigeVZe($vz.$d."/");
				echo('</li>');
			}
		}
	}
	echo('</ul>');
}

if(count($_POST)>0) {
	ta($_POST);
	ta("lösche das Verzeichnis " . $_POST["VZDel"]);
	loescheVZ($_POST["VZDel"]);
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Verzeichnisstruktur</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
		<script>
			function merkeVZ(zuMerkendesVZ) {
				if(confirm("Wollen Sie dieses Verzeichnis wirklich löschen?")) {
					document.getElementById("VZDel").value = zuMerkendesVZ;
					document.getElementById("frm").submit(); //schickt das Formular mit der id="frm" ab
				}
			}
		</script>
	</head>
	<body>
		<form method="post" id="frm">
			<input type="hidden" name="VZDel" id="VZDel">
		</form>
		<?php zeigeVZe("./"); ?>
	</body>
</html>