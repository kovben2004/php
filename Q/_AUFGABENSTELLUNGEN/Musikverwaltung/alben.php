<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Alben</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
		echo('<ul>');
		
		$sql = "
			SELECT
				tbl_alben.*,
				tbl_interpreten.Interpret
			FROM tbl_alben
			INNER JOIN tbl_interpreten ON tbl_interpreten.IDInterpret=tbl_alben.FIDInterpret
			ORDER BY tbl_alben.Erscheinungsjahr DESC
		";
		$alben = $conn->query($sql);
		if($alben!==false) {
			while($album = $alben->fetch_object()) {
				echo('
					<li>
						"' . $album->Albumtitel . '" von ' . $album->Interpret . ' (' . $album->Erscheinungsjahr . '):
						<ol>
				');
				
				// ---- Songs je Album: ----
				$sql = "
					SELECT
						*
					FROM tbl_songs
					WHERE(
						FIDAlbum=" . $album->IDAlbum . "
					)
					ORDER BY Reihenfolge ASC
				";
				$songs = $conn->query($sql);
				if($songs!==false) {
					while($song = $songs->fetch_object()) {
						echo('
							<li>' . $song->Songtitel . '</li>
						');
					}
				}
				else {
					if(TESTMODE) {
						die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
					}
					else {
						header("Location: errors/db_query.html");
					}
				}
				// -------------------------
				
				echo('
						</ol>
					</li>
				');
			}
		}
		else {
			if(TESTMODE) {
				die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			}
			else {
				header("Location: errors/db_query.html");
			}
		}
		
		echo('</ul>');
		?>
	</body>
</html>