<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
$msg = "";

ta($_POST);
if(count($_POST)>0) {
	$sql = "
		SELECT
			*
		FROM tbl_user
		WHERE(
			Emailadresse='" . $conn->real_escape_string($_POST["E"]) . "'
		)
	";
	ta($sql);
	$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
	if($userliste->num_rows==1) {
		//ja, die eingegebenen Daten waren korrekt
		$daten = $userliste->fetch_object();
		ta($daten);
		if(password_verify($_POST["P"],$daten->Passwort)) {
			//die beiden Hashes stimmen überein
			$msg = '<p class="success">Super!</p>';
		}
		else {
			$msg = '<p class="error">Sorry.</p>';
		}
	}
	else {
		$msg = '<p class="error">Sorry.</p>';
	}
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Login</title>
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
				Ihr Passwort:
				<input type="password" name="P" required>
			</label>
			<input type="submit" value="einloggen">
		</form>
	</body>
</html>