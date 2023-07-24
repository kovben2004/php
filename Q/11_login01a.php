<?php
function ta($in) {
	echo('<pre class="ta">');
	print_r($in);
	echo('</pre>');
}

$msg = "";
ta($_POST);

if(count($_POST)>0) {
	//die Anzahl der Einträge im POST-Array ist mehr als Null --> es wurden Formulardaten an dieses Dokument übermittelt
	
	$email_korrekt = ["test@test.at","test2@test.at"];
	$pwd_korrekt = ["test123","test456"];
	
	/*
	$login = [
		["test@test.at","test123"],
		["test2@test.at","test456"]
	];
	*/
	
	/* durchaus üblich, wenngleich aufgrund der for-Schleife etwas irreführend
	for($i=0; $i<count($email_korrekt); $i++) {
		if($_POST["E"]==$email_korrekt[$i] && $_POST["P"]==$pwd_korrekt[$i]) {
			//die eingegebenen Daten waren korrekt
			$msg = '<p class="success">Vielen Dank. Ihre Daten waren korrekt - Sie werden in Kürze weitergeleitet.</p>';
			break;
		}
		else {
			//die eingegebenen Daten (Emailadresse und/oder Passwort) waren nicht korrekt
			$msg = '<p class="error">Leider waren die eingegebenen Daten nicht korrekt. Bitte versuchen Sie es erneut.</p>';
		}
	}
	*/

	/* unüblich, da die for-Schleife typ. eine fixe Anzahl an Durchfäufen aufweisen sollte
	$found = false;
	for($i=0; $i<count($email_korrekt) && !$found; $i++) {
		if($_POST["E"]==$email_korrekt[$i] && $_POST["P"]==$pwd_korrekt[$i]) {
			//die eingegebenen Daten waren korrekt
			$msg = '<p class="success">Vielen Dank. Ihre Daten waren korrekt - Sie werden in Kürze weitergeleitet.</p>';
			$found = true;
		}
		else {
			//die eingegebenen Daten (Emailadresse und/oder Passwort) waren nicht korrekt
			$msg = '<p class="error">Leider waren die eingegebenen Daten nicht korrekt. Bitte versuchen Sie es erneut.</p>';
		}
	}
	*/

	/*
	$i = 0;
	$found = false;
	while($i<count($email_korrekt) && !$found) {
		if($_POST["E"]==$email_korrekt[$i] && $_POST["P"]==$pwd_korrekt[$i]) {
			//die eingegebenen Daten waren korrekt
			$msg = '<p class="success">Vielen Dank. Ihre Daten waren korrekt - Sie werden in Kürze weitergeleitet.</p>';
			$found = true;
		}
		else {
			//die eingegebenen Daten (Emailadresse und/oder Passwort) waren nicht korrekt
			$msg = '<p class="error">Leider waren die eingegebenen Daten nicht korrekt. Bitte versuchen Sie es erneut.</p>';
		}
		$i++;
	}
	*/

	$i = 0;
	$found = false;
	do {
		if($_POST["E"]==$email_korrekt[$i] && $_POST["P"]==$pwd_korrekt[$i]) {
			//die eingegebenen Daten waren korrekt
			$msg = '<p class="success">Vielen Dank. Ihre Daten waren korrekt - Sie werden in Kürze weitergeleitet.</p>';
			$found = true;
		}
		else {
			//die eingegebenen Daten (Emailadresse und/oder Passwort) waren nicht korrekt
			$msg = '<p class="error">Leider waren die eingegebenen Daten nicht korrekt. Bitte versuchen Sie es erneut.</p>';
		}
		$i++;
	} while($i<count($email_korrekt) && !$found);
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