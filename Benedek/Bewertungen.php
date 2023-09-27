<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
/*
durchschnittliche Bewertung für jede Reise
(sum up all)/nr
*/
session_start();
if ($_SESSION["Eingeloggt"]="true"){
	#Bewertungen können gemacht werden
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
								<form method="post">
								<label>
								Bewerten:
							');

						// 	$moegliche_bewertungen=["sehr gut","gut","befriedigend","genügend","nicht genügend"]; 
						// 	echo '<select name="Auswahl">';
						// 	foreach($moegliche_bewertungen as $aktives_element){
						// 		echo("
						// 		<option>$aktives_element</option>
						// 		");
						// 	}
						// 	echo '</select> </label> <input type="submit" id="'.$Reise->IDReise.'"></form>'; #so wissen wir über javascript, zu welchem Post die Bewertung abgegeben wurde.
						// 	if(count($_POST)>0) {
						// 		if (isset($_POST["Auswahl"])){
						// 			echo $_POST["Auswahl"]; # ich habe leider nicht geschafft, den Auswahl des Users richtig an das Backend zu übergeben.
						// 			$sql2 = "
						// 			INSERT INTO tbl_votings 
						// 				(...)
						// 				...
						// 			";		
						// 		}
						// 	}
						// # Bewertung hinzufügen zu $Reise mit einem sql insert in tbl_votings
						$sql = "
							SELECT Bewertung FROM tbl_skala;
						";
						
						$ergebnis = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql); //schickt das SQL-Statement an den DB-Server und speichert das von ihm zurückgelieferte Ergebnis in einem "Ergebnis-Objekt" (hier: $ergebnis) ab
						ta($ergebnis);
						echo "<select>";
						while($row = $ergebnis->fetch_assoc()){
								echo "<option>" . "<br>" . $row ['Bewertung']."</option>";
							
						}
						echo "</select>";
						
						

								
							
			

				}
			}
		}
	}
}
?>

?>


<!doctype html>
<html lang="de">
    
	<head>
		<title>Bewertungen</title>
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

	</body>
</html>