<?php
require("includes/config.inc.php");
require("includes/common.inc.php");
require("includes/conn.inc.php");
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login-Formular</title>
</head>
<body>

                <ul>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="filtern.php">Reisen</a></li>
                </ul>

<form action="login.php" method="post">
    <!-- Dieser Teil bleibt unverändert -->
    <label for="Emailadresse">Emailadresse:</label>
    <input type="text" name="Emailadresse" id="Emailadresse" required><br><br>

    <label for="Passwort">Passwort:</label>
    <input type="password" name="Passwort" id="Passwort" required><br><br>

    <input type="submit" value="Einloggen">

</form>
</body>
</html>

<?php
session_start();

// Datenbankverbindung herstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_reisetagebuch";

$conn = new mysqli($servername, $username, $password, $dbname);
// Dieser Teil bleibt unverändert

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Emailadresse = $_POST["Emailadresse"];
    $Passwort = $_POST["Passwort"];

    $sql = "SELECT Passwort FROM tbl_user WHERE Emailadresse = '$Emailadresse'"; // Verwenden Sie $Emailadresse statt $Email
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Zum testen was man zurück bekommst
        //echo 'password_verify Passwort: ' . $Passwort . ' row: ' . $row["Passwort"];
        if (password_verify($Passwort, $row["Passwort"])) {
            $_SESSION["loggedin"] = true;
            $_SESSION["Emailadresse"] = $Emailadresse;
            echo "Willkomen $Emailadresse ";
            // Weiterleitung zu einer anderen Seite, z.B. dashboard.php
            // header("Location: dashboard.php");
        } else {
            echo "Falsches Passwort!";
        }
    } else {
        echo "Benutzername nicht gefunden!";
    }
}

$conn->close();
