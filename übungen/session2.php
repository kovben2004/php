<?php
// Start PHP Session
// session_start();
require "session_3.php";
print_r ($_SESSION);
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store post data in session variables
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['color'] = $_POST['color'];
    $_SESSION['pet'] = $_POST['pet'];
    $_SESSION['like1'] = $_POST['like1'];
    $_SESSION['like2'] = $_POST['like2'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Preferences</title>
</head>
<body>
    <?php
    // Check if session variables are set
    if(isset($_SESSION['name']) && isset($_SESSION['color']) && isset($_SESSION['pet']) 
        && isset($_SESSION['like1']) && isset($_SESSION['like2'])) {
        // Output stored data
        echo "Your name is " . $_SESSION['name'] . " and your favorite color is " . $_SESSION['color'] . ".";
        echo " You like " . $_SESSION['pet'] . ", " . $_SESSION['like1'] . ", and " . $_SESSION['like2'] . ".";
        echo ("<br>" . "You have visited this website " . $_SESSION['visit'] . "times today.");
        $_SESSION['visit']+=1;
    }
    else {
        echo('
            <!-- Output form to gather data -->
            <form method="post">
                Name: <input type="text" name="name" required><br>
                Favorite Color: <input type="text" name="color" required><br>
                Pet: <input type="text" name="pet" required><br>
                Like 1: <input type="text" name="like1" required><br>
                Like 2: <input type="text" name="like2" required><br>
                <input type="submit">     
            </form>
        ');
        $_SESSION['visit'] = 1;
        $_POST = array(); // clear post array
    }
    ?>


    
</body>
</html>