<?php
/* Host name of the MySQL server */
$host = 'localhost';

/* MySQL account username */
$user = 'myUser';

/* MySQL account password */
$passwd = 'password';

/* The schema you want to use */
$schema = 'mySchema';

/* Connection with MySQLi, procedural-style */
$mysqli = mysqli_connect($host, $user, $passwd, $schema);

/* Check if the connection succeeded */
if (!is_null($mysqli->connect_error)) {
  echo 'Connection failed<br>';
  echo 'Error number: ' . mysqli_connect_errno() . '<br>';
  echo 'Error message: ' . mysqli_connect_error() . '<br>';
  die();
}

function executeQuery($mysqli, $users_query)
{
  // Execute the SQL query 
  if (!mysqli_query($mysqli, $users_query)) {
    echo 'Query error: ' . mysqli_error($mysqli);
    die();
  }
}

$users_query =
  "CREATE TABLE IF NOT EXISTS user (
  id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name varchar(255) NOT NULL
  )";
executeQuery($mysqli, $users_query)

  ?>