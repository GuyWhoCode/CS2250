<?php
    $choice = $_GET["choice"];
    $computer = rand(1,3);
    if ($computer == 1) {
        $computer = "Rock";
    } elseif ($computer == 2) {
        $computer = "Paper";
    } else {
        $computer = "Scissors";
    }

    echo "You chose: " . $choice . "<br>";
    echo "Computer chose: " . $computer . "<br>";

    if ($choice == $computer) {
        echo "It's a tie!";
    } elseif ($choice == "Rock" && $computer == "Paper") {
        echo "You lose!";
    } elseif ($choice == "Rock" && $computer == "Scissors") {
        echo "You win!";
    } elseif ($choice == "Paper" && $computer == "Rock") {
        echo "You win!";
    } elseif ($choice == "Paper" && $computer == "Scissors") {
        echo "You lose!";
    } elseif ($choice == "Scissors" && $computer == "Rock") {
        echo "You lose!";
    } elseif ($choice == "Scissors" && $computer == "Paper") {
        echo "You win!";
    }


?>
