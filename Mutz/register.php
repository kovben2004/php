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
$dbname = "db_reisetagebuch";

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
