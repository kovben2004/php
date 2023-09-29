<?php

require_once("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");

?>

<!doctype html>
<html lang="de">
	<head>
		<title>Filtern</title>
		<meta charset="utf-8">
	</head>
	<body>
        <!-- In jeder Datei (z.B. in login.html) können Sie folgenden Code einfügen: -->
                <ul>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="filtern.php">Reisen</a></li>
                </ul>


    <form method="post" action="">
			<label>
				Ihr Name:
				<input type="text" name="N">
			</label>
            <label>
				<input type="submit" name="S" value= "Filtern">
			</label>
            <?php
           if (isset($_POST['S'])) {
            $nameFilter = "%" . $_POST['N'] . "%";
        
            // Prepared Statement verwenden, um SQL-Injektionen zu verhindern
            $stmt = $conn->prepare("SELECT tbl_reisen.FIDUser, tbl_reisen.Titel, tbl_reisen.Beschreibung, tbl_user.Vorname, tbl_user.Nachname 
                                    FROM `tbl_reisen` 
                                    LEFT JOIN `tbl_user` ON tbl_reisen.FIDUser = tbl_user.IDUser 
                                    WHERE tbl_user.Vorname LIKE ?");
        
            $stmt->bind_param("s", $nameFilter);
        
            $stmt->execute();
        
            $ergebnis = $stmt->get_result();
        
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
        }
        
            ?>
	</body>
</html>