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
	
	for($i=0; $i<count($email_korrekt); $i++) {
		if($_POST["E"]==$email_korrekt[$i] && $_POST["P"]==$pwd_korrekt[$i]) {
			//die eingegebenen Daten waren korrekt
			
			session_start(); // (1) startet die Session-Verwaltung und somit den Zugriff auf (für den speziellen User) gespeicherte Informationen, (2) erzeugt eine eindeutige Sitzungs-ID, sofern (für den speziellen User) eine solche noch nicht existiert
			
			$_SESSION['eingeloggt'] = true; //schreibt in das SESSION-Array den Eintrag "eingeloggt" und setzt diesen (für den speziellen User) auf true
			$_SESSION['Emailadresse'] = $_POST['E'];
			
			header("Location: 11_geschuetzt.php"); //serverseitige Weiterleitung auf ein anderes Dokument: das aktuelle Dokument wird SOFORT abgebrochen und es wird mit der Verarbeitung des neuen Dokumentes begonnen
		}
	}
	$msg = '<p class="error">Leider waren die eingegebenen Daten nicht korrekt. Bitte versuchen Sie es erneut.</p>';
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