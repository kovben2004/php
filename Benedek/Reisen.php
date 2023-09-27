<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
ta($_POST);
if(count($_POST)>0) {
	if (isset($_POST["VN"])){
		$sql = "
			SELECT 
				Vorname, IDUser
			FROM
				tbl_user
			WHERE(
				Vorname like '%". $_POST["VN"] ."%'
			)
		";
		
		if (TESTMODUS == true){
			echo $sql;

			$ok_suche = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
		} else {
			$ok_suche = $conn->query($sql) or die("Suche fehlgeschlagen, bitte kontaktieren Sie einen Adminstrator.");
		}
		if(mysqli_num_rows($ok_suche) != 0){#Suche erfolgreich
			while($VN = $ok_suche->fetch_object()){
				echo('
						<h1>' .  $VN->Vorname .'<h1>
				');
				$current_user_id = $VN->IDUser;
				$sql2 = "
				SELECT tbl_user.Vorname, tbl_user.IDUser, tbl_reisen.Titel, tbl_reisen.Beschreibung
					FROM
					tbl_reisen
					INNER JOIN tbl_user on tbl_reisen.FIDUser = tbl_user.IDUser
				WHERE(
					tbl_user.IDUser = '" . $current_user_id . "'
				)
				";
				if (TESTMODUS == true){
					echo $sql2;
		
					$ok_suche_reise = $conn->query($sql2) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql2);
				} else {
					$ok_suche_reise = $conn->query($sql2) or die("Ein Problem ist aufgetreten, bitte kontaktieren Sie einen Adminstrator.");
				}
				if(mysqli_num_rows($ok_suche_reise) != 0){#Suche erfolgreich
					while($Reise = $ok_suche_reise->fetch_object()){
						echo('
								<h2>' .  $Reise->Titel .'</h2>
								<h3>' .  $Reise->Beschreibung . '</h3>
						');
						$sql3 = "
						SELECT tbl_abschnitte.Titel, unter_abschnitt.Titel AS unter_abschnitt_Titel, tbl_abschnitte.Titel, tbl_abschnitte.Beschreibung, tbl_abschnitte.von, tbl_abschnitte.bis
						FROM tbl_abschnitte
						LEFT OUTER JOIN tbl_abschnitte unter_abschnitt ON tbl_abschnitte.FIDAbschnitt = unter_abschnitt.IDAbschnitt
						";
						if (TESTMODUS == true){
							echo $sql3;
				
							$ok_suche_abschnitte = $conn->query($sql3) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql3);
						} else {
							$ok_suche_abschnitte = $conn->query($sql3) or die("Ein Problem ist aufgetreten, bitte kontaktieren Sie einen Adminstrator.");
						}
						if(mysqli_num_rows($ok_suche_abschnitte) != 0){#Suche erfolgreich
							while($Abschnitt = $ok_suche_abschnitte->fetch_object()){
								echo('
										<h4>' .  $Abschnitt->Titel .'</h4>
										<p>' .  $Abschnitt->Beschreibung . '</p>
										<p> Abschnitt von ' . $Abschnitt->von . ' bis ' . $Abschnitt->bis . '</p>

								');
							}
						}

					}
				}
			}
		}
	}
}
?>

<!doctype html>
<html lang="de">
	<head>
		<title>Reisen</title>
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
			<h1>Reise-Suche</h1>
			<fieldset>
				<legend>Vorname<legend>
				<input type="text" name="VN" required>
				<input type="submit" value="filtern">
			</fieldset>
		</form>
	</body>
</html>

