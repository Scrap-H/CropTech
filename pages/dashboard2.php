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

<div  onclick="boxtoggle('Soil2' , 'Soil1' , 'solid3')" class = "ExpandBackground" id = "Soil2">
<div class="expandedbox" id = "solid3" >
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

        <div>
        <p>Status : </p>
    <div>GREEN</div>
    <div>YELLOW</div>
    <div>RED</div>
    </div>
    



    </div>
</div>
</div>


<!-- INCLUDE CONNECTION BUTTON FOR ARDUINO / RASBERRY PIE -->

<!-- Weather -->

<div onclick="boxtoggle('Weather1' , 'Weather2')" class="initialbox" id = "Weather1">

<img width="90" height="90" src="https://img.icons8.com/ios-glyphs/90/chance-of-storm.png" alt="chance-of-storm"/>
<h2>Forecast</h2>
<h1 id="SensorVal1"></h1>
</div>

<div onclick="boxtoggle('Weather2' , 'Weather1' , 'Weather3')" class = "ExpandBackground" id = "Weather2">
<div  class = "expandedbox" id = "Weather3" >

<img width="90" height="90" src="https://img.icons8.com/ios-glyphs/90/chance-of-storm.png" alt="chance-of-storm"/>
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

</div>

<!-- ADD FILLABLE TYPES SO THAT USERS CAN ENTER THEIR LOCATION FOR ACCURATE FORECAST BUT ALSO HAVE METHODS TO PREVENT THEM FROM ENTERING EXACT LOCATIONS IF THEY DON'T CHOOSE TO -->


<!-- Statistics -->

<div onclick="boxtoggle('Statistics1' , 'Statistics2')" class="initialbox" id = "Statistics1">

<img width="100" height="100" src="https://img.icons8.com/ios/100/combo-chart--v1.png" alt="combo-chart--v1"/>
<h2>Statistics</h2>
</div>

<div onclick="boxtoggle('Statistics2' , 'Statistics1' , 'Statistics3')" class = "ExpandBackground" id = "Statistics2">
<div  class = "expandedbox" id = "Statistics3" >

<img width="90" height="90" src="https://img.icons8.com/ios-glyphs/90/chance-of-storm.png" alt="chance-of-storm"/>
<div class = "moistureBox">

    <div>
    <h1>Weather Forecast </h1>
    <h1 id="SensorVal2"></h1>
    </div>

    <div class = "sensorDividor">

    <div class = "sensorContent">
        <h1> DISPLAY CHART  </h1>
    </div>

    </div>

</div>

</div>

</div>


<!-- Switch -->

<div onclick="boxtoggle('Switch1' , 'Switch2')" class="initialbox" id = "Switch1">

<img width="100" height="100" src="https://img.icons8.com/ios/100/switches.png" alt="switches"/>
<h2>Switch</h2>
</div>

<div onclick="boxtoggle('Switch2' , 'Switch1' , 'Switch3')" class = "ExpandBackground" id = "Switch2">
<div  class = "expandedbox" id = "Switch3" >

<img width="100" height="100" src="https://img.icons8.com/ios/100/switches.png" alt="switches"/>
<div class = "moistureBox">

    <div>
    <h1>Weather Forecast </h1>
    <h1 id="SensorVal2"></h1>
    </div>

    <div class = "sensorDividor">

    <div>
        <p>Status : </p>
    <div>GREEN</div>
    <div>YELLOW</div>
    <div>RED</div>
    </div>
    

    <div class = "sensorContent">
        <h1> Irrigation Switch  </h1>
        <button>On</button>
    </div>


    <!-- Connect Irrigation same as sensors -->

    </div>

</div>

</div>

</div>


<!-- Automation -->

<div onclick="boxtoggle('Automation1' , 'Automation2')" class="initialbox" id = "Automation1">

<img width="100" height="100" src="https://img.icons8.com/ios/100/robot-3.png" alt="robot-3"/>
<h2>Automation</h2>
</div>

<div onclick="boxtoggle('Automation2' , 'Automation1' , 'Automation3')" class = "ExpandBackground" id = "Automation2">
<div  class = "expandedbox" id = "Automation3" >

<img width="100" height="100" src="https://img.icons8.com/ios/100/robot-3.png" alt="robot-3"/>
<div class = "moistureBox">

    <div>
    <h1>Weather Forecast </h1>
    <h1 id="SensorVal2"></h1>
    </div>

    <div class = "sensorDividor">

    <div class = "sensorContent">
        <h1> Display timetable of Automation  </h1>
    </div>


    <!-- Connect Irrigation same as sensors -->

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