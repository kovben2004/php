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
					tbl_telnos.*,
					tbl_user.Emailadresse
				FROM tbl_telnos
				INNER JOIN tbl_user ON tbl_user.IDUser=tbl_telnos.FIDUser
			";
			$telnos = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($telno = $telnos->fetch_object()) {
				echo('
					<li>' . $telno->Telno . ': ' . $telno->Emailadresse . '</li>
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
					tbl_telnos.Telno
				FROM tbl_user
				LEFT JOIN tbl_telnos ON tbl_telnos.FIDUser=tbl_user.IDUser
			";
			$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($user = $userliste->fetch_object()) {
				echo('
					<li>' . $user->Emailadresse . ': ' . $user->Telno . '</li>
				');
			}
			*/
			// ---- pro User eine eigene Abfrage für seine zugewiesenen Telnos: ----
			$sql = "
				SELECT
					*
				FROM tbl_user
			";
			$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($user = $userliste->fetch_object()) {
				echo('
					<li>' . $user->Emailadresse . ':
						<ul>
				');
				
				// ---- Zugriff auf die Telnos des Users: ----
				$sql = "
					SELECT
						*
					FROM tbl_telnos
					WHERE(
						FIDUser=" . $user->IDUser . "
					)
				";
				$telnos = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
				while($telno = $telnos->fetch_object()) {
					echo('
						<li>' . $telno->Telno . '</li>
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
		<h3>Zwei getrennte DB-Anfragen: Problem, da alle Telnos im Speicher abgelegt werden müssen</h3>
		<ul>
			<?php
			// ---- sämtliche Telnos ermitteln (unabhängig vom User): ----
			$arr_telnos = [];
			$sql = "
				SELECT
					*
				FROM tbl_telnos
			";
			$telnos = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($telno =  $telnos->fetch_object()) {
				$fidUser = $telno->FIDUser;
				if(!isset($arr_telnos[$fidUser])) {
					$arr_telnos[$fidUser] = [];
				}
				$arr_telnos[$fidUser][] = $telno->Telno;
			}
			ta($arr_telnos);
			// ------------------------------------------------------------
			
			// ---- sämtliche User ausgeben und je User auf seine gespeicherten Telnos zugreifen: ----
			$sql = "
				SELECT
					*
				FROM tbl_user
			";
			$userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($user = $userliste->fetch_object()) {
				echo('
					<li>' . $user->Emailadresse . ':
						<ul>
				');
				
				// ---- Telnos des Users: ----
				if(isset($arr_telnos[$user->IDUser])) {
					for($i=0; $i<count($arr_telnos[$user->IDUser]); $i++) {
						echo('
							<li>' . $arr_telnos[$user->IDUser][$i] . '</li>
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