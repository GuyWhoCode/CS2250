<html>

<body>

  <?php include 'database.php'; ?>

  <form action="query.php" method="post">
    <label>Create a new user</label>
    <input type="text" name="name" id="name">
    <input type="submit" value="Create">
  </form>

  <?php
  $sql = "SELECT * from user";
  $users = mysqli_query($mysqli, $sql);
  echo "<ul>";
  if ($users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {
      printf("<li>%s</li>", $row["name"]);
    }
  } else {
    printf('No record found.<br />');
  }
  echo "</ul>";
  ?>
</body>

</html>