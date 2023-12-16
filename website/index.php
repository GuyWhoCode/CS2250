<!DOCTYPE html>
<html lang="en">
<?php 
$page = "Home"; 
include "styles/head.php"; 
?>

<body>
    <h1>I am Home</h1>
    <?php include "styles/nav.php"; ?>

    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
    <!-- Runs the PHP file for you -->
        Name <input type="text" name="username">
        Password <input type="text" name="password">
        Monday <input type="checkbox" name="day[]" value="Monday">
        Tuesday <input type="checkbox" name="day[]" value="Tuesday">
        Wednesday <input type="checkbox" name="day[]" value="Wednesday">
        Thursday <input type="checkbox" name="day[]" value="Thursday">
        Friday <input type="checkbox" name="day[]" value="Friday">

        <br>
        Do you hate pineapple on pizza?
        Yes <input type="radio" name="pineapple" value="Yes">
        No <input type="radio" name="pineapple" value="No">
        <br>
        <input type="submit">
    </form>
    <br>

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





    <h1>Rock Paper Scissors</h1>
    <form action="game.php" method="get">
        <select name="choice">
            <option value="Rock">Rock</option>
            <option value="Paper">Paper</option>
            <option value="Scissors">Scissors</option>
        </select>
        <br>
        <input type="submit">
    </form>
</body>
</html>