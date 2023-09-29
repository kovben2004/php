<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Räume</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="klasseninfos.php">Klasseninformationen</a></li>
				<li><a href="schueler.php">Schüler</a></li>
				<li><a href="raeume.php">Räume</a></li>
			</ul>
		</nav>
		<h1>Raumliste</h1>
		<?php
		echo('<ul>');
		
		$sql = "
			SELECT
				tbl_raeume.Bezeichnung AS bezRaum,
				tbl_klassen.Bezeichnung AS bezKlasse
			FROM tbl_raeume
			LEFT JOIN tbl_klassen ON tbl_klassen.FIDRaum=tbl_raeume.IDRaum
			ORDER BY tbl_raeume.Bezeichnung ASC
		";
		$raeume = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
		while($raum = $raeume->fetch_object()) {
			echo('
				<li>' . $raum->bezRaum . ': ' . $raum->bezKlasse . '</li>
			');
		}
		
		echo('</ul>');
		?>
	</body>
</html>