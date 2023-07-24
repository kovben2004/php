<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");

$msg = "";

ta($_POST);
if(count($_POST)>0) {
	$sql = "
		INSERT INTO tbl_user
			(Emailadresse, Passwort, Nachname, Vorname, GebDatum)
		VALUES (
			'" . $_POST["E"] . "',
			'" . $_POST["P"] . "',
			'" . $_POST["NN"] . "',
			'" . $_POST["VN"] . "',
			'" . $_POST["GD"] . "'
		)
	";
	$ok = $conn->query($sql); // or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
	if($ok) {
		$msg = '<p class="success">Vielen Dank. Ihre Daten wurden erfolgreich eingetragen.</p>';
	}
	else {
		$msg = '<p class="error">Leider konnte Ihre Eingabe nicht gespeichert werden.</p>';
	}
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>INSERT</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
	</head>
	<body>
		<?php echo($msg); ?>
		<form method="post">
			<label>
				Emailadresse:
				<input type="email" name="E" required>
			</label>
			<label>
				Passwort:
				<input type="text" name="P" required>
			</label>
			<label>
				Vorname:
				<input type="text" name="VN">
			</label>
			<label>
				Nachname:
				<input type="text" name="NN">
			</label>
			<label>
				Geb.-Datum:
				<input type="date" name="GD">
			</label>
			<input type="submit" value="eintragen">
		</form>
	</body>
</html>