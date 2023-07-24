<?php
require("includes/common.inc.php");
ta($_FILES);

$msg = "";

if(count($_FILES)>0) {
	//es ist ein Formular abgeschickt worden, wo zumindest die Möglichkeit besteht, eine Datei hochzuladen; ob tatsächlich eine Datei hochgeladen wurde, ist noch nicht sicher
	
	$upl = $_FILES["UL"]; //Hilfsvariable, damit man nicht soviel schreiben muss
	
	for($i=0; $i<count($upl["name"]); $i++) {
		if($upl["error"][$i]==0) {
			//während des Uploads ist kein Fehler aufgetreten --> Datei an den Zielort verschieben
			//move_uploaded_file($_FILES["UL"]["tmp_name"],$_FILES["UL"]["name"]);
			//move_uploaded_file($_FILES["UL"]["tmp_name"],"Skriptum.pdf");
			
			$teile = pathinfo($upl["name"][$i]);
			ta($teile);
			$name_neu = $teile["filename"] . "_" . date("YmdHis",time()) . "." . $teile["extension"];
			ta($name_neu);
			
			$ok = move_uploaded_file($upl["tmp_name"][$i],"pdf/" . $name_neu);
			if($ok) {
				$msg = $msg . '<p class="success">Die Datei "' . $upl["name"][$i] . '" wurde erfolgreich hochgeladen.</p>'; //$msg .= '<p class...
			}
			else {
				$msg = $msg . '<p class="error">Leider konnte die Datei "' . $upl["name"][$i] . '" nicht am Zielort gespeichert werden.</p>';
			}
		}
		else {
			$msg = $msg . '<p class="error">Während des Uploads ist (irgendein) Fehler aufgetreten.</p>';
		}
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
			<input type="file" name="UL[]" multiple>
			<input type="submit" value="hochladen">
		</form>
	</body>
</html>