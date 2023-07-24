<?php
function ta($in) {
	echo('<pre class="ta">');
	print_r($in);
	echo('</pre>');
}

$msg = ""; //Hilfsvariable für die Ausgabe von HTML-Code

if(count($_POST)>0) {
	//es wurde ein Formular abgeschickt
	ta($_POST);
	ta($_GET);
	
	$email_korrekt = "test@test.at";
	$pwd_korrekt = "test1234";
	
	if($_POST["E"]==$email_korrekt && $_POST["P"]==$pwd_korrekt) {
		//korrekter Login
		$msg = '<p class="success">Vielen Dank. Sie werden in Kürze weitergeleitet.</p>';
	}
	else {
		//entweder Passwort und/oder Emailadresse falsch
		$msg = '<p class="error">Leider waren die eingegebenen Daten nicht korrekt.</p>';
	}
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Formulardaten</title>
		<meta charset="utf-8">
		<style>
		.ta {
			background-color:#ffc;
			border:1px solid orange;
			border-left-width:5px;
			padding:0.2em 1em;
			margin:1em 0px;
			font-family:"Courier New", monospace;
			font-size:0.9rem;
		}
		</style>
	</head>
	<body>
		<?php echo($msg); ?>
		<form method="post" action="?id=23">
			<label>
				Ihre Emailadresse:
				<input type="email" name="E">
			</label>
			<label>
				Ihr Passwort:
				<input type="password" name="P">
			</label>
			<input type="submit" value="einloggen">
		</form>
	</body>
</html>