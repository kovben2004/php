<?php
require("includes/config.inc.php");
require("includes/conn.inc.php");
require("includes/common.inc.php");

function zeigeForum($idEintrag=null) {
	global $conn; //behandelt die Variable $conn, die "ausserhalb" der Funktion definiert wurde, als global
	
	if(is_null($idEintrag)) {
		$sql = "
			SELECT
				tbl_eintraege.*,
				tbl_user.Vorname,
				tbl_user.Nachname
			FROM tbl_eintraege
			LEFT JOIN tbl_user ON tbl_user.IDUser=tbl_eintraege.FIDUser
			WHERE(
				tbl_eintraege.FIDEintrag IS NULL
			)
			ORDER BY Eintragezeitpunkt ASC
		";
	}
	else {
		$sql = "
			SELECT
				tbl_eintraege.*,
				tbl_user.Vorname,
				tbl_user.Nachname
			FROM tbl_eintraege
			LEFT JOIN tbl_user ON tbl_user.IDUser=tbl_eintraege.FIDUser
			WHERE(
				tbl_eintraege.FIDEintrag=" . $idEintrag . "
			)
			ORDER BY Eintragezeitpunkt ASC
		";
	}
	
	$eintraege = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
	echo('<ul>');
	while($eintrag = $eintraege->fetch_object()) {
		echo('
			<li>
				' . $eintrag->Vorname . ' '
				. $eintrag->Nachname
				. ' schrieb am '
				. date("d.m.Y",strtotime($eintrag->Eintragezeitpunkt)) . ' um ' . date("H:i",strtotime($eintrag->Eintragezeitpunkt)) . ' Uhr:<div>' . $eintrag->Eintrag . '</div></li>
		');
		
		// ---- Rekursion: ----
		zeigeForum($eintrag->IDEintrag);
		// ENDE Rekursion: ----
		echo('<li>');
		echo('
			</li>
		');
	}
	echo('</ul>');
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Newsforum</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Newsforum</h1>
		<nav>
			<ul>
				<li><a href="newsforum.index.php">zurück zur Startseite</a></li>
				<li><a href="user_eintraege.php">zu den Einträgen eines Users</a></li>
				<li><a href="suche.php">Eintragssuche</a></li>
			</ul>
		</nav>
		
		<?php
		zeigeForum();
		?>
	</body>
</html>