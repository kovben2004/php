<?php
$host="localhost";
$username="root";
$password="";
$db_name="db_schule";

$conn= new mysqli("$host", "$username", "$password", "$db_name");
if ($conn -> connect_errno>0){
    die("Fehler: . $conn -> connect_error");
}
else{
    $sql= "SELECT * FROM tbl_lehrer";
    $result= mysqli_query ($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)){
            echo $row['Vorname'];
        }
    }
}

?>