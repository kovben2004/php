<?php
session_start();

require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");

if(!(isset($_SESSION["eingeloggt"]) && $_SESSION["eingeloggt"])) {
	//ggf. zuvor Logout
	header("Location: 19_rs_login.php");
}

$msg = "";
ta($_POST);
if(count($_POST)>0) {
	switch($_POST["wasTun"]) {
		case "einfuegen":
			//es wurde der INS-Button geklickt
			$sql = "
				INSERT INTO tbl_user
					(FIDRolle,Emailadresse,Passwort,Vorname,Nachname,GebDatum)
				VALUES (
					" . $conn->real_escape_string($_POST["FIDRolle_0"]) . ",
					'" . $conn->real_escape_string($_POST["E_0"]) . "',
					'" . password_hash($_POST["P_0"],PASSWORD_DEFAULT) . "',
					'" . $conn->real_escape_string($_POST["VN_0"]) . "',
					'" . $conn->real_escape_string($_POST["NN_0"]) . "',
					'" . $conn->real_escape_string($_POST["GD_0"]) . "'
				)
			";
			ta($sql);
			$ok = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			if($ok) {
				$msg = '<p class="success">Der User wurde angelegt.</p>';
			}
			else {
				$msg = '<p class="error">Der User konnte nicht angelegt werden.</p>';
			}
			break;
			
		case "aktualisieren":
			$id = $_POST["IDUser"];
			// ---- bestehendes PWD ermitteln um zu entscheiden, ob das Passwort in den POST-Daten neu ist oder das bestehende Passwort ist ----
			$sql = "
				SELECT Passwort FROM tbl_user
				WHERE(
					IDUser=" . $id . "
				)
			";
			$daten = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			$ds = $daten->fetch_object();
			$pwd = $ds->Passwort;
			
			if($pwd==$_POST["P_".$id]) { $pwd_neu = $pwd; }
			else { $pwd_neu = password_hash($_POST["P_".$id],PASSWORD_DEFAULT); }
			//$pwd_neu = $pwd==$_POST["P_".$id] ? $pwd : password_hash($_POST["P_".$id],PASSWORD_DEFAULT);
			// ----
			
			$sql = "
				UPDATE tbl_user SET
					FIDRolle=" . $conn->real_escape_string($_POST["FIDRolle_".$id]) . ",
					Emailadresse='" . $conn->real_escape_string($_POST["E_".$id]) . "',
					Passwort='" . $pwd_neu . "',
					Vorname='" . $conn->real_escape_string($_POST["VN_".$id]) . "',
					Nachname='" . $conn->real_escape_string($_POST["NN_".$id]) . "',
					GebDatum='" . $conn->real_escape_string($_POST["GD_".$id]) . "'
				WHERE(
					IDUser=" . $id . "
				)
			";
			ta($sql);
			$ok = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			if($ok) {
				$msg = '<p class="success">Die Userdaten wurden aktualisiert.</p>';
			}
			else {
				$msg = '<p class="error">Die Userdaten konnten nicht aktualisiert werden.</p>';
			}
			break;
			
		case "loeschen":
			if($_SESSION["Stufe"]<=20) {
				$sql = "
					DELETE FROM tbl_user
					WHERE(
						IDUser=" . $conn->real_escape_string($_POST["IDUser"]) . "
					)
				";
				ta($sql);
				$ok = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				if($ok) {
					$msg = '<p class="success">Der User wurde gelöscht.</p>';
				}
				else {
					$msg = '<p class="error">Der User konnte nicht gelöscht werden.</p>';
				}
			}
			break;
	}
}

