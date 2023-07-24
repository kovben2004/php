<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>JOINS</title>
		<meta charset="utf-8">
	</head>
	<body>
		<table>
			<thead>
				<tr>
					<th scope="col">IDUser</th>
					<th scope="col">Emailadresse</th>
					<th scope="col">Passwort</th>
					<th scope="col">Vorname</th>
					<th scope="col">Nachname</th>
					<th scope="col">Geb-Datum</th>
					<th scope="col">Geb-Land</th>
					<th scope="col">Geschlecht</th>
					<th scope="col">Reg-Zeitpunkt</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "
					SELECT
						tbl_user.*,
						tbl_staaten.Staat,
						tbl_geschlechter.Geschlecht
					FROM tbl_user
					INNER JOIN tbl_staaten ON tbl_staaten.IDStaat=tbl_user.FIDGebLand
					LEFT JOIN tbl_geschlechter ON tbl_geschlechter.IDGeschlecht=tbl_user.FIDGeschlecht
				";
				$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				while($user = $userliste->fetch_object()) {
					// ---- so sicher nicht! ----
					/*
					if(!is_null($user->FIDGebLand)) {
						$sql = "
							SELECT
								Staat
							FROM tbl_staaten
							WHERE(
								IDStaat=" . $user->FIDGebLand . "
							)
						";
						$staaten = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
						$staat = $staaten->fetch_object();
						$bezStaat = $staat->Staat;
					}
					else {
						$bezStaat = "-";
					}
					*/
					// --------------------------
					
					$bezStaat = $user->Staat;
					
					echo('
						<tr>
							<td>' . $user->IDUser . '</td>
							<td>' . $user->Emailadresse . '</td>
							<td>' . $user->Passwort . '</td>
							<td>' . $user->Vorname . '</td>
							<td>' . $user->Nachname . '</td>
							<td>' . $user->GebDatum . '</td>
							<td>' . $user->FIDGebLand . ' | ' . $bezStaat . '</td>
							<td>' . $user->FIDGeschlecht . ' | ' . $user->Geschlecht . '</td>
							<td>' . $user->RegZeitpunkt . '</td>
						</tr>
					');
				}
				?>
				<tr><td colspan="9">ENDE INNER JOIN-----</td></tr>
				<?php
				$sql = "
					SELECT
						tbl_user.*,
						tbl_staaten.Staat
					FROM tbl_user
					LEFT JOIN tbl_staaten ON tbl_staaten.IDStaat=tbl_user.FIDGebLand
				";
				$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				while($user = $userliste->fetch_object()) {
					$bezStaat = $user->Staat;
					
					echo('
						<tr>
							<td>' . $user->IDUser . '</td>
							<td>' . $user->Emailadresse . '</td>
							<td>' . $user->Passwort . '</td>
							<td>' . $user->Vorname . '</td>
							<td>' . $user->Nachname . '</td>
							<td>' . $user->GebDatum . '</td>
							<td>' . $user->FIDGebLand . ' | ' . $bezStaat . '</td>
							<td>' . $user->FIDGeschlecht . '</td>
							<td>' . $user->RegZeitpunkt . '</td>
						</tr>
					');
				}
				?>
				<tr><td colspan="9">ENDE LEFT JOIN-----</td></tr>
				<?php
				$sql = "
					SELECT
						tbl_user.*,
						tbl_staaten.Staat
					FROM tbl_user
					RIGHT JOIN tbl_staaten ON tbl_staaten.IDStaat=tbl_user.FIDGebLand
				";
				$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				while($user = $userliste->fetch_object()) {
					$bezStaat = $user->Staat;
					
					echo('
						<tr>
							<td>' . $user->IDUser . '</td>
							<td>' . $user->Emailadresse . '</td>
							<td>' . $user->Passwort . '</td>
							<td>' . $user->Vorname . '</td>
							<td>' . $user->Nachname . '</td>
							<td>' . $user->GebDatum . '</td>
							<td>' . $user->FIDGebLand . ' | ' . $bezStaat . '</td>
							<td>' . $user->FIDGeschlecht . '</td>
							<td>' . $user->RegZeitpunkt . '</td>
						</tr>
					');
				}
				?>
				<tr><td colspan="9">ENDE LEFT JOIN-----</td></tr>
			</tbody>
		</table>
	</body>
</html>