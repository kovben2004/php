<html>
<form method="post" action="">
  <input type="text" name="search" placeholder="Search Lehrer">
  <input type="submit" name="submit" value="Search">
</form>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<style>
    
        th {
            color:green;
        }
        table th {
        border:2px solid black;
        }
        td {
        border:1px solid red;
        }
        </style>
</html>
<?php

$host="localhost";
echo "In der Datenbank konnte dies nicht gefunden werden";
$username="root";
$password="";
$db_name="db_schule";

$conn= new mysqli("$host", "$username", "$password", "$db_name" );

if($conn-> connect_errno>0){
   die("Fehler: " . $conn-> connect_error);
}


$sql= "SELECT * FROM tbl_schuler";
if (isset($_POST["search"])){
    $input = $_POST["search"];
    $sql .= " WHERE (Vorname LIKE '%" . $input . "%')";
}
// SELECT * FROM tbl_schuler
echo $sql;
if ($result->num_rows > 0) {
 $result= mysqli_query ($conn, $sql);
        echo "<table>" . "<h1> Tabele Schuler</h1>";
        echo "<tr><th>ID</th><th>Vorname Schuler</th><th>Nachname Schuler</th></tr>";  
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["ID_Schuler"] . "</td>";
            echo "<td>" . $row["Vorname"] . "</td>";
            echo "<td>" . $row["Nachname"] . "</td>"; 
            echo "</tr>";
    }
     echo "</table>" . "<br>";
}
else {
}


// $sql= "SELECT * FROM tbl_Lehrer";
// $result= mysqli_query ($conn, $sql);
// if ($result) {
//     echo "<table>"." <h1> Tabele Lehrer</h1>";
//     echo "<tr><th>ID</th><th>Vorname Lehrer</th><th>Nachname Lehrer</th></tr>";  
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "<tr>";
//         echo "<td>" . $row["ID_lehrer"] . "</td>";
//         echo "<td>" . $row["Vorname"] . "</td>";
//         echo "<td>" . $row["Nachname"] . "</td>"; 
//         echo "</tr>";
//     }
//     echo "</table>" . "<br>";
// }

// $sql= "SELECT * FROM tbl_Klassen";
// $result= mysqli_query ($conn, $sql);
// if ($result) {
//     echo "<table>" . "<h1> Tabele Klassen</h1>";
//     echo "<table>";
//     echo "<tr><th>ID_K</th><th>K_Name</th></tr>";  
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "<tr>";
//         echo "<td>" . $row["ID_Klassen"] . "</td>";
//         echo "<td>" . $row["Klassen_Name"] . "</td>";
//         echo "</tr>";
//     }
//     echo "<table>" . "<h1> Tabele Räume</h1>";
//     echo "</table>"  . "<br>";
// }

// $sql= "SELECT * FROM tbl_rooms";
// $result= mysqli_query ($conn, $sql);
// if ($result) {
//     echo "<table>";
//     echo "<tr><th>ID_Room</th><th>Bezeichnet</th></tr>";  
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "<tr>";
//         echo "<td>" . $row["ID_Raum"] . "</td>";
//         echo "<td>" . $row["Bez"] . "</td>";
//         echo "</tr>";
//     }
//     echo "</table>" . "<br>";
// }

// $sql= "SELECT * FROM tbl_junktion";
// $result= mysqli_query ($conn, $sql);
// if ($result) {
//     echo "<table>";
//     echo "<tr><th>FID_Lehrer</th><th>FID_Klasse</th><th>Ist Klassen Vorstand?</th></tr>";  
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo"<tr>
//             <td>" . $row["FID_Lehrer"] . "</td>
//             <td>" . $row["FID_Klasse"] . "</td>
//             <td>" . $row["Ist_KV"] . "</td>
//             </tr>"
//         ;
//     }
//     echo "</table>" . "<br>";
    
// }


// $host="localhost";
// $username="root";
// $password="";
// $db_name="db_schule";

// $conn= new mysqli("$host", "$username", "$password", "$db_name");
// if ($conn -> connect_errno>0) {
//     die("Fehler: . $conn -> connect_error");
// }
// else {
//     //echo "Connected";
// }


// $sql= "SELECT 
//     *
//     FROM tbl_lehrer"
// ;
// $result = mysqli_query ($conn, $sql);
// if ($result){
//     echo "<h2>LEHRER TABELLE</h2>";    
//     echo "<table>" . "<tr>" ;
//     echo "<tr><th>ID Lehrer</th><th>Vorname Lehrer</th><th>Nachname Lehrer</th><tr>";

//     while($row=mysqli_fetch_assoc($result)){
//        echo"<tr><td>".$row['ID_lehrer']."</td>";
//         echo"<td>".$row['Vorname']."</td>";
//         echo"<td>".$row['Nachname']."</td></tr>";
        
        

//     }
//     echo "</tr>" . "</table>".   "<br>";
// }


?>