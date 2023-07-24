<?php
require("./includes/config.inc.php");
require("./includes/common.inc.php");
require("./includes/conn.inc.php");
if("TESTMODUS"){
	echo("TESTMODUS AN");
}

?>
<!doctype html>
<html lang = "de">

<body>
    <ol>
        <?php    
              $sql = "
            SELECT 
                *
            FROM tbl_user
            ";
            if(count($_POST)>0){
                $sql .= "WHERE Nachname = '" . $_POST["NN"] . "'";
            };
            $sql .= "ORDER BY Nachname ASC, Vorname ASC
            ";
            
            $conn = mysqli_connect("DB");

            $datensaetze = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
            while($ds = $datensaetze->fetch_object()){
                echo('
                <li>' . $ds->Emailadresse . ' (' . $ds-> Password . '): ' . $ds->Nachname . ''
                );
            }

        /*
        if(count($_POST)>0 && strlen($_POST["NN"]>0)) {
        $sql = "
        SELECT 
            *
        FROM tbl_user
        WHERE Nachname = '" . $_POST["NN"] . "'
        ORDER BY Nachname ASC, Vorname ASC
        ";
        }
        else{
            $sql = "
            SELECT 
                *
            FROM tbl_user
            ORDER BY Nachname ASC, Vorname ASC
            ";

        }

        
        $datensaetze = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
        while($ds = $datensaetze->fetch_object()){
            echo('
            <li>' . $ds->Emailadresse . ' (' . $ds-> Password . '): ' . $ds->Nachname . ''
            );
        }
*/
?>
        <li><?php echo $sql ?></li>
        
        <table> 
            <thead>
                <tr>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDUSER</th>
                </tr>
            </thead>
            </tbody>
            <?php
            $userliste = $conn->query($sql) or die("Fehler in der Query: " . $conn->error . "<br>" . $sql);
            while($user = $userliste->fetch_object()){
                echo($user . "<br>");
                /*
                echo('
                
                <tr>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDUSER</th>
                    <th scope="col">IDUSER</th>
                </tr>
                
            '); */
            }

            ?>
    </ol>