<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Datenbank</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
	</head>
	<body>
		<table>
			<thead>
				<tr>
					<th scope="col">IDUser</th>
					<th scope="col">Emailadresse</th>
					<th scope="col">Passwort</th>
					<th scope="col">Vorname</th>
					<th scope="col">Nachname</th>
					<th scope="col">Geb-Datum</th>
					<th scope="col">Reg-Zeitpunkt</th>
				</tr>
			</thead>
			<tbody>
				<?php
				/*
				*: alle Spalten pro Datensatz
				Emailadresse, Vorname, GebDatum: nur die Spalten Emailadresse, Vorname und Nachname pro Datensatz
				
				Filter:
				  = Gleichheit
				  <> Ungleichheit
				  LIKE '%...%' im Inhalt muss ein Text vorkommen; % sind Platzhalter für "beliebiges davor" oder "beliebiges danach"
				  IS NULL Inhalt muss NULL sein
				  IS NOT NULL Inhalt darf nicht NULL sein
				  > größer
				  >= größer-gleich
				  < kleiner
				  <= kleiner-gleich
				  ...
				  
				Limit:
				  LIMIT 5: die ersten fünf Datensätze
				  LIMIT 2,6: ab dem dritten Datensatz (beachte: Zählung beginnt bei 0) die nächsten sechs Datensätze: Startdatensatz, Anzahl Datensätze
				  
				Sortierung:
				  ASC: ascending (aufsteigend)
				  DESC: descending (absteigend)
				
				SELECT
					*
				FROM Tabellenname
				WHERE(
					Nachname LIKE '%Maier' AND/OR
					Vorname='Uwe' AND/OR ...
				)
				ORDER BY GebDatum DESC, Nachname ASC, Vorname ASC
				LIMIT 5
				*/
				
				$sql = "
					SELECT
						IDUser, Emailadresse, Passwort, Vorname, Nachname, GebDatum, RegZeitpunkt
					FROM tbl_user
					ORDER BY GebDatum DESC, Nachname ASC, Vorname ASC
					LIMIT 2,6
				";
				$ergebnis = $conn->query($sql);
				if($ergebnis!==false) {
					while($daten = $ergebnis->fetch_object()) {
						echo('
							<tr>
								<td>' . $daten->IDUser . '</td>
								<td>' . $daten->Emailadresse . '</td>
								<td>' . $daten->Passwort . '</td>
								<td>' . $daten->Vorname . '</td>
								<td>' . $daten->Nachname . '</td>
								<td>' . $daten->GebDatum . '</td>
								<td>' . $daten->RegZeitpunkt . '</td>
							</tr>
						');
					}
				}
				else {
					die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				}
				?>
			</tbody>
		</table>
	</body>
</html>