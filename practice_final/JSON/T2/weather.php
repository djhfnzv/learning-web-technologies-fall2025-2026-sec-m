<?php
header("Content-Type: application/json");

// Capture city parameter from GET
$city = isset($_GET['city']) ? $_GET['city'] : 'New York';

// Sample 7-day forecast data for 5 cities
$forecasts = [
    "New York" => [
        ["date"=>"2026-01-12","temp_high"=>45,"temp_low"=>32,"condition"=>"Sunny","humidity"=>60,"wind_speed"=>10,"icon"=>"☀️"],
        ["date"=>"2026-01-13","temp_high"=>48,"temp_low"=>35,"condition"=>"Cloudy","humidity"=>65,"wind_speed"=>8,"icon"=>"☁️"],
        ["date"=>"2026-01-14","temp_high"=>42,"temp_low"=>30,"condition"=>"Snow","humidity"=>70,"wind_speed"=>12,"icon"=>"❄️"],
        ["date"=>"2026-01-15","temp_high"=>40,"temp_low"=>28,"condition"=>"Rain","humidity"=>80,"wind_speed"=>15,"icon"=>"🌧️"],
        ["date"=>"2026-01-16","temp_high"=>46,"temp_low"=>33,"condition"=>"Sunny","humidity"=>55,"wind_speed"=>7,"icon"=>"☀️"],
        ["date"=>"2026-01-17","temp_high"=>50,"temp_low"=>36,"condition"=>"Sunny","humidity"=>50,"wind_speed"=>6,"icon"=>"☀️"],
        ["date"=>"2026-01-18","temp_high"=>44,"temp_low"=>31,"condition"=>"Cloudy","humidity"=>65,"wind_speed"=>9,"icon"=>"☁️"]
    ],
    "Los Angeles" => [
        ["date"=>"2026-01-12","temp_high"=>75,"temp_low"=>60,"condition"=>"Sunny","humidity"=>40,"wind_speed"=>5,"icon"=>"☀️"],
        ["date"=>"2026-01-13","temp_high"=>72,"temp_low"=>58,"condition"=>"Sunny","humidity"=>45,"wind_speed"=>7,"icon"=>"☀️"],
        ["date"=>"2026-01-14","temp_high"=>70,"temp_low"=>55,"condition"=>"Cloudy","humidity"=>50,"wind_speed"=>6,"icon"=>"☁️"],
        ["date"=>"2026-01-15","temp_high"=>68,"temp_low"=>54,"condition"=>"Rain","humidity"=>60,"wind_speed"=>10,"icon"=>"🌧️"],
        ["date"=>"2026-01-16","temp_high"=>74,"temp_low"=>59,"condition"=>"Sunny","humidity"=>42,"wind_speed"=>5,"icon"=>"☀️"],
        ["date"=>"2026-01-17","temp_high"=>76,"temp_low"=>61,"condition"=>"Sunny","humidity"=>38,"wind_speed"=>4,"icon"=>"☀️"],
        ["date"=>"2026-01-18","temp_high"=>69,"temp_low"=>55,"condition"=>"Cloudy","humidity"=>50,"wind_speed"=>6,"icon"=>"☁️"]
    ],
    "Chicago" => [
        ["date"=>"2026-01-12","temp_high"=>30,"temp_low"=>18,"condition"=>"Snow","humidity"=>70,"wind_speed"=>15,"icon"=>"❄️"],
        ["date"=>"2026-01-13","temp_high"=>32,"temp_low"=>20,"condition"=>"Cloudy","humidity"=>65,"wind_speed"=>12,"icon"=>"☁️"],
        ["date"=>"2026-01-14","temp_high"=>28,"temp_low"=>15,"condition"=>"Snow","humidity"=>75,"wind_speed"=>18,"icon"=>"❄️"],
        ["date"=>"2026-01-15","temp_high"=>25,"temp_low"=>10,"condition"=>"Sunny","humidity"=>55,"wind_speed"=>10,"icon"=>"☀️"],
        ["date"=>"2026-01-16","temp_high"=>29,"temp_low"=>16,"condition"=>"Cloudy","humidity"=>60,"wind_speed"=>12,"icon"=>"☁️"],
        ["date"=>"2026-01-17","temp_high"=>31,"temp_low"=>19,"condition"=>"Sunny","humidity"=>50,"wind_speed"=>8,"icon"=>"☀️"],
        ["date"=>"2026-01-18","temp_high"=>27,"temp_low"=>14,"condition"=>"Snow","humidity"=>70,"wind_speed"=>15,"icon"=>"❄️"]
    ],
    "Miami" => [
        ["date"=>"2026-01-12","temp_high"=>85,"temp_low"=>70,"condition"=>"Sunny","humidity"=>60,"wind_speed"=>8,"icon"=>"☀️"],
        ["date"=>"2026-01-13","temp_high"=>88,"temp_low"=>72,"condition"=>"Sunny","humidity"=>55,"wind_speed"=>10,"icon"=>"☀️"],
        ["date"=>"2026-01-14","temp_high"=>90,"temp_low"=>75,"condition"=>"Rain","humidity"=>70,"wind_speed"=>12,"icon"=>"🌧️"],
        ["date"=>"2026-01-15","temp_high"=>87,"temp_low"=>71,"condition"=>"Sunny","humidity"=>50,"wind_speed"=>7,"icon"=>"☀️"],
        ["date"=>"2026-01-16","temp_high"=>85,"temp_low"=>69,"condition"=>"Sunny","humidity"=>48,"wind_speed"=>6,"icon"=>"☀️"],
        ["date"=>"2026-01-17","temp_high"=>89,"temp_low"=>74,"condition"=>"Cloudy","humidity"=>55,"wind_speed"=>8,"icon"=>"☁️"],
        ["date"=>"2026-01-18","temp_high"=>84,"temp_low"=>70,"condition"=>"Sunny","humidity"=>50,"wind_speed"=>5,"icon"=>"☀️"]
    ],
    "Seattle" => [
        ["date"=>"2026-01-12","temp_high"=>50,"temp_low"=>38,"condition"=>"Rain","humidity"=>80,"wind_speed"=>10,"icon"=>"🌧️"],
        ["date"=>"2026-01-13","temp_high"=>48,"temp_low"=>35,"condition"=>"Cloudy","humidity"=>70,"wind_speed"=>8,"icon"=>"☁️"],
        ["date"=>"2026-01-14","temp_high"=>46,"temp_low"=>33,"condition"=>"Rain","humidity"=>85,"wind_speed"=>12,"icon"=>"🌧️"],
        ["date"=>"2026-01-15","temp_high"=>45,"temp_low"=>32,"condition"=>"Sunny","humidity"=>65,"wind_speed"=>7,"icon"=>"☀️"],
        ["date"=>"2026-01-16","temp_high"=>47,"temp_low"=>34,"condition"=>"Cloudy","humidity"=>70,"wind_speed"=>9,"icon"=>"☁️"],
        ["date"=>"2026-01-17","temp_high"=>49,"temp_low"=>36,"condition"=>"Rain","humidity"=>75,"wind_speed"=>11,"icon"=>"🌧️"],
        ["date"=>"2026-01-18","temp_high"=>50,"temp_low"=>37,"condition"=>"Sunny","humidity"=>60,"wind_speed"=>8,"icon"=>"☀️"]
    ]
];

$data = [
    "city" => $city,
    "forecast" => isset($forecasts[$city]) ? $forecasts[$city] : []
];

echo json_encode($data);
?>
