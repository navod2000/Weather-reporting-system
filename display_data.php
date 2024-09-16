<?php
$servername = "localhost";
$username = "ceylonwe_ceylonw";
$password = "Ceylon1999##";
$dbname = "ceylonwe_weather_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT temperature, humidity, timestamp FROM weather_data ORDER BY timestamp DESC";
$result = $conn->query($sql);

echo "<table border='1'>
<tr>
<th>Temperature (°C)</th>
<th>Humidity (%)</th>
<th>Timestamp</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['temperature'] . "</td>";
    echo "<td>" . $row['humidity'] . "</td>";
    echo "<td>" . $row['timestamp'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$conn->close();
?>
