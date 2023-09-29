<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");

$ausgabe = "";
if(count($_POST)>0) {
	$ausgabe = password_hash($_POST["P"],PASSWORD_DEFAULT);
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Passwortgenerator</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
	</head>
	<body>
		<?php echo($ausgabe); ?>
		<form method="post">
			<label>
				Passwort:
				<input type="text" name="P" required>
			</label>
			<input type="submit" value="Hash generieren">
		</form>
	</body>
</html>