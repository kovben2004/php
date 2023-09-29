<?php

$host = "localhost";
$username = "root";
$password = "";
$db_name = "db_schule";

$conn = new mysqli($host, $username, $password, $db_name);
if ($conn->connect_errno > 0) {
   die("Fehler: " . $conn->connect_error);

}

$sql = "SELECT * FROM tbl_lehrer ";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        //print_r($row);
        print_r($result);
        echo "<br>";
        //echo "ID_lehrer: " . $row['ID_lehrer'] . "<br>" ;
        echo "Vorname: " . $row['Vorname'] . "<br>";
        echo "Nachname: " . $row['Nachname'] . "<br>";
    }
} else {
    echo "Fehler bei der Abfrage: " . mysqli_error($conn);
}

mysqli_close($conn);

?>





















































