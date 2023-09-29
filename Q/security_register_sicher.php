<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
$msg = "";

ta($_POST);
if(count($_POST)>0) {
	if(strlen($_POST["P0"])>=8) {
		//Mindestlänge ist erfüllt
		if($_POST["P0"]==$_POST["P1"]) {
			//Passwörter gleich
			if(strlen($_POST["E"])>=7) {
				//Länge der Emailadresse sieht gut aus
				$sql = "
					SELECT COUNT(*) AS cnt FROM tbl_user
					WHERE(
						Emailadresse='" . $conn->real_escape_string($_POST["E"]) . "' AND
						Passwort='" . $conn->real_escape_string($_POST["P0"]) . "'
					)
				";
				$dse = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				$ds = $dse->fetch_object();
				if($ds->cnt==0) {
					$sql = "
						INSERT INTO tbl_user
							(Emailadresse,Passwort)
						VALUES(
							'" . $conn->real_escape_string($_POST["E"]) . "',
							'" . password_hash($_POST["P0"],PASSWORD_DEFAULT) . "'
						)
					";
					$ok = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
					if($ok) {
						$msg = '<p class="success">Vielen Dank. Sie wurden registriert.</p>';
					}
					else {
						$msg = '<p class="error">Hat leider nicht geklappt, sorry.</p>';
					}
				}
				else {
					$msg = '<p class="error">Diese Emailadresse existiert bereits.</p>';
				}
			}
			else {
				$msg = '<p class="error">Das ist keine gültige Emailadresse.</p>';
			}
		}
		else {
			$msg = '<p class="error">Leider stimmen die Passwörter nicht überein.</p>';
		}
	}
	else {
		$msg = '<p class="error">Das Passwort ist zu kurz.</p>';
	}
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Registrierung</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php echo($msg); ?>
		<form method="post">
			<label>
				Ihre Emailadresse:
				<input type="email" name="E" required>
			</label>
			<label>
				Ihr Passwort (mind. 8 Zeichen):
				<input type="password" name="P0" required>
				<input type="password" name="P1" required>
			</label>
			<input type="submit" value="registrieren">
		</form>
	</body>
</html>