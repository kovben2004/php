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
				<li><a href="user_eintraege.php">zu den Einträgen eines Users</a></li>
			</ul>
		</nav>
		
		<form method="post">
			<label>
				Filtere nach Wort:
				<input type="search" name="W">
			</label>
			<input type="submit">
		</form>
		
		<ul>
		<?php
		ta($_POST);
		if(count($_POST)>0 && strlen($_POST["W"])>0) {
			$sql = "
				SELECT
					*
				FROM tbl_eintraege
				WHERE(
					Eintrag LIKE '%" . $_POST["W"] . "%'
				)
				ORDER BY Eintragezeitpunkt DESC
			";
		}
		else {
			$sql = "
				SELECT
					*
				FROM tbl_eintraege
				ORDER BY Eintragezeitpunkt DESC
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