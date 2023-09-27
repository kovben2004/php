<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");

$msg = "";
session_start();
ta($_POST);
if(count($_POST)>0) {
	if (isset($_POST["E"]) && isset($_POST["P"])){ #einloggen = select, der böse user kann "required" nicht entfernen
		$sql = "
			SELECT 
				IDUser
			FROM
				tbl_user
			WHERE(
				Emailadresse = '". $_POST["E"] ."' AND Passwort = '". $_POST["P"] ."'
			)
		";
		if (TESTMODUS == true){
			echo $sql;
			;
			/* #habe versucht, mit einem regex in der Fehlermeldung nach dem keyword "Duplicate Entry" zu suchen. Anscheinend macht man das in php von der Syntax her anders, als wie ich's versucht hab. 
			$ok = $conn->query($sql)
			if (preg_match($conn->error, ".*Duplicate entry.*")){
				echo "Diese Emailadresse ist bereits registriert!";
			} else {
				die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			}
			*/
			$ok_login = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
		} else {
			$ok_login = $conn->query($sql) or die("Login fehlgeschlagen, bitte kontaktieren Sie einen Adminstrator.");
		}
		if(mysqli_num_rows($ok_login) != 0){#user mit passwort existiert, dieser wurde Korrekt eingegeben
			$_SESSION["Eingeloggt"]="true";
			header("Location: logged.php");
		} else {
			echo "Zugriff verweigert. Bitte versuchen Sie es erneut, oder registrieren Sie sich, falls Sie noch keinen Account haben.";
		}
	}
	else {#registrieren = insert
		if ($_POST["Pr"] == $_POST["PrW"]){ #widerholtes Passwort == eingegebenes Passwort
			if(strlen($_POST["Pr"])>=8){
			
				# ich nehme an, dass RegZeitpunkt von der Datenbank automatisch hinzugefügt wird. (bestätigt.)
				$Er = addslashes($_POST["Er"]);
				$Pr = addslashes($_POST["Pr"]);
				$Vn = addslashes($_POST["VN"]);
				$NN =  addslashes($_POST["NN"]);
				$Beschr = addslashes($_POST["Beschr"]);

				$sql = "
					INSERT INTO tbl_user
						(Emailadresse, Passwort, Vorname, Nachname, Beschreibung)
					VALUES (
						'" . $Er . "',
						'" . $_POST["Pr"] . "',
						'" . $_POST["VN"] . "',
						'" . $_POST["NN"] . "',
						'" . $_POST["Beschr"] . "'
					)
				";
				if (TESTMODUS == true){
					echo $sql;
					;
					/* #habe versucht, mit einem regex in der Fehlermeldung nach dem keyword "Duplicate Entry" zu suchen. Anscheinend macht man das in php von der Syntax her anders, als wie ich's versucht hab. 
					$ok = $conn->query($sql)
					if (preg_match($conn->error, ".*Duplicate entry.*")){
						echo "Diese Emailadresse ist bereits registriert!";
					} else {
						die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
					}
					*/
					$ok = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				} else {
					$ok = $conn->query($sql) or die("Ein Fehler ist aufgetreten. Möglicherweise ist diese Emailadresse bereits registriert.");
				}
				if($ok) {
					header("Location: logged.php");
				} else {
					$msg = '<p>Es ist ein Fehler aufgetreten, die Registrierung hat fehlgeschlagen.</p>';
				}
			} else {
				echo "Das Passwort sollte mindestens 8 Zeichen lang sein!";
			}
		}
		else{
			echo "Passwörter stimmen nicht überein, bitte versuchen Sie es erneut.";
		}
	}
}


?>

<!doctype html>
<html lang="de">
    
	<head>
		<title>login</title>
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
        <nav>
            <a href="login.php">Login/Registrierung</a>
            <a href="Reisen.php">Reisen</a>
            <a href="Bewertungen.php">Bewertungen</a>
        </nav>
		<form method="post">
		<h1>Einloggen</h1>
		<fieldset>
				<legend>Willkommen zurück!<legend>
				<label>
					Emailadresse:
					<input type="email" name="E" required>
				</label>
				<label>
					Passwort:
					<input type="password" name="P" required>
				</label>
				<input type="submit">

			</fieldset>
			</form>
			<h1>Registrieren</h1>
			<form method="post">
			<fieldset>
				<legend>Pflichtangaben<legend>
					<label>
					Emailadresse:
					<input type="email" name="Er" required>
					</label>
					<label>
						Passwort:
						<input type="password" name="Pr" required>
					</label>
					<label>
						Passwort Widerholen:
						<input type="password" name="PrW" required>
					</label>
					<label>
						Vorname:
						<input type="text" name="VN">
					</label>

			</fieldset>
			<fieldset>
				<legend>Optionale Angaben<legend>
				<label>
					Nachname:
					<input type="text" name="NN">
				</label>
				<label>
					Eigene Beschreibung:
					<input type="text" name="Beschr" size="65">
					<input type="submit" id="1">
				</label>
			</fieldset>
		</form>
	</body>
</html>