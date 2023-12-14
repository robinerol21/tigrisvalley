<!DOCTYPE html>
<html>
<head>
  <title>View Data</title>
  
</head>
<body>

<h2>Stored Data</h2>

<?php
// Database connection parameters
$host = "localhost";
$dbname = "tigris_valley";
$username = "root";
$password = "";

// Create connection
$mysqli= new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve data from the form_data table
$sql = "SELECT * FROM camp_area";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Display data in a table
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Last Name</th><th>Start Date</th><th>End Date</th><th>Money</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["start_date"] . "</td>";
        echo "<td>" . $row["end_date"] . "</td>";
        echo "<td>" . $row["money"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data available";
}

// Close connection
$mysqli->close();
?>

</body>
</html>
