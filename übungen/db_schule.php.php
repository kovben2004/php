<!DOCTYPEhtml>
<html lang="de">

<head>
    <title>db_schule.php</title>
    <meta charset="UTF-8">
</head>

<body>
    
    <?php
    
   // Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_schule";

$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen, ob die Verbindung erfolgreich war
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL-Befehl ausführen, um neue Datensätze einzufügen
$sql = "INSERT INTO tbl_lehrer (Vorname, Nachname)
VALUES ('Mortaza', 'Hossaini')";

if ($conn->query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Verbindung zur Datenbank schließen
$conn->close();




?>

</body>

</html>