<?php
include 'database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_REQUEST['name'];

  if (empty($name)) {
    echo "Name cannot be blank";
  }

  $sql = "INSERT INTO user(name) VALUES ('$name')";

  if (mysqli_query($mysqli, $sql)) {
    echo "<h3>New user is created!";
    header("refresh:2;url=index.php");
  } else {
    echo "Oh no, boo boo!";
  }
}
?>