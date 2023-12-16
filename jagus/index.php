<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        .errorMessage {
            color: #ff0000;
        }
    </style>
</head>

<body>
    <h1>Jason Agus</h1>
    <?php
    $username = "";
    $email = "";
    $confirmEmail = "";
    $password = "";
    $occupation = "";
    $bio = "";
    $favoritePizzaTopping = "";
    $pineappleChoice = "";
    $pcUsed = "";
    $favoriteWeather = [];

    $usernameErr = "";
    $emailErr = "";
    $confirmEmailErr = "";
    $passwordErr = "";
    $occupationErr = "";
    $bioErr = "";
    $pineappleChoiceErr = "";
    $pcUsedErr = "";
    $favoriteWeatherErr = "";


    function sanitizeInput($inputStr)
    {
        return stripcslashes(trim($inputStr));
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $usernameErr = "Username field is not complete";
        } else {
            $username = sanitizeInput($_POST["username"]);
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email field is not complete";
        } else {
            $email = sanitizeInput($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["confirmEmail"])) {
            $confirmEmailErr = "Confirm Email field is not complete";
        } else {
            $confirmEmail = sanitizeInput($_POST["confirmEmail"]);
            if (!filter_var($confirmEmail, FILTER_VALIDATE_EMAIL)) {
                $confirmEmailErr = "Invalid email format";
            }
        }

        if ($confirmEmail != $email) {
            $confirmEmailErr .= "<br> The inputs are not the same";
            $emailErr .= "<br> The inputs are not the same";
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password field is not complete";
        } else {
            $password = sanitizeInput($_POST["password"]);
        }

        if (empty($_POST["occupation"])) {
            $occupationErr = "Occupation field is not complete";
        } else {
            $occupation = sanitizeInput($_POST["occupation"]);
        }

        if (empty($_POST["bio"])) {
            $bio = "";
        } else {
            $bio = sanitizeInput($_POST["bio"]);
        }

        if (empty($_POST["pineappleChoice"])) {
            $pineappleChoiceErr = "Pineapple Choice field is not complete";
        } else {
            $pineappleChoice = sanitizeInput($_POST["pineappleChoice"]);
        }

        if (empty($_POST["pcUsed"])) {
            $pcUsedErr = "PC Used field is not complete";
        } else {
            $pcUsed = sanitizeInput($_POST["pcUsed"]);
        }

        if (empty($_POST["weather"])) {
            $favoriteWeatherErr = "Favorite Weather field is not complete";
        } else {
            $favoriteWeather = $_POST["weather"];
        }

        $favoritePizzaTopping = $_POST["favoritePizzaTopping"];
    }

    ?>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="username"> Username:</label>
        <input type="text" placeholder="Enter username" name="username" id="username" autocomplete="off" value=<?php echo $username ?>>
        <span class="errorMessage">
            <?php echo $usernameErr ?>
        </span>
        <br />
        <label for="email"> Email: </label>
        <input type="text" placeholder="Enter email" name="email" id="email" autocomplete="off" value=<?php echo $email ?>>
        <span class="errorMessage">
            <?php echo $emailErr ?>
        </span>
        <br />
        <label for="confirmEmail"> Confirm Email: </label>
        <input type="text" placeholder="Re-enter email" name="confirmEmail" id="confirmEmail" autocomplete="off"
            value=<?php echo $confirmEmail ?>>
        <span class="errorMessage">
            <?php echo $confirmEmailErr ?>
        </span>
        <br />
        <input type="button" value="Check Similarity!" onClick="checkSimilarity()" />
        <br />
        <br />

        <label for="password">Password:</label>
        <input type="password" placeholder="Enter password" name="password" id="password" value=<?php echo $password ?>>
        <span class="errorMessage">
            <?php echo $passwordErr ?>
        </span>
        <br />
        <label for="occupation">Occupation:</label>
        <input type="text" placeholder="Enter occupation" name="occupation" id="occupation" autocomplete="off"
            value=<?php echo $occupation ?>>

        <span class="errorMessage">
            <?php echo $occupationErr ?>
        </span>
        <br />
        <label for="bio">Biography:</label>
        <textarea name="bio" id="bio" cols="30" rows="10" placeholder="Enter Biography"><?php echo $bio ?></textarea>
        <span class="errorMessage">
            <?php echo $occupationErr ?>
        </span>

        <br />
        <hr />
        <br />
        <label for="favPizzaTopping"> Choose favorite pizza topping:</label>
        <select name="favoritePizzaTopping" id="favPizzaTopping">
            <option value="Cheese" <?php if ($favoritePizzaTopping == "Cheese")
                echo "selected" ?>>Cheese</option>
                <option value="Pepperoni" selected>Pepperoni</option>
                <option value="Mushrooms" <?php if ($favoritePizzaTopping == "Mushrooms")
                echo "selected" ?>>Mushrooms
                </option>
                <option value="Italian Sausage" <?php if ($favoritePizzaTopping == "Italian Sausage")
                echo "selected" ?>>
                    Italian
                    Sausage</option>
                <option value="Olives" <?php if ($favoritePizzaTopping == "Olives")
                echo "selected" ?>>Olives</option>
                <option value="Jalapenos" <?php if ($favoritePizzaTopping == "Jalapenos")
                echo "selected" ?>>Jalapenos
                </option>
            </select>
            <br />

            <h3>Pineapple Belongs on Pizza</h3>
            <span class="errorMessage">
            <?php echo $pineappleChoiceErr ?>
        </span><br>

        <label for="yes">Yes</label>
        <input type="radio" name="pineappleChoice" value="Yes" id="yes" <?php if (isset($pineappleChoice) and $pineappleChoice == "Yes")
            echo "checked" ?> /><br>
            <label for="no">No</label>
            <input type="radio" name="pineappleChoice" value="No" id="no" <?php if (isset($pineappleChoice) and $pineappleChoice == "No")
            echo "checked" ?> /><br>
            <label for="depends">It Depends</label>
            <input type="radio" name="pineappleChoice" value="It Depends" id="depends" <?php if (isset($pineappleChoice) and $pineappleChoice == "It Depends")
            echo "checked" ?> />

            <h3>Type of PC Used</h3>
            <span class="errorMessage">
            <?php echo $pcUsedErr ?>
        </span><br>
        <label for="laptop">Laptop</label>
        <input type="radio" name="pcUsed" id="laptop" value="Laptop" <?php if (isset($pcUsed) and $pcUsed == "Laptop")
            echo "checked" ?> /><br>
            <label for="tablet">Tablet</label>
            <input type="radio" name="pcUsed" id="tablet" value="Tablet" <?php if (isset($pcUsed) and $pcUsed == "Tablet")
            echo "checked" ?> /><br>
            <label for="desktop">Desktop</label>
            <input type="radio" name="pcUsed" id="desktop" value="Desktop" <?php if (isset($pcUsed) and $pcUsed == "Desktop")
            echo "checked" ?> />

            <br />
            <h3>Favorite Kind of Weather</h3>
            <span class="errorMessage">
            <?php echo $favoriteWeatherErr ?>
        </span><br>
        <label for="sunny">Sunny</label>
        <input type="checkbox" name="weather[]" id="sunny" value="sunny" <?php if (isset($favoriteWeather) and in_array("sunny", $favoriteWeather))
            echo "checked" ?> />
            <br>
            <label for="cloudy">Cloudy</label>
            <input type="checkbox" name="weather[]" id="cloudy" value="cloudy" <?php if (isset($favoriteWeather) and in_array("cloudy", $favoriteWeather))
            echo "checked" ?> />
            <br>
            <label for="rainy">Rainy</label>
            <input type="checkbox" name="weather[]" id="rainy" value="rainy" <?php if (isset($favoriteWeather) and in_array("rainy", $favoriteWeather))
            echo "checked"; ?> />
        <br>
        <label for="snowy">Snowy</label>
        <input type="checkbox" name="weather[]" id="snowy" value="snowy" <?php if (isset($favoriteWeather) and in_array("snowy", $favoriteWeather))
            echo "checked"; ?> />
        <br>
        <label for="foggy">Foggy</label>
        <input type="checkbox" name="weather[]" id="foggy" value="foggy" <?php if (isset($favoriteWeather) and in_array("foggy", $favoriteWeather))
            echo "checked"; ?> />
        <br>


        <br /><br />
        <button onclick="validate(event)">Validate Form Data</button>
        <!-- This will call the form action -->
        <br /><br />
        <input type="submit" value="Submit" />
    </form>
    <?php
    echo "<h2>User Input: </h2>";
    echo "Username = " . "'" . $username . "'" . "<br>";
    echo "Email = " . "'" . $email . "'" . "<br>";
    echo "Confirm Email = " . "'" . $confirmEmail . "'" . "<br>";
    echo "Password = " . "'" . $password . "'" . "<br>";
    echo "Occupation = " . "'" . $occupation . "'" . "<br>";
    echo "Biography = " . "'" . $bio . "'" . "<br>";
    echo "Favorite Pizza Topping = " . "'" . $favoritePizzaTopping . "'" . "<br>";
    echo "Pineapple Choice = " . "'" . $pineappleChoice . "'" . "<br>";
    echo "PC Used = " . "'" . $pcUsed . "'" . "<br>";
    for ($i = 0; $i < count($favoriteWeather); $i++) {
        echo "Favorite Weather = " . "'" . $favoriteWeather[$i] . "'" . "<br>";
    }
    ?>

    <script src="validateForm.js"></script>
</body>

</html>