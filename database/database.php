<?php 
$host = 'localhost';
$user = 'myUser';
$user_password = 'password';

$schema = 'mydb';

$mysqli = mysqli_connect($host, $user, $user_password, $schema);

if (!is_null($mysqli->connect_error)) {
    echo "Connection failed!";
} else {
    echo "Connection successful!";
}

$users_query = "CREATE TABLE IF NOT EXISTS user(id int(10) unsigned auto_increment PRIMARY KEY, name varchar(255) not null)";

function execute_query($mysqli, $query) {
    $result = mysqli_query($mysqli, $query);
    if ($result) {
        echo "Query executed successfully!";
        return $result;
    } else {
        echo "Error executing query!";
    }
}
execute_query($mysqli, $users_query);

?>

