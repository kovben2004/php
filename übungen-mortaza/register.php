<?php
require("./includes/config.inc.php");
require("./includes/common.inc.php");
require("./includes/conn.inc.php");
?>

<!DOCTYPE html>
<html lang="de">
<head>

    <meta charset="UTF-8">
    <title>Registrierungsformular</title>
<style>
    
/* Allgemeine Stilrichtungen */
body {
    font-family: 'Helvetica', sans-serif; /* Verwenden Sie eine moderne Schriftart */
    background: linear-gradient(to right, #f4f4f4, #e0e0e0); /* Hinzufügen eines Hintergrundfarbverlaufs */
    margin: 0;
    padding: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
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
    transition: 0.3s; /* Hinzufügen einer Transition für einen sanften Hover-Effekt */
}

li a:hover {
    background-color: #555; /* Dunklerer Hover-Effekt */
}

form {
    max-width: 500px;
    margin: 80px auto; /* Mehr Abstand von oben */
    padding: 30px;
    background-color: #fff;
    box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.15); /* Weicheren Schatten für das Formular */
}

label {
    display: block;
    margin-bottom: 12px;
    font-weight: bold;
    color: #333; /* Dunklere Schriftfarbe für bessere Lesbarkeit */
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 16px; /* Mehr Abstand für Eingabefelder */
    border: 1px solid #ccc;
    border-radius: 6px; /* Runderer Rand */
    transition: 0.3s; /* Sanfter Übergang beim Fokussieren */
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
    border-color: #777; /* Dunklere Randfarbe beim Fokussieren */
}

input[type="submit"] {
    background-color: #444; /* Dunklere Schaltflächenfarbe */
    color: white;
    padding: 12px 20px; /* Größerer Abstand für die Schaltfläche */
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    transition: 0.3s; /* Sanfter Übergang beim Hover */
}

input[type="submit"]:hover {
    background-color: #666; /* Dunklerer Hover-Effekt */
}

</style>
</head>
<body>

                <ul>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="filtern.php">Reisen</a></li>
                </ul>





<form action="register.php" method="post">
<label for="vorname">Vorname:</label>
    <input type="text" name="vorname" id="vorname" required><br><br>

    <label for="nachname">Nachname:</label>
    <input type="text" name="nachname" id="nachname" required><br><br>

    <label for="username">Benutzername:</label>
    <input type="text" name="username" id="username" required><br><br>

    <label for="email">E-Mail:</label>
    <input type="email" name="email" id="email" required><br><br>

    <label for="password">Passwort:</label>
    <input type="password" name="password" id="password" required><br><br>

    <label for="password_confirm">Passwort bestätigen:</label>
    <input type="password" name="password_confirm" id="password_confirm" required><br><br>

    <input type="submit" value="Registrieren">
</form>
</body>
</html>

<?php

// Datenbankverbindung herstellen (angenommen, Sie haben eine Datenbank mit dem Namen "mydb")
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_reisentagebuch";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vorname = $_POST ["vorname"];
    $nachname = $_POST ["nachname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    if ($password != $password_confirm) {
        echo "Passwörter stimmen nicht überein!";
        exit;
    }

    // Passwort verschlüsseln
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_user (Vorname, Nachname, Emailadresse, passwort) VALUES ('$vorname','$nachname','$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Neuer Benutzer erfolgreich registriert!";
    } else {
        echo "Fehler: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
