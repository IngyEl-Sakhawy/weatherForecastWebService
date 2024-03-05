<?php
require("autoload.php");

ini_set('memory_limit', '-1');
$string = file_get_contents("resources/city.list.json");
$json_cities = json_decode($string, true);
$weather = new Weather();
$egyption_cities = $weather->get_cities();


if (isset($_POST["submit"])) {
    $cityId = $_POST["city"];
    $weatherData = $weather->get_weather($cityId);
    // $currentTime = $weather->get_current_time();
    // $currentDate = $weather->get_current_date();

    if ($weatherData !== false) {
        echo '<div>';
        echo '<h2>' . $weatherData['name'] . ' Weather Status</h2>';
        echo '<p>Description: ' . $weatherData['description'] . '</p>';
        echo '<p>' . $weatherData['current_time'] . '</p>';
        // echo '<p>' . $weatherData[] . '</p>';
        echo '<img src="http://openweathermap.org/img/w/' . $weatherData['icon'] . '.png" alt="Weather Icon">';
        echo '<p>Temperature: ' . $weatherData['temperature'] . ' °C</p>';
        echo '<p>Min Temperature: ' . $weatherData['temp_min'] . ' °C</p>';
        echo '<p>Max Temperature: ' . $weatherData['temp_max'] . ' °C</p>';
        echo '<p>Humidity: ' . $weatherData['humidity'] . '%</p>';
        echo '<p>Wind Speed: ' . $weatherData['wind_speed'] . ' m/s</p>';
        echo '</div>';
    } else {
        echo '<p>Error: Unable to fetch weather data.</p>';
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather Forecast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 250px;">
        <h1 style="margin-bottom: 30px;">Weather Forecast</h1>
        <form method="post" action="">
            <div class="row">
                
                <select class="col-lg-4" name="city">
                <option selected disabled>Select a city</option>
                <?php
                foreach ($egyption_cities as $city) {
                    echo '<option value="' . $city->id . '">' . $city->name . '</option>';
                }
                ?>
                </select>
                <button type="submit" class="btn btn-dark col-lg-3" name="submit">Get Weather</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

