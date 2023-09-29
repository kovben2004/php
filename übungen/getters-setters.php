<?php
$name = "Tobias";
function getName(){ //auslesen
    global $name; 
    return $name; 
}
function setName($newName){ //verändern
    global $name;
    $name=$newName; 
}
$ausgabe = getname();
echo $ausgabe;
setname("Mortaza");
$ausgabe = getname();
echo $ausgabe;
?>
