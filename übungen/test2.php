<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UFF-8">
    <title>test 2 </title>
</head>
<body>

<h1></h1>

<div>

    <form method="post">

        <p>Username: <input type= "text" name="User" id="txt"></p>
        <p>Password: <input type= "text" name="Pass" id="txt"></p>
        <p><input type= "submit" name="submit" id="sub"></p>

    </form>

</div>

<?php

if (!empty($_POST["User"])){
    print_r ($_POST);
}
else if (empty($_POST["User"])){
    echo "Halllloooo! Ohne Username??!!";
}







?>
</body>
</html>