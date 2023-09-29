<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");

$msg = "";
ta($_POST);
if(count($_POST)>0) {
	$sql = "
		INSERT INTO tbl_gaestebuch
			(Gast,Nachricht)
		VALUES(
			'" . htmlspecialchars($_POST["gast"],ENT_QUOTES,"UTF-8",false) . "',
			'" . htmlspecialchars($_POST["nachricht"],ENT_QUOTES,"UTF-8",false) . "'
		)
	";
	ta($sql);
	$ok = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
	if(!$ok) {
		$msg = '<p class="error">Aus unerfindlichen Gründen wurde Ihre Nachricht abgelehnt! Sauber.</p>';
	}
}
?>
<!doctype html>
<html lang="de">
	<head>
		<title>Gästebuch</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php echo($msg); ?>
		<form method="post">
			<label>
				Ihr Name:
				<input type="text" name="gast" required>
			</label>
			<label>
				Ihre Nachricht:
				<textarea name="nachricht" required></textarea>
			</label>
			<input type="submit" value="eintragen">
		</form>
		<hr>
		<ul>
			<li>Kleiner: &lt;</li>
			<li>Grösser: &gt;</li>
			<li>kaufmännisches UND: &amp;</li>
			<li>&lt;script&gt;
		</ul>
		<ul>
		<?php
		$sql = "
			SELECT
				*
			FROM tbl_gaestebuch
			ORDER BY Zeitpunkt DESC
		";
		$eintraege = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
		while($eintrag = $eintraege->fetch_object()) {
			echo('
				<li>
					' . $eintrag->Gast . ' schrieb am ' . date("j.n.Y",strtotime($eintrag->Zeitpunkt)) . ' um ' . date("H:i",strtotime($eintrag->Zeitpunkt)) . ' Uhr:
					<div>' . $eintrag->Nachricht . '</div>
				</li>
			');
		}
		?>
		</ul>
	</body>
</html>