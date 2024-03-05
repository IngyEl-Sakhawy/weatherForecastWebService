<?php
class Weather implements Weather_Interface {

    private $jsonString;
    private $cities;
    private $desiredCountryCode = "EG"; 

    public function __construct() {
        $this->jsonString = file_get_contents(__CITIES_FILE);
        $this->cities = json_decode($this->jsonString);
    }

    public function get_cities() {
        $filteredCities = array(); 

        foreach ($this->cities as $city) {
            if ($city->country == $this->desiredCountryCode) {
                $filteredCities[] = $city; 
            }
        }

        return $filteredCities;
    }

    public function get_weather($cityId) {
        // Initialize cURL session
        $curl = curl_init();
    
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?id=$cityId&lang=en&units=metric&APPID=5d7645dc8510d4b13bba5391ea65e66b";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
        ));
    
        $response = curl_exec($curl);

        curl_close($curl);

        $weatherData = json_decode($response, true);
        
        // print_r($weatherData);
        // exit;  

            if (isset($weatherData['main']) && isset($weatherData['wind']) && isset($weatherData['weather'])) {
                
            $temperature = $weatherData['main']['temp'];
            $tempMin = $weatherData['main']['temp_min'];
            $tempMax = $weatherData['main']['temp_max'];
            $humidity = $weatherData['main']['humidity'];
            $windSpeed = $weatherData['wind']['speed'];
            $weatherDescription = $weatherData['weather'][0]['description'];
            $weatherIcon = $weatherData['weather'][0]['icon'];
            $currentTime = date('Y-m-d H:i:s');
            
            return array(
                'name' => $weatherData['name'],
                'temperature' => $temperature,
                'temp_min' => $tempMin,
                'temp_max' => $tempMax,
                'humidity' => $humidity,
                'wind_speed' => $windSpeed,
                'description' => $weatherDescription,
                'icon' => $weatherIcon,
                'current_time' => $currentTime
            );
            } 
        
    
        
        
    }
    

    public function get_current_time() {
        
    }

    public function get_current_date() {
        
    }


}
