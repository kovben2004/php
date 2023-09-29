<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>sessoin</title>
</head>
<body>
    <div>
        <form method="post">
            <p>Username: <input type="text" name= "username" placeholder= "Dein Benutzname"></p>
            <p>Password: <input type="password" name= "password" placeholder= "Dein Passwort"></p>
            <input type="submit" name= "submit" value="Senden">
        </form>  
    </div>









<?php
$username= "Mortaza";
$password= 123;

session_start();

function is_authenticated() {
    if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true){
        $username = $_POST["username"];
        return true;
    }else{
        return false;
    }
}



if (isset($_POST["submit"])) {
    if ($_POST["username"] != false) {
        // wenn wir hier schon drin waren
        $wir_waren_hier = true
        if ($username == $_POST["username"] && $password==$_POST["password"]){
          $_SESSION['authenticated'] = true;
        }
    }
}
if(is_authenticated() == true){
    echo  "Willkommen $username";
}
else{
    if ($wir_waren_hier == true){
        echo "Verpiss dich";
        $wir_waren_hier = false;
    }
    // nur dann schreiben wir hier eine gemeine Nachricht 
    
}


// eingegebenes Passwort vergleichen mit einem string



?>  

</body>

</html>  