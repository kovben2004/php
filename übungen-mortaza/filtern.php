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

        <style>
            /* Allgemeine Stilrichtungen */
body {
    font-family: 'Helvetica', sans-serif;
    background: linear-gradient(to right, #f4f4f4, #e0e0e0);
    margin: 0;
    padding: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: white;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
}

li a:hover {
    background-color: #555;
}

form {
    max-width: 500px;
    margin: 80px auto;
    padding: 30px;
    background-color: #fff;
    box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.15);
}

label {
    display: block;
    margin-bottom: 12px;
    font-weight: bold;
    color: #333;
}

input[type="text"],
input[type="submit"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 6px;
    transition: 0.3s;
}

input[type="text"]:focus {
    border-color: #777;
}

input[type="submit"] {
    background-color: #444;
    color: white;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #666;
}

/* Zusätzlicher Stil für die Reisen-Liste */
ul.reisen-liste {
    list-style-type: disc;
    margin-top: 30px;
}

ul.reisen-liste > li {
    background-color: #f5f5f5;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 6px;
}

ul.reisen-liste ul {
    margin: 10px 0;
    list-style-type: circle;
}

ul.reisen-liste li li {
    background-color: transparent;
}
</style>
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