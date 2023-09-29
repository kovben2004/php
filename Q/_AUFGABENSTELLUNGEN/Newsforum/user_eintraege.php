<?php
require("includes/config.inc.php");
require("includes/conn.inc.php");
require("includes/common.inc.php");
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
				<li><a href="index.php">zurück zur Startseite</a></li>
				<li><a href="newsforum.php">zu den Einträgen</a></li>
				<li><a href="suche.php">Eintragssuche</a></li>
			</ul>
		</nav>
		
		<form method="post">
			<label>
				Filtere nach User (Emailadresse):
				<input type="email" name="E">
			</label>
			<input type="submit">
		</form>
		
		<ul>
		<?php
		ta($_POST);
		if(count($_POST)>0 && strlen($_POST["E"])>0) {
			$sql = "
				SELECT
					tbl_eintraege.*
				FROM tbl_eintraege
				LEFT JOIN tbl_user ON tbl_user.IDUser=tbl_eintraege.FIDUser
				WHERE(
					tbl_user.Emailadresse='" . $_POST["E"] . "'
				)
				ORDER BY tbl_eintraege.Eintragezeitpunkt DESC
			";
		}
		else {
			$sql = "
				SELECT
					tbl_eintraege.*
				FROM tbl_eintraege
				LEFT JOIN tbl_user ON tbl_user.IDUser=tbl_eintraege.FIDUser
				ORDER BY tbl_eintraege.Eintragezeitpunkt DESC
			";
		}
		
		$eintraege = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
		while($eintrag = $eintraege->fetch_object()) {
			echo('
				<li>' . date("d.m.Y",strtotime($eintrag->Eintragezeitpunkt)) . ' um ' . date("H:i",strtotime($eintrag->Eintragezeitpunkt)) . ' Uhr:<div>' . $eintrag->Eintrag . '</div>
				</li>
			');
		}
		?>
		</ul>
	</body>
</html>