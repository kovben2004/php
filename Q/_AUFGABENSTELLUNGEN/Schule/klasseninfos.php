<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Klasseninformationen</title>
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
		<h1>Klasseninformationen</h1>
		<?php
		echo('<ul>');
		
		$sql = "
			SELECT
				tbl_klassen.IDKlasse,
				tbl_klassen.Bezeichnung AS bezKlasse,
				tbl_raeume.Bezeichnung AS bezRaum,
				tbl_lehrer.Vorname,
				tbl_lehrer.Nachname
			FROM tbl_klassen
			LEFT JOIN tbl_raeume ON tbl_raeume.IDRaum=tbl_klassen.FIDRaum
			LEFT JOIN tbl_lehrer ON tbl_lehrer.IDLehrer=tbl_klassen.FIDKV
			ORDER BY tbl_klassen.Bezeichnung ASC
		";
		$klassen = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
		while($klasse = $klassen->fetch_object()) {
			echo('
				<li>
					' . $klasse->bezKlasse . ': KV ' . $klasse->Vorname . ' ' . $klasse->Nachname . ', Raum ' . $klasse->bezRaum . '<ul>
			');
			
			// ---- Schüler: ----
			$sql = "
				SELECT
					Vorname,
					Nachname,
					GebDatum
				FROM tbl_schueler
				WHERE(
					FIDKlasse=" . $klasse->IDKlasse . "
				)
				ORDER BY Nachname ASC, Vorname ASC
			";
			$schueler = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($sch = $schueler->fetch_object()) {
				echo('
					<li>' . $sch->Nachname . ' ' . $sch->Vorname . ', geb. ' . $sch->GebDatum . '</li>
				');
			}
			// ------------------
			
			echo('
					</ul>
				</li>
			');
		}
		
		echo('</ul>');
		?>
	</body>
</html>