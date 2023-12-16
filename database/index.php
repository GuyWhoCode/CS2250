
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'database.php'; ?>
    <form action="whatever.php" method="post">
        <label for="">Create a new user</label>
        <input type="text" name="name">
        <input type="submit" value="Create">
    </form>

    <?php 
        echo "<ul>";
        $sql = "SELECT * FROM user";
        $users =  execute_query($mysqli, $sql);
        if ($users -> num_rows > 0) {
            while ($row = $users -> fetch_assoc()) {
                echo "<li>" . $row['name'] . "</li>";
            }
        }

        echo "</ul>";
    ?>
</body>
</html>