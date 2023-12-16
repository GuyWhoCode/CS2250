<!-- http://localhost/test.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border: 1px solid;
        }
    </style>
</head>
<body>
    <h1>This is a header</h1>
    <?php
    // This is a comment
        $text = "Hello World";
        $number1 = 1;
        $number2 = 2;
        echo "The sum is " . $number1 + $number2;
        echo "<p>This is a paragraph from PHP! " . $text . "</p>";

        $whatever = date("H");
        if ($whatever < 10) {
            echo "Have a good morning!";
        } elseif ($whatever < 20) {
            echo "Have a good day!";
        } else {
            echo "Have a good night!";
        }
    ?>


    <ul>
        <?php
            function printListItem($number) {
                echo "<li> List Item #" . $number . "</li>";
            }


            for ($i = 1; $i <= 5; $i++) {
                printListItem($i);
            }

            $cars = array("Tesla", "Mustang", "Camry");
            foreach ($cars as $car) {
                echo "<li>" . $car . "</li>";
            }

            echo "<br>";

            for ($i = 0; $i < count($cars); $i++) {
                echo "Index " . $i . "<br>"; 
            }
        ?>
    </ul>

    <table>
        <?php
            $rows = 8;
            $cols = 8;

            for ($i = 0; $i < $cols; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $rows; $j++) {
                    if (($j % 2 == 0 and $i % 2 == 1) or ($j % 2 == 1 and $i % 2 == 0)) {
                        echo "<td height='64px' width='64px' style='border: 1px solid'> </td>";
                    } else {
                        echo "<td height='64px' width='64px' style='border: 1px solid; background-color: black'> </td>";
                    }
                }
                echo "</tr>";
            }
        ?>

    </table>




</body>
</html>