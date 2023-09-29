<html>

<head>

</head>

<body>

    <nav>
        <ul>
            <a href="conn3.php">
                    <div>Lehrer</div>
                </a>
            <li><a href="test.php">
                    <h1>Klassen</h1>
                </a></li>
            <a href="schuler.php">
                    <div>Schüler</div>
                </a>
        </ul>
    </nav>




    <div>
        <form method="post">
            Schuler:<input type="text" name="sch" placeholder="Gib hier deine Daten ein">
            Raum:<input type="text" name="raum" placeholder="Gib hier deine Daten ein">
            <p><input type="submit" name="button" value="Suchen"></p>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST["sch"]) && isset($_POST["raum"])) {
    $sch = $_POST["sch"];
    $raum = $_POST["raum"];
}



$host = "localhost";
$username = "root";
$password = "";
$db = "db_schule1";
echo "<h1>Klassen</h1>";

$conn = new mysqli("$host", "$username", "$password", "$db");
if ($conn->connect_errno > 0) {
    die("Fehler:" . $conn->connect_error);
}

if (isset($_POST["sch"]) && isset($_POST["raum"])) {
    $sql = "SELECT * FROM tbl_klasse
    LEFT JOIN tbl_schuler 
    ON tbl_schuler.FID_Klasse = tbl_klasse.ID_Klasse
    LEFT JOIN tbl_raum
    ON tbl_klasse.FID_Raum = tbl_raum.ID_Raum
    WHERE ( tbl_schuler.Vorname LIKE '%" . $sch . "%' AND tbl_raum.Raum_Name LIKE '%" . $raum . "%')";
} else if (isset($_POST["sch"])) {
    $sql = "SELECT * FROM tbl_klasse
    'SELECT * FROM tbl_schuler LEFT JOIN tbl_klasse ON tbl_schuler.fID_klasse = tbl_klasse.ID_klasse';
    WHERE ( Vorname LIKE '%" . $sch . "%')";
} else if (isset($_POST["raum"])) {
    $sql = "SELECT * FROM tbl_raum
    WHERE ( Raum_Name LIKE '%" . $raum . "%')";
} else {
    $sql = //wenn nichts eingegeben wurde, wählen wir alles aus
    'SELECT * FROM tbl_klasse LEFT JOIN tbl_lehrer ON tbl_lehrer.ID_Lehrer = tbl_klasse.FID_Lehrer';
}

$result = mysqli_query($conn, $sql);
echo "<table>";
echo "<tr><th>ID</th><th>Klassen Name</th><th>FID Lehrer</th><th>FID Räume</th></tr>";
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr> <td>" . $row["ID_Klasse"] . "</td>";
        echo "<td>" . $row["Klassen_Name"] . "</td>";
        echo "<td>" . $row["FID_Lehrer"] . "</td>";
        echo "<td>" . $row["FID_Raum"] . "</td>";
        echo "</tr>";

        //Konkatenation
        //concat
        //concation / concatenation

    }
} else {
    echo "<h1> Konnte nicht gefunden werden! </h1>";
}

echo "</table>";
?>