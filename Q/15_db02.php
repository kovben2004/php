<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");

$msg = "";
ta($_POST);
if(count($_POST)>0) {
	if(isset($_POST["INS"])) {
		//der User hat (offensichtlich) den Button zum Eintragen eines neuen Datensatzes geklickt
		$sql = "
			INSERT INTO tbl_user
				(Emailadresse, Passwort, Vorname, Nachname, GebDatum)
			VALUES (
				'" . $_POST["Email_0"] . "',
				'" . $_POST["PWD_0"] . "',
				'" . $_POST["VN_0"] . "',
				'" . $_POST["NN_0"] . "',
				'" . $_POST["GD_0"] . "'
			)
		";
		ta($sql);
		$ok = $conn->query($sql);
		if(!$ok) {
			$msg = '<p class="error">Leider sind beim Eintragen der Daten Probleme aufgetreten, die wir nicht lösen konnten. Wir sind schuld!</p>';
			ta($conn->error);
		}
	}
	
	if(isset($_POST["DSDel"]) && strlen($_POST["DSDel"])>0) {
		//es wurde irgendein Löschen-Button geklickt
		$sql = "
			DELETE FROM tbl_user
			WHERE(
				IDUser=" . $_POST["DSDel"] . "
			)
		";
		ta($sql);
		$ok = $conn->query($sql);
		if(!$ok) {
			$msg = '<p class="error">Leider ist beim Löschen der Daten ein Problem aufgetreten, die wir nicht lösen konnten. Wir sind schuld!</p>';
			ta($conn->error);
		}
	}
	
	if(isset($_POST["DSUpd"]) && strlen($_POST["DSUpd"])>0) {
		//es wurde irgendein Update-Button geklickt
		/*
		$_POST["DSUpd"] --> 16 --> der Datensatz mit IDUser=16 muss aktualisiert werden
		$id = $_POST["DSUpd"]
		Emailadresse --> $_POST["Email_16"] --> $_POST["Email_" . $_POST["DSUpd"]] --> $_POST["Email_" . $id]
		*/
		
		$id = $_POST["DSUpd"];
		$sql = "
			UPDATE tbl_user SET
				Emailadresse='" . $_POST["Email_" . $id] . "',
				Passwort='" . $_POST["PWD_" . $id] . "',
				Vorname='" . $_POST["VN_" . $id] . "',
				Nachname='" . $_POST["NN_" . $id] . "',
				GebDatum='" . $_POST["GD_" . $id] . "'
			WHERE(
				IDUser=" . $id . "
			)
		";
		ta($sql);
		$ok = $conn->query($sql);
		if(!$ok) {
			$msg = '<p class="error">Leider ist beim Aktualisieren der Daten ein Problem aufgetreten, die wir nicht lösen konnten. Wir sind schuld!</p>';
			ta($conn->error);
		}
	}
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Datenbank</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
		<script>
		function loescheDS(ID) {
			document.getElementById("DSDel").value = ID;
			document.getElementById("frm").submit();
		}
		function aktualisiereDS(ID) {
			document.getElementById("DSUpd").value = ID;
			document.getElementById("frm").submit();
		}
		</script>
	</head>
	<body>
		<?php echo($msg); ?>
		<form method="post" id="frm">
		<input type="hidden" name="DSDel" id="DSDel">
		<input type="hidden" name="DSUpd" id="DSUpd">
		<table>
			<thead>
				<tr>
					<th scope="col">IDUser</th>
					<th scope="col">Emailadresse</th>
					<th scope="col">Passwort</th>
					<th scope="col">Vorname</th>
					<th scope="col">Nachname</th>
					<th scope="col">Geb-Datum</th>
					<th scope="col">Reg-Zeitpunkt</th>
					<th></th>
				</tr>
				<tr>
					<td></td>
					<td><input type="email" name="Email_0"></td>
					<td><input type="text" name="PWD_0"></td>
					<td><input type="text" name="VN_0"></td>
					<td><input type="text" name="NN_0"></td>
					<td><input type="date" name="GD_0"></td>
					<td></td>
					<td><input type="submit" name="INS" value="neu"></td>
				</tr>
			</thead>
			<tbody>
				<?php				
				$sql = "
					SELECT
						*
					FROM tbl_user
				";
				$ergebnis = $conn->query($sql);
				if($ergebnis!==false) {
					while($daten = $ergebnis->fetch_object()) {
						$id = $daten->IDUser;
						echo('
							<tr>
								<td>' . $id . '</td>
								<td><input type="email" value="' . $daten->Emailadresse . '" name="Email_' . $id . '"></td>
								<td><input type="text" value="' . $daten->Passwort . '" name="PWD_' . $id . '"></td>
								<td><input type="text" value="' . $daten->Vorname . '" name="VN_' . $id . '"></td>
								<td><input type="text" value="' . $daten->Nachname . '" name="NN_' . $id . '"></td>
								<td><input type="date" value="' . $daten->GebDatum . '" name="GD_' . $id . '"></td>
								<td>' . $daten->RegZeitpunkt . '</td>
								<td>
									<input type="button" value="x" onclick="loescheDS(' . $id . ');">
									<input type="button" value="UPD" onclick="aktualisiereDS(' . $id . ');">
								</td>
							</tr>
						');
					}
				}
				else {
					die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				}
				?>
			</tbody>
		</table>
		</form>
	</body>
</html>