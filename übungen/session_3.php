<?php

session_start();

print_r ($_SESSION);
echo "<br>";
# $_SESSION["name"] = "john";
# $_SESSION["nachname"] = "doe";
# print_r ($_SESSION);
// 1) überprüfen ob zugriff erlaubt werden soll?
// 2) wo wir wissen dass zugriff erlaubt werden soll, da schreiben wir zugriff "true" ins session array
// 3) wir überprüfen ob zugriff im session array existiert && "true" true ist
// 4) wenn ja " echo "Hallo  $username_korrekt";", sonst "access denied" 
?>


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
            <p>TelefoNr: <input type="text" name= "tel" placeholder= "Deine Telefonnummer"></p>
            <input type="submit" name= "submit" value="Senden">
        </form>  
    </div>

<?php

$username_korrekt="john";
$password_korrekt="doe";
$tel_korrekt= "1234";

if (isset ($_POST["username"])) {
    $username = ($_POST["username"]);
    $password = ($_POST["password"]);
    $tel = ($_POST["tel"]);

    if($username == $username_korrekt && $password == $password_korrekt && $tel == $tel_korrekt){
        //setzen
        $_SESSION["auth"] = true;
    }

    else {
        echo "Invalid! Try agaian";
    }

    // auslesen 
    // wenn authenticated dann "Hallo"
}

if($_SESSION["auth"] == true){
    echo  "Hallo Mr. $username_korrekt!";

}
?>
    </body>

</html>  