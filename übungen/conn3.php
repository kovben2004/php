<html>

<div>
    <form method="post" action="conn3.php">
    Vorname:<input type="text" name="vn" placeholder="Gib hier deine Daten ein">
    Nachname:<input type="text" name="nn" placeholder="Gib hier deine Daten ein">
    <p><input type="submit" name="button" value="Suchen"></p>
    </form>
</div>
</html>

<?php
if (isset($_POST["vn"]) && isset($_POST["nn"])) {
    $vn = $_POST["vn"];
    $nn = $_POST["nn"];
}


?>

<?php

$host="localhost";
$username="root";
$password="";
$db="db_schule";

$conn= new mysqli("$host", "$username", "$password", "$db");
if ($conn-> connect_errno>0) {
    die("Fehler:". $conn-> connect_error);
}

if (isset($_POST["vn"]) && isset($_POST["nn"])){
    $sql= "SELECT * FROM tbl_lehrer
    WHERE ( Vorname LIKE '%" . $vn . "%' AND Nachname LIKE '%" . $nn . "%')";
}
else if (isset($_POST["vn"])){
    $sql= "SELECT * FROM tbl_lehrer
    WHERE ( Vorname LIKE '%" . $vn . "%')";
}
else if (isset($_POST["nn"])){
    $sql= "SELECT * FROM tbl_lehrer
    WHERE ( Nachname LIKE '%" . $nn . "%')";
}
else {
    $sql= "SELECT * FROM tbl_lehrer"; //wenn nichts eingegeben wurde, wählen wir alles aus
}

$result= mysqli_query($conn, $sql);
echo"<table>";
echo"<tr><th>ID</th><th>Vorname</th><th>Nachname</th></tr>";
if($result->num_rows > 0){
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr> <td>" . $row["ID_lehrer"] . "</td>";
        echo "<td>" .$row ["Vorname"] . "</td>";
        echo "<td>" . $row["Nachname"]. "</td>";
        echo "</tr>";
        
        //Konkatenation
        //concat
        //concation / concatenation
        
    }
}
else{
    echo "<h1> Konnte nicht gefunden werden! </h1>";
}

echo"</table>";
?>




$conn= new mysqli ("bla","bla","bla","bla",);
    if($conn-> connect_errno>0){
        die($conn-> connect_error);
    }
    else{
        $sql="SELECT * FROM tbl_Lehrer";
        $result= mysqli_query($conn, $sql);
        mysqli_fetch_assoc

    }