function zeigeRollen($IDUser,$IDRolle=0) {
	global $conn;
	
	echo('
		<select name="FIDRolle_' . $IDUser . '">
	');
	
	$sql = "
		SELECT * FROM tbl_rollen
		WHERE(
			Stufe>" . $_SESSION["Stufe"] . "
		)
		ORDER BY Stufe DESC
	";
	$rollen = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
	while($rolle = $rollen->fetch_object()) {
		if($rolle->IDRolle==$IDRolle) { $sel = "selected"; }
		else { $sel = ""; }
		echo('
			<option value="' . $rolle->IDRolle . '" ' . $sel . '>' . $rolle->Rolle . '</option>
		');
	}
	
	echo('
		</select>
	');
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Redaktionssystem</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
		<script>
		function einfuegen() {
			document.querySelector("[name=IDUser]").value = 0;
			document.querySelector("[name=wasTun]").value = "einfuegen";
			document.querySelector("#frm").submit();
		}
		
		function aktualisieren(IDUser) {
			document.querySelector("[name=IDUser]").value = IDUser;
			document.querySelector("[name=wasTun]").value = "aktualisieren";
			document.querySelector("#frm").submit();
		}

		function loeschen(IDUser) {
			if(confirm("Wollen Sie diesen User wirklich löschen?")) {
				document.querySelector("[name=IDUser]").value = IDUser;
				document.querySelector("[name=wasTun]").value = "loeschen";
				document.querySelector("#frm").submit();
			}
		}
		</script>
	</head>
	<body>
		<?php echo($msg); ?>
		<form method="post" id="frm">
			<input type="hidden" name="IDUser">
			<input type="hidden" name="wasTun">
			<table>
				<thead>
					<tr>
						<th scope="col">IDUser</th>
						<th scope="col">Rolle</th>
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
						<td><?php zeigeRollen(0); ?></td>
						<td><input type="email" name="E_0"></td>
						<td><input type="text" name="P_0"></td>
						<td><input type="text" name="VN_0"></td>
						<td><input type="text" name="NN_0"></td>
						<td><input type="date" name="GD_0"></td>
						<td></td>
						<td>
							<button type="button" onclick="einfuegen();">INS</button>
						</td>
					</tr>
				</thead>
				<tbody>
					<?php
					switch(true) {
						case $_SESSION["Stufe"]<=10:
							$sql = "
								SELECT
									tbl_user.*
								FROM tbl_user
								LEFT JOIN tbl_rollen ON tbl_rollen.IDRolle=tbl_user.FIDRolle
								WHERE(
									tbl_rollen.Stufe>" . $_SESSION["Stufe"] . "
								)
							";
							break;
						
						default:
							$sql = "
								SELECT
									tbl_user.*
								FROM tbl_user
								INNER JOIN tbl_rollen ON tbl_rollen.IDRolle=tbl_user.FIDRolle
								WHERE(
									tbl_rollen.Stufe>" . $_SESSION["Stufe"] . "
								)
							";
					}
					
					$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
					while($user = $userliste->fetch_object()) {
						echo('
							<tr>
								<td>' . $user->IDUser . '</td>
								<td>
						');
						
						zeigeRollen($user->IDUser,$user->FIDRolle);
						echo('
								</td>
								<td><input type="text" name="E_' . $user->IDUser . '" value="' . $user->Emailadresse . '"></td>
								<td><input type="text" name="P_' . $user->IDUser . '" value="' . $user->Passwort . '"></td>
								<td><input type="text" name="VN_' . $user->IDUser . '" value="' . $user->Vorname . '"></td>
								<td><input type="text" name="NN_' . $user->IDUser . '" value="' . $user->Nachname . '"></td>
								<td><input type="date" name="GD_' . $user->IDUser . '" value="' . $user->GebDatum . '"></td>
								<td>' . $user->RegZeitpunkt . '</td>
								<td>
									<button type="button" onclick="aktualisieren(' . $user->IDUser . ');">UPD</button>
						');
						
						if($_SESSION["Stufe"]<=20) {
							echo('<button type="button" onclick="loeschen(' . $user->IDUser . ');">DEL</button>');
						}
						
						echo('
								</td>
							</tr>
						');
					}
					?>
				</tbody>
			</table>
		</form>
	</body>
</html>