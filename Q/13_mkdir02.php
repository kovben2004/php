<?php
$msg = "";

if(count($_POST)>0) {
	//NICHT oder NUR EINGESCHRÄNKT praxistauglich! Beachte: Security
	$ok = mkdir($_POST["VZNeu"],0755,true);
	if($ok) {
		$msg = '<p class="success">Vielen Dank. Das Verzeichnis wurde erfolgreich angelegt.</p>';
	}
	else {
		$msg = '<p class="error">Leider konnte das Wunschverzeichnis nicht angelegt werden.</p>';
	}
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Verzeichnisstruktur</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php echo($msg); ?>
		<form method="post">
			<label>
				Verzeichnispfad:
				<input type="text" name="VZNeu" required>
			</label>
			<input type="submit" value="Verzeichnis anlegen">
		</form>
	</body>
</html>