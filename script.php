<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $money = $_POST["money"];

    // Database connection parameters
    $host = "localhost";
    $dbname = "tigris_valley";
    $username = "root";
    $password = "";

    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare and execute SQL insert statement
    $sql = "INSERT INTO camp_area (name, last_name, start_date, end_date, money)
    VALUES ('$name', '$last_name', '$start_date', '$end_date', '$money')";

    if ($mysqli->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Close connection
    $mysqli->close();
} else {
    echo "Form not submitted.";
}
?>
<p><a href="viewdata.php"> Show the List </a></p>
</body>
</html>

