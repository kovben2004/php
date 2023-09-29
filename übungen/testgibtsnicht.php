<html>
<?php
$host="localhost";
$username="root";
$password="";
$db_name="db_schule";

$conn= new mysqli("$host", "$username", "$password", "$db_name" );

if($conn-> connect_errno>0){
   die("Fehler: " . $conn-> connect_error);
}
?>


<form method="post" action="">
  <input type="text" name="search" placeholder="Search Lehrer">
  <input type="submit" name="submit" value="Search">
</form>

<?php
$array_tabellen = ["tbl_schuler", "tbl_lehrer", "tbl_klassen"];


foreach($array_tabellen as $aktive_tabelle){
    $sql= "SELECT * FROM $aktive_tabelle";
    if (isset($_POST["search"])){
        $input = $_POST["search"];
        if($aktive_tabelle = "tbl_klassen"){
            $sql .= " WHERE (Klassen_Name LIKE '%" . $input . "%')";
        }
        else{
            $sql .= " WHERE (Vorname LIKE '%" . $input . "%')";
        }     
        //SELECT * FROM $aktive_tabelle WHERE (Vorname LIKE '%mm%');
        echo $sql . "<br>";
    }

    $result= mysqli_query ($conn, $sql);
    if ($result) {
            echo "<table>" . "<h1> Tabele" . $aktive_tabelle . "</h1>";
            echo "<tr><th>ID</th><th>Vorname</th><th>Nachname</th></tr>";  
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                if ($aktive_tabelle == "tbl_schuler"){
                    echo "<td>" . $row["ID_Schuler"] . "</td>";
                    echo "<td>" . $row["Vorname"] . "</td>";
                    echo "<td>" . $row["Nachname"] . "</td>"; 
                    echo "</tr>";
                }
                else if ($aktive_tabelle == "tbl_lehrer"){
                    echo "<td>" . $row["ID_lehrer"] . "</td>";
                    echo "<td>" . $row["Vorname"] . "</td>";
                    echo "<td>" . $row["Nachname"] . "</td>"; 
                    echo "</tr>";
                }
                else if ($aktive_tabelle == "tbl_klassen"){
                    echo "<td>" . $row["ID_Klassen"] . "</td>";
                    echo "<td>" . $row["Klassen_Name"] . "</td>";
                    echo "<td>" . $row["FID_Rooms"] . "</td>"; 
                    echo "</tr>";
                }
        }
        echo "</table>" . "<br>";
    }

}