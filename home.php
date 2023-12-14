<?php
$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST")
{
  $mysqli = require __DIR__ . "/database.php";
  $sql = sprintf("SELECT * FROM camp_area WHERE id = '%s'", $mysqli->real_escape_string($_POST["id"]));
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();

  
  $is_invalid = true;
}
?>
 <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style/home.css">
  <title>User Input Form</title>
</head><body>

  <form action="script.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" required><br><br>

    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" required><br><br>

    <label for="money">Money:</label>
    <input type="text" id="money" name="money" required><br><br>

    <input type="submit" value="Submit">
  </form>

</body>
</html>
