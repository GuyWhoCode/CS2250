<?php 
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_REQUEST['name'];
    if (empty($name)) {
        echo 'Please enter a name';
    } else {
        $sql = "INSERT INTO user (name) VALUES ('$name')";
        execute_query($mysqli, $sql);
        header("refresh:2, url=index.php");
    }
}

?>