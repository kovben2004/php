<html>

<head>
</head>

<body>

    <nav>
        <ul>
            <a href="conn3.php"><div>Lehrer</div></a>
            <a href="test.php">
                    <div>Klassen</div>
                </a>
            <li><a href="schuler.php">
                    <h1>Schüler</h1>
                </a></li>
        </ul>
    </nav>




    <div>
        <form method="post" action="schuler.php">
            Vorname:<input type="text" name="vn" placeholder="Gib hier deine Daten ein">
            Nachname:<input type="text" name="nn" placeholder="Gib hier deine Daten ein">
            <p><input type="submit" name="button" value="Suchen"></p>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST["vn"]) && isset($_POST["nn"])) {
    $vn = $_POST["vn"];
    $nn = $_POST["nn"];
}

$host = "localhost";
$username = "root";
$password = "";
$db = "db_schule1";

$conn = new mysqli("$host", "$username", "$password", "$db");
if ($conn->connect_errno > 0) {
    die("Fehler:" . $conn->connect_error);
}

if (isset($_POST["vn"]) && isset($_POST["nn"])) {
    $sql = "SELECT * FROM tbl_schuler
    WHERE ( Vorname LIKE '%" . $vn . "%' AND Nachname LIKE '%" . $nn . "%')";
} else if (isset($_POST["vn"])) {
    $sql = "SELECT * FROM tbl_schuler
    WHERE ( Vorname LIKE '%" . $vn . "%')";
} else if (isset($_POST["nn"])) {
    $sql = "SELECT * FROM tbl_schuler
    WHERE ( Nachname LIKE '%" . $nn . "%')";
} else {
    $sql = "SELECT * FROM tbl_schuler"; //wenn nichts eingegeben wurde, wählen wir alles aus
}

$result = mysqli_query($conn, $sql);
echo "<table>";
echo "<tr><th>ID</th><th>Vorname</th><th>Nachname</th><th>Geburtsdatum</th></tr>";
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr> <td>" . $row["ID_Schüler"] . "</td>";
        echo "<td>" . $row["Vorname"] . "</td>";
        echo "<td>" . $row["Nachname"] . "</td>";
        echo "<td>" . $row["Geburtsdatum"] . "</td>";
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