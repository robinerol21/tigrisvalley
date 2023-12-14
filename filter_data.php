<?php
$host = "localhost";
$dbname = "tigris_valley";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host, username: $username, password: $password, database: $dbname);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$name_filter = $_POST['name_filter'];
$start_date_filter = $_POST['start_date_filter'];
$end_date_filter = $_POST['end_date_filter'];

$sql = "SELECT * FROM camp_area WHERE name LIKE '%$name_filter%' AND start_date >= '$start_date_filter' AND end_date <= '$end_date_filter'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Last Name</th><th>Start Date</th><th>End Date</th><th>Money</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td>" . $row["money"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$mysqli->close();
?>