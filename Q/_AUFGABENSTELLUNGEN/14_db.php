<?php
require("../includes/config.inc.php");
require("../includes/common.inc.php");
require("../includes/conn.inc.php");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Datenbank</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
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
			
			// ---- Filter: ----
			if(count($_POST)>0 && strlen($_POST["NN"])>0) {
				$sql.= "
					WHERE(
						Nachname LIKE '%" . $_POST["NN"] . "%'
					)
				";
			}
			// -----------------
			
			$sql.= "
				ORDER BY Nachname ASC, Vorname ASC
			";
			$ergebnis = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			
			while($daten = $ergebnis->fetch_object()) {
				echo('
					<li>
						' . $daten->Emailadresse . ' (' . $daten->Passwort . '):
						' . $daten->Nachname . ' ' . $daten->Vorname . ' (ID=' . $daten->IDUser . '),
						geboren ' . $daten->GebDatum . ',
						registriert ' . $daten->RegZeitpunkt . '
					</li>
				');
			}
			?>
		</ol>
	</body>
</html>