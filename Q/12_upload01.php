<?php
require("includes/common.inc.php");
ta($_FILES);

$msg = "";

if(count($_FILES)>0) {
	//es ist ein Formular abgeschickt worden, wo zumindest die Möglichkeit besteht, eine Datei hochzuladen; ob tatsächlich eine Datei hochgeladen wurde, ist noch nicht sicher
	if($_FILES["UL"]["error"]==0) {
		//während des Uploads ist kein Fehler aufgetreten --> Datei an den Zielort verschieben
		//move_uploaded_file($_FILES["UL"]["tmp_name"],$_FILES["UL"]["name"]);
		//move_uploaded_file($_FILES["UL"]["tmp_name"],"Skriptum.pdf");
		$ok = move_uploaded_file($_FILES["UL"]["tmp_name"],"pdf/" . $_FILES["UL"]["name"]);
		if($ok) {
			$msg = '<p class="success">Die Datei wurde erfolgreich hochgeladen.</p>';
		}
		else {
			$msg = '<p class="error">Leider konnte die Datei nicht am Zielort gespeichert werden.</p>';
		}
	}
	else {
		$msg = '<p class="error">Während des Uploads ist (irgendein) Fehler aufgetreten.</p>';
	}
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
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="UL">
			<input type="submit" value="hochladen">
		</form>
	</body>
</html>