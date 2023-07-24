<?php
require('includes/config.inc.php');
require('includes/common.inc.php');
require('includes/conn.inc.php');
?>

<!DOCTYPE html>
<html>
    <header>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kunden</title>
        <link rel="stylesheet" href="style.css">
    </header>
    <body>
        <h1>Kunden</h1>

        <nav>
            <ul>
                <li><a href="index.html">Startseite</a></li>
                <li><a href="mitarbeiter.php">Mitarbeiter</a></li>
            </ul>
        </nav>

        <?php
            $sql = '
                SELECT
                    *,
                    (
                        SELECT SUM(TIMESTAMPDIFF(SECOND,Startzeitpunkt, Endzeitpunkt))
                        FROM tbl_einsatz
                        WHERE(
                            FIDKunde=IDKunde
                        )
                    )AS sum,
                    (
                        SELECT MIN(Startzeitpunkt)
                        FROM tbl_einsatz
                        WHERE(
                            FIDKunde=IDKunde
                        )
                    )AS minT,
                    (
                        SELECT MAX(Endzeitpunkt)
                        FROM tbl_einsatz
                        WHERE(
                            FIDKunde=IDKunde
                        )
                    )AS maxT
                FROM tbl_kunden
                ORDER BY Vorname ASC, Nachname ASC
            ';

            $kunden = $conn->query($sql);
            if($kunden===false){
                if(TESTMODE){
                    die('Fehler in der Query: ' . $conn->error . '<br>' . $sql);
                }else{
                    header('Location: errors/db_query?error=' . $conn->error);
                }
            }

            while($kunde = $kunden->fetch_object()){
                $summe = $kunde->sum;
                $min = strtotime($kunde->minT);
                $max = strtotime($kunde->maxT);

                echo('
                    <li>
                        ' . $kunde->Vorname . ' ' . $kunde->Nachname . ' (' . $kunde->Adresse . ' ' . $kunde->PLZ . ' ' . $kunde->Ort . ' | ' . $kunde->Telno . ' &bull; ' . $kunde->Email . '):
                        <ul>
                            <li>benötigte Zeit (Halbstunden aufgerundet): ' . ceil($summe/60/30) . '</li>
                            <li>Stundenanzahl: ' . ($summe/3600) . '</li>
                            <li>Kosten: EUR ' . ceil($summe/60/30)*30 . '</li>
                            <li>von ' . date('d.m.Y H:i',$min) . ' bis ' . date('d.m.Y H:i',$max) . '</li>
                        </ul>
                    </li>
                ');
            }
        ?>
    </body>
</html>

# Author: https://justpaste.it/mb3443