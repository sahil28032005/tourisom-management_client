<?php
session_start();
if (!isset($_SESSION['userName'])) {
    // User is not logged in, redirect to login page
    header("Location: navbar.php");
    exit(); // Stop further execution
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .flightsInformation {
            margin-top: 200px;
        }

        .flight-card {
            display: flex;
            align-items: center;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .flight-logo {
            width: 80px;
            height: 80px;
            margin-right: 20px;
        }

        .flight-details {
            flex-grow: 1;
        }

        .flight-details h3 {
            margin: 0;
        }

        .flight-price {
            font-weight: bold;
            color: green;
        }

        .header {
            width: fit-content;
            margin: auto;
        }
    </style>
</head>

<body>
    <?php
    include 'navBar.php';
    ?>
    <div class="flightsInformation">
        <h3 class="header">Nearby Airports</h3>
        <div class="flight-card">
            <img class="flight-logo" src="airline_logo.jpg" alt="Airline Logo">
            <div class="flight-details">
                <h3>Flight Name or Number</h3>
                <p>Departure: Departure Airport Code - Departure Time</p>
                <p>Arrival: Arrival Airport Code - Arrival Time</p>
            </div>
            <div class="flight-price">$XXX</div>
        </div>
        <?php

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://sky-scrapper.p.rapidapi.com/api/v1/flights/getNearByAirports?lat=19.242218017578125&lng=72.85846156046128",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: sky-scrapper.p.rapidapi.com",
                "X-RapidAPI-Key: b7197027d6mshb817a8a36a4f3adp18a590jsnee409e3a0a55"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $responseData = json_decode($response, true);
            if($responseData['status']){
                echo $responseData['data']['nearby']['presentation']['title'];
            }
            else{
                echo "something went wrong";
            }
        } ?>
    </div>
</body>

</html>