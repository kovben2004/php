<?php
function ta($in) {
	echo('</pre>');
}
	echo('<pre class="ta">');
	print_r($in);

session_start(); //ermöglicht den Zugriff auf die Session-Verwaltung und somit auf alle (für den speziellen User) gespeicherten Informationen

ta($_SESSION);
ta($_POST);
if(count($_POST)>0) {
	//es wurde (irgendein) Formular mittels POST abgeschickt, dessen Daten an dieses Dokument übergeben wurden
	if(isset($_POST["btnLogout"]) && $_POST["btnLogout"]=="ausloggen") {
		//es wurde (höchstwahrscheinlich "unser") der Logoutbutton geklickt --> ausloggen
		$_SESSION = []; //es wird das bestehende SESSION-Array (dieses Users) mit einem leeren Array überschrieben
		
		if(ini_get("session.use_cookies")) {
			$params = session_get_cookie_params(); //liest das aktuelle Cookie ein
			setcookie(session_name(), '', time() - 86400, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
		}
		
		session_destroy(); //"zerstört" eine Session, indem die Session-ID zurückgesetzt wird
	}
}

if(!(isset($_SESSION["eingeloggt"]) || $_SESSION["eingeloggt"]===true)) {
	header("Location: 11_login02.php");
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Geschützt</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
	</head>
	<body>
		<form method="post">
			<input type="submit" value="ausloggen" name="btnLogout">
		</form>
		<h1>Ich bin geschützt!</h1>
		<p>Wirklich!</p>
	</body>
</html>