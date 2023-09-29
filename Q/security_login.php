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
			Emailadresse='" . $_POST["E"] . "' AND
			Passwort='" . $_POST["P"] . "'
		)
	";
	$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
	if($userliste->num_rows>0) {
		//ja, die eingegebenen Daten waren korrekt
		$msg = '<p class="success">Super!</p>';
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