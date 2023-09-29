<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");

$msg = "";
if(count($_POST)>0) {
	$sql = "
		SELECT
			tbl_user.IDUser,
			tbl_user.Passwort,
			tbl_rollen.Stufe
		FROM tbl_user
		LEFT JOIN tbl_rollen ON tbl_rollen.IDRolle=tbl_user.FIDRolle
		WHERE(
			tbl_user.Emailadresse='" . $conn->real_escape_string($_POST["E"]) . "' AND
			tbl_user.FIDRolle IS NOT NULL
		)
	";
	$daten = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
	$user = $daten->fetch_object();
	if(password_verify($_POST["P"],$user->Passwort)) {
		session_start();
		$_SESSION["IDUser"] = $user->IDUser;
		$_SESSION["Stufe"] = $user->Stufe;
		header("Location: 19_rs_logged.php");
	}
	else {
		$msg = '<p class="error">Leider waren die eingegebenen Daten nicht korrekt.</p>';
	}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Login</title>
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
				<input type="password" name="P" required>
			</label>
			<input type="submit" value="einloggen">
		</form>
	</body>
</html>