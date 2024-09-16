<?php
$servername = "localhost";
$username = "ceylonwe_ceylonw";  // Your database username
$password = "Ceylon1999##";      // Your database password
$dbname = "ceylonwe_weather_data";   // Your database name

$temperature = $_GET['temperature'];
$humidity = $_GET['humidity'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO weather_data (temperature, humidity) VALUES ('$temperature', '$humidity')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
