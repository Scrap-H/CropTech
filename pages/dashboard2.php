<?php

session_start();
if (($_SESSION['role'] !== 'ADMIN' && $_SESSION['role'] !== 'USER')) {
    header("Location: login.php");
    exit();
}

if(isset($_GET['logout'])){
    session_unset();
    session_destroy();


    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/Nav.css">
    <link rel="stylesheet" href="../style/LoginandRegistration.css">
    <link rel="stylesheet" href="../API\sensorReaction\displaybox.css">
    <link rel="stylesheet" href="../style/Popup.css">

    <script src="../js/model.js"></script>

    <link rel="icon" href="../assets\images\Icon.png" sizes="32x32" type="image/png">

</head>

<body class = "dashboard">
    
<!-- USER GREETING -->

<div class = "greeting">

<?php
$name = $_SESSION["User_firstName"];
echo '<h1> Hello '.$name. '</h1>';
?>

</div>

<div class = "DashboardContent">

<!-- Soil Moisture -->

<script>
            function fetchSensorVal(lastIndex){
                const url = '../../API/sensorReaction/ReadArr.php?lastIndex=' + lastIndex + '&t=' + new Date().getTime();
                fetch(url)
                .then(Response => Response.json())
                .then(data => {

                    if(data.value !== null){
                        document.getElementById('SensorVal1').textContent = data.value + "%";
                        document.getElementById('SensorVal2').textContent = data.value + "%"; 
                        setTimeout(() => fetchSensorVal(data.index), 30 * 60 * 1000 );
                                    
                    }else{
                        document.getElementById('SensorVal').textContent = "ERROR";
                    }
                })
                .catch(error => {

                    console.error('sensor fetch failed : ' , error);

                });
            }
            fetchSensorVal(0);
        </script>

<div onclick="boxtoggle('Soil1' , 'Soil2')" class="initialbox" id = "Soil1">
    <img width="100" height="100" src="https://img.icons8.com/ios/100/soil.png" alt="soil"/>
    <h2>Soil Moisture</h2>
    <h1 id="SensorVal1"></h1>
</div>

<div onclick="boxtoggle('Soil2' , 'Soil1')" class="expandedbox" id = "Soil2">
    <img width="100" height="100" src="https://img.icons8.com/ios/100/soil.png" alt="soil"/>
    <div class="moistureBox">
        <div>
            <h1>Current moisture </h1>
            <h1 id="SensorVal2"></h1>
        </div>
        <div class="sensorDividor">
            <div class="sensorContent">
                <h1> 1h </h1>
                <h1>dummy</h1>
            </div>
            <div class="sensorContent">
                <h1> 3h </h1>
                <h1>dummy</h1>
            </div>
            <div class="sensorContent">
                <h1> 5h </h1>
                <h1>dummy</h1>
            </div>
            <div class="sensorContent">
                <h1> 7h </h1>
                <h1>dummy</h1>
            </div>
        </div>
    </div>
</div>

<!-- Weather -->

<div onclick="boxtoggle('Weather1' , 'Weather2')" class="initialbox" id = "Weather1">

<img width="32" height="32" src="https://img.icons8.com/windows/32/chance-of-storm--v1.png" alt="chance-of-storm--v1"/>
<h2>Forecast</h2>
<h1 id="SensorVal1"></h1>
</div>

<div onclick="boxtoggle('Weather2' , 'Weather1')" class = "expandedbox" id = "Weather2">

<img width="100" height="100" src="https://img.icons8.com/ios/100/soil.png" alt="soil"/>
<div class = "moistureBox">

    <div>
    <h1>Weather Forecast </h1>
    <h1 id="SensorVal2"></h1>
    </div>

    <div class = "sensorDividor">

    <div class = "sensorContent">
        <h1> today </h1>
    </div>

    <div class = "sensorContent">
        <h1> tomorrow </h1>
    </div>

    <div class = "sensorContent">
        <h1> day after </h1>
    </div>

    </div>

</div>

</div>

<!-- Logout -->

<div class = "initialbox">

        <a href="?logout=true">
        <img width="100" height="100" src="https://img.icons8.com/ios/100/exit--v1.png" alt="exit--v1"/>
        <h1>LogOut</h1>
        </a>

        </div>

        
    </div>


</div>

</body>

<footer>
            <div class="footerText">
                <h1> Contact us </h1>
                <h5>email : mervin.chung729@gmail.com</h5>
                <h5>      : croptechad@gmail.com</h5>
            </div>
            

            <h6>2024 CropTech</h6>

        </footer>

</html>