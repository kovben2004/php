<?php
require("./includes/conn.inc.php");
$table = "<tr><td>a</td></tr><tr><td>b</td></tr>";
$conn = mysqli_connect('DB');
if(!$conn){
    die("could not connect" . mysqli_error());
}
echo 'Connected successfully';
?>


<!doctype html>
<html>
    <body>
        <table>
            <?php
            echo $table;