<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h1>" . $_POST["username"]. "</h1>";
    echo "<h1>" . $_POST["password"] . "</h1>" ;
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "<h1>" . $_GET["username"]. "</h1>";
    echo "<h1>" . $_GET["password"] . "</h1>";
}
    echo "The day you selected: ";
    foreach ($_POST["day"] as $day) {
        echo $day . "<br>";
    }


    echo "<br/>";
    if ($_POST["pineapple"] == "Yes") {
        echo "You chose correctly: you hate pineapple on pizza";
    } else {
        echo "That's a crime against humanity to put pineapple on pizza";
    }



?>

