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
		<?php
		echo('<ul>');
		
		$sql = "
			SELECT
				*
			FROM tbl_interpreten
			ORDER BY Interpret ASC
		";
		$interpreten = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
		while($interpret = $interpreten->fetch_object()) {
			echo('
				<li>' . $interpret->Interpret . ':
					<ul>
			');
			
			// ---- Alben je Interpret: ----
			$sql = "
				SELECT
					*
				FROM tbl_alben
				WHERE(
					FIDInterpret=" . $interpret->IDInterpret . "
				)
				ORDER BY Erscheinungsjahr ASC
			";
			$alben = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
			while($album = $alben->fetch_object()) {
				echo('
					<li>
						' . $album->Albumtitel . '
						(' . $album->Erscheinungsjahr . ')
					</li>
				');
			}
			// -----------------------------

			echo('
					</ul>
				</li>
			');
		}
		echo('</ul>');
		?>
	</body>
</html>