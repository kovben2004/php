<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>JOINS</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Joins</h1>
		<h2>Alle Telefonnummern mit den zugehörigen Usern</h2>
		<ul>
			<?php
			$sql = "
				SELECT
					telnum1.*,
					tbl_user.userName
				FROM telnum1
				INNER JOIN tbl_user ON tbl_user.ID=telnum1.userID
			";
			$Users = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($telefonnummer = $Users->fetch_object()) {
				echo('
					<li>' . $telefonnummer->Telnum1 . ': ' . $telefonnummer->userName . '</li>
				');
			}
			?>
		</ul>
		<h2>Alle User samt ihrer Telefonnummern</h2>
		<h3>Schleife in Schleife: Problem aufgrund vieler Datenbankzugriffe</h3>
		<ul>
			<?php
			/*
			$sql = "
				SELECT
					tbl_user.*,
					telnum1.Telnum1
				FROM tbl_user
				LEFT JOIN telnum1 ON telnum1.userID=tbl_user.ID
			";
			$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($user = $userliste->fetch_object()) {
				echo('
					<li>' . $user->userName . ': ' . $user->Telnum1 . '</li>
				');
			}
			*/
			// ---- pro User eine eigene Abfrage für seine zugewiesenen Users: ----
			$sql = "
				SELECT
					*
				FROM tbl_user
			";
			$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($user = $userliste->fetch_object()) {
				echo('
					<li>' . $user->userName . ':
						<ul>
				');
				
				// ---- Zugriff auf die Users des Users: ----
				$sql = "
					SELECT
						*
					FROM tbl_user
					WHERE(
						ID=" . $user->ID . "
					)
				";
				$Users = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				while($telefonnummer = $Users->fetch_object()) {
					echo('
						<li>' . $telefonnummer->Telnum1 . '</li>
					');
				}
				// -------------------------------------------
				
				echo('		
						</ul>
					</li>
				');
			}
			?>
		</ul>
		<h3>Zwei getrennte DB-Anfragen: Problem, da alle Users im Speicher abgelegt werden müssen</h3>
		<ul>
			<?php
			// ---- sämtliche Users ermitteln (unabhängig vom User): ----
			$arr_Users = [];
			$sql = "
				SELECT
					*
				FROM Telum1
			";
			$Users = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($telefonnummer =  $Users->fetch_object()) {
				$userID = $telefonnummer->ID;
				if(!isset($arr_Users[$userID])) {
					$arr_Users[$userID] = [];
				}
				$arr_Users[$userID][] = $telefonnummer->Telnum1;
			}
			ta($arr_Users);
			// ------------------------------------------------------------
			
			// ---- sämtliche User ausgeben und je User auf seine gespeicherten Users zugreifen: ----
			$sql = "
				SELECT
					*
				FROM tbl_user
			";
			$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($user = $userliste->fetch_object()) {
				echo('
					<li>' . $user->userName . ':
						<ul>
				');
				
				// ---- Users des Users: ----
				if(isset($arr_Users[$user->ID])) {
					for($i=0; $i<count($arr_Users[$user->ID]); $i++) {
						echo('
							<li>' . $arr_Users[$user->ID][$i] . '</li>
						');
					}
				}
				// ---------------------------

				echo('
						</ul>
					</li>
				');
			}
			?>
		</ul>
	</body>
</html>