<?php

require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");




?>

<!doctype html>
<html lang="de">
	<head>
		<title>PHP</title>
		<meta charset="utf-8">
	</head>
	<body>

    <form method="post" action="">
			<label>
				Ihr Name:
				<input type="text" name="N">
			</label>
            <label>
				<input type="submit" name="S">
			</label>
            <?php
                $sql=

                "SELECT tbl_reisen.FIDUser, tbl_reisen.Titel, tbl_reisen.Beschreibung, tbl_user.Vorname, tbl_user.Nachname 
                FROM `tbl_reisen` 
                LEFT JOIN `tbl_user` ON tbl_reisen.FIDUser = tbl_user.IDUser;";

                $ergebnis = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql); //schickt das SQL-Statement an den DB-Server und speichert das von ihm zurückgelieferte Ergebnis in einem "Ergebnis-Objekt" (hier: $ergebnis) ab
                ta($ergebnis);

                echo "<ul>";

                while ($row = $ergebnis->fetch_assoc()) {
                    echo "<li>";
                    echo $row['Vorname'] . " " . $row['Nachname'];
                    echo "<ul>";
                    echo "<li>";
                    echo $row['Titel'] . "<br>";
                    echo $row['Beschreibung'];
                    echo "</li>";
                    echo "</ul>";
                    echo "</li>";
                }
                
                echo "</ul>";
                
           
            ?>
	</body>
</html>