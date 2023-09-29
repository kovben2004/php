<?php
require("../includes/config.inc.php");
require("../includes/common.inc.php");
require("../includes/conn.inc.php");

ta($_POST);
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Aufgabe 14_DB</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/common.css">
	</head>
	<body>
		<form method="post">
			<label>
				Nachname:
				<input type="text" name="NN">
			</label>
			<input type="submit" value="filtern">
		</form>
		<ol>
			<?php
			$sql = "
				SELECT
					*
				FROM tbl_user
			";
			
			if(count($_POST)>0 && strlen($_POST["NN"])>0) {
				$sql.= "
					WHERE(
						Nachname LIKE '%" . $_POST["NN"] . "%'
					)
				";
			}

			$sql.= "
				ORDER BY Nachname ASC
			";
			
			ta($sql);
			
			
			
			/*
			$a = $a + 1 --> $a+= 1 --> $a++
			$b = $b . "xxx" --> $b.= "xxx"
			
			
			if(count($_POST)>0 && strlen($_POST["NN"])>0) {
				$sql = "
					SELECT
						*
					FROM tbl_user
					WHERE(
						Nachname LIKE '%" . $_POST["NN"] . "%'
					)
					ORDER BY Nachname ASC, Vorname ASC
				";
			}
			else {
				$sql = "
					SELECT
						*
					FROM tbl_user
					ORDER BY Nachname ASC, Vorname ASC
				";
			}
			*/
			
			$datensaetze = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($ds = $datensaetze->fetch_object()) {
				echo('
					<li>' . $ds->Emailadresse . ' (' . $ds->Passwort . '): ' . $ds->Nachname . ' ' . $ds->Vorname . ' (ID=' . $ds->IDUser . '), geboren ' . $ds->GebDatum . ', registiert ' . $ds->RegZeitpunkt . ' Uhr</li>
				');
			}
			?>
		</ol>
	</body>
</html>