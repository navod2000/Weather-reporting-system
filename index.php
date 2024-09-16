<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Data</title>
    <style>
        body {
            background-color: #1e1e1e;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        .weather-container {
            background-color: #2c2c2c;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        .weather-header {
            margin-bottom: 20px;
        }
        .weather-header h2 {
            font-size: 1.5rem;
            margin-bottom: 5px;
            color: #fff;
        }
        .weather-header p {
            margin: 0;
            font-size: 0.9rem;
            color: #ccc;
        }
        .current-weather {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .current-weather img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }
        .current-weather div {
            text-align: left;
        }
        .current-weather div h1 {
            font-size: 2.5rem;
            margin: 0;
            color: #fff;
        }
        .current-weather div p {
            margin: 0;
            font-size: 1rem;
            color: #ccc;
        }
        .forecast {
            display: flex;
            justify-content: space-between;
        }
        .forecast .day {
            text-align: center;
            color: #ddd;
        }
        .forecast .day img {
            width: 30px;
            height: 30px;
        }
        .forecast .day p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div class="weather-container">
    <div class="weather-header">
        <h2>Your Location: City, Country</h2>
        <p>Wind: 13 kmph | Precip: 0 mm | Pressure: 1022 mb</p>
    </div>

    <?php
    $servername = "localhost";
    $username = "ceylonwe_ceylonw";
    $password = "Ceylon1999##";
    $dbname = "ceylonwe_weather_data";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT temperature, humidity, timestamp FROM weather_data ORDER BY timestamp DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='current-weather'>";
            echo "<img src='https://img.icons8.com/ios-filled/50/ffffff/sun.png' alt='Sunny'>";
            echo "<div>";
            echo "<h1>" . $row['temperature'] . "°C</h1>";
            echo "<p>Sunny</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='current-weather'>";
        echo "<p>No data available</p>";
        echo "</div>";
    }

    $conn->close();
    ?>

    <div class="forecast">
        <div class="day">
            <img src="https://img.icons8.com/ios/50/ffffff/rain.png" alt="Rainy">
            <p>SAT</p>
            <p>20°C</p>
        </div>
        <div class="day">
            <img src="https://img.icons8.com/ios/50/ffffff/partly-cloudy-day.png" alt="Partly Cloudy">
            <p>SUN</p>
            <p>20°C</p>
        </div>
        <div class="day">
            <img src="https://img.icons8.com/ios/50/ffffff/rain.png" alt="Rainy">
            <p>MON</p>
            <p>22°C</p>
        </div>
        <div class="day">
            <img src="https://img.icons8.com/ios/50/ffffff/rain.png" alt="Rainy">
            <p>TUE</p>
            <p>23°C</p>
        </div>
        <div class="day">
            <img src="https://img.icons8.com/ios/50/ffffff/clouds.png" alt="Cloudy">
            <p>WED</p>
            <p>18°C</p>
        </div>
    </div>
</div>

</body>
</html>
