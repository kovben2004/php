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
    transition: 0.3s;
}

li a:hover {
    background-color: #555;
}

form {
    max-width: 400px; /* Für das Login-Formular kann eine kleinere Breite gewählt werden */
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
input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 6px;
    transition: 0.3s;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #777;
}

input[type="submit"] {
    background-color: #444;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    transition: 0.3s;
}

input[type="submit"]:hover {
    background-color: #666;
}
</style>
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
$dbname = "db_reisentagebuch";

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
