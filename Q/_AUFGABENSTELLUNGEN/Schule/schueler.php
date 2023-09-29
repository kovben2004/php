<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Schüler</title>
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
		<h1>Schülerliste</h1>
		<form method="post">
			<label>
				Vorname:
				<input type="search" name="VN">
			</label>
			<label>
				Nachname:
				<input type="search" name="NN">
			</label>
			<input type="submit" value="suchen">
		</form>
		<?php
		echo('<ul>');
		
		$sql = "
			SELECT
				*
			FROM tbl_schueler
		";
		
		if(count($_POST)>0 && (strlen($_POST["VN"])>0 || strlen($_POST["NN"])>0)) {
			//es sind POST-Daten vorhanden und es wurde entweder das Vorname- oder das Nachnamefeld (oder beide) eingegeben
			
			$arr = [];
			if(strlen($_POST["VN"])>0) {
				$arr[] = "Vorname LIKE '%" . $_POST["VN"] . "%'";
			}
			if(strlen($_POST["NN"])>0) {
				$arr[] = "Nachname LIKE '%" . $_POST["NN"] . "%'";
			}
			ta($arr);
			$sql.= "
				WHERE(
					" . implode(" AND ",$arr) . "
				)
			";
		}
		
		$sql.= "
			ORDER BY Nachname ASC, Vorname ASC
		";
		ta($sql);
		
		$schueler = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
		while($sch = $schueler->fetch_object()) {
			echo('
				<li>' . $sch->Nachname . ' ' . $sch->Vorname . ', geb. ' . $sch->GebDatum . '</li>
			');
		}
		
		echo('</ul>');
		?>
	</body>
</html>