<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Interpreten</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form method="post">
			<label>
				Filtern nach:
				<input type="search" name="Suche">
			</label>
			<input type="submit" value="filtern">
		</form>
		<?php
		echo('<ul>');
		$sql = "
			SELECT
				tbl_songs.*,
				tbl_alben.Albumtitel,
				tbl_alben.Erscheinungsjahr,
				tbl_interpreten.Interpret
			FROM tbl_songs
			INNER JOIN tbl_alben ON tbl_alben.IDAlbum=tbl_songs.FIDAlbum
			INNER JOIN tbl_interpreten ON tbl_interpreten.IDInterpret=tbl_alben.FIDInterpret
		";
		
		if(count($_POST)>0 && strlen($_POST["Suche"])>0) {
			$sql .= "
				WHERE(
					Songtitel LIKE '" . $_POST["Suche"] . "%'
				)
			";
		}
		
		$sql .= "
			ORDER BY Songtitel ASC
		";
		
		$songs = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
		while($song = $songs->fetch_object()) {
			echo('
				<li>
					' . $song->Songtitel . ' aus dem Album
					' . $song->Albumtitel . ' (' . $song->Erscheinungsjahr . ') von
					' . $song->Interpret . '
				</li>
			');
		}
		
		echo('</ul>');
		?>
	</body>
</html>