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

<script>
    window.onload =function(){
        for(var i = 1 ; i <= 2 ; i++){
            boxtoggle('Soil2' , 'Soil1' , 'solid3');
            boxtoggle('Weather2' , 'Weather1' , 'Weather3');
            boxtoggle('Statistics2' , 'Statistics1' , 'Statistics3');
            boxtoggle('Switch2' , 'Switch1' , 'Switch3');
            boxtoggle('Automation2' , 'Automation1' , 'Automation3');
        }
    }
</script>

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

                        if(data.value <= 5){
                            condition = "Critical Low Check Irrigation";
                        }else if(data.value <= 20){
                            condition = "Low Moisture";
                        }else if(data.value <= 40){
                            condition = "Balance moisture";
                        }else if(data.value <= 60){
                            condition = "High Moisture";
                        }else if(data.value <= 80){
                            condition = "Extremely High Mositure";
                        }


                        document.getElementById('SensorVal1').textContent = data.value + "%" ;
                        document.getElementById('Condition1').textContent = condition;
                        document.getElementById('SensorVal2').textContent = data.value + "%"; 
                        document.getElementById('Condition2').textContent = condition;
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
    <h3 id="Condition1"></h3>
</div>

<div class = "ExpandBackground" id = "Soil2">
<div class="expandedbox" id = "solid3" >
    
    <img width="100" height="100" src="https://img.icons8.com/ios/100/soil.png" alt="soil"/>

    <div class="moistureBox">

    <img width="100" height="100" src="https://img.icons8.com/plasticine/100/back.png" alt="back" onclick="boxtoggle('Soil2' , 'Soil1' , 'solid3')"/>
    

        <div  class = "ExtendedBoxHeader">
            

            <div class = "ExtHeaderTxt">
                <h1>Current moisture </h1>
                <h1 id="SensorVal2"></h1>
                <p id="Condition2"></p>
            </div>

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
        <button class = "Sumbitton" onclick="toggleSensorDiv('addSensor')">Add Sensor</button>
        <button class = "Sumbitton" onclick="toggleSensorDiv('removeSensor')">Remove Sensor</button>
        </div>
        

        <div id="addSensor" style="display: none;">
            <h3>Adding Sensor</h3>
            <p>The ID can be found in the box or on the case of the sensor</p>
            <input type="text" name="SensorID" id="SensorID" placeholder = "SensorID">
            <button>Connect</button>
            
        </div>

        <div id="removeSensor" style="display: none;">
            <h3>Removing Sensor</h3>
            <p>Please check the Sensor ID in the box or case of the sensor</p>
            <input type="text" name="SensorID" id="SensorID" placeholder = "SensorID">
            <button>Remove</button>
        </div>

    </div>
</div>
</div>

<script>
    function toggleSensorDiv(box1) {

    var Box1 = document.getElementById(box1);

    if (Box1.style.display === 'none') {
        Box1.style.display = 'block';
    } else {
        Box1.style.display = 'none';
    }
}
</script>

<!-- INCLUDE CONNECTION BUTTON FOR ARDUINO / RASBERRY PIE -->

<!-- Weather -->


<div onclick="boxtoggle('Weather1' , 'Weather2')" class="initialbox" id = "Weather1">

<img width="90" height="90" src="https://img.icons8.com/ios-glyphs/90/chance-of-storm.png" alt="chance-of-storm"/>
<h2>Forecast</h2>
<h1 id="CurrentWeather"></h1>
</div>

<div class = "ExpandBackground" id = "Weather2">
<div  class = "expandedbox" id = "Weather3" >

<img width="90" height="90" src="https://img.icons8.com/ios-glyphs/90/chance-of-storm.png" alt="chance-of-storm"/>
<div class = "moistureBox">

    <img width="100" height="100" src="https://img.icons8.com/plasticine/100/back.png" alt="back" onclick="boxtoggle('Weather2' , 'Weather1' , 'Weather3')"/>

    <div class = "ExtendedBoxHeader">
    <h1>Weather Forecast </h1>

    <h3 id = "CurrentWeather"></h1>
    
    <h3 id = "city"></h3>
    </div>

    <div class = "sensorDividor">
    <div id = "weather" class = "WeatherBox"></div>
    </div>

    <div class = "FillableModelContent">

        <h5 id = "error"></h5>

        <h3>Enter City</h3>

        <div id = "WeatherInitialSection">
        <input type="text" name="city" id="cityInput" placeholder = "City">
        <button onclick = "fetchForecast(1) ">Get Weather</button>
        </div>
         


        <button id = "MoreDetails" onclick = "AppearDissapearOtherEffect('WeatherPlus' , 'WeatherInitialSection')">Add More details</button>



        <div  id = "WeatherPlus" style = "display:none;">

        <input type="text" name="city" id="cityInput"  placeholder = "City">
        <input type="text" name="city" id="stateInput" placeholder = "State">
        <input type="text" name="city" id="zipcodeInput" placeholder = "Zipcode">



        <p>Please note that these information will be saved for future convience and live data display</p>
        <p>By clicking "get Weather" below you agree that you are happy to have these details saved into our system</p>
        <p>If you wish to remove these information please contact support at : croptechad@gmail.com</p>

        <button onclick = "fetchMoreDetails(2)">Get Weather</button>

        

        </div>

    </div>

    <script>
    function AppearDissapear(element) {
        var b1 = document.getElementById(element);

        if (b1.style.display === 'none' || b1.style.display === '') {

            b1.style.display = 'block';
        } else {

            b1.style.display = 'none';
        }
    }

    function AppearDissapearOtherEffect(TriggerID, AffectedID) {
        
    var trigger = document.getElementById(TriggerID);
    var affected = document.getElementById(AffectedID);

    if (affected.style.display === 'none' || affected.style.display === '') {

        trigger.style.display = 'none'; 
        affected.style.display = 'block'; 

    } else {

        trigger.style.display = 'block';
        affected.style.display = 'none';

    }
}

</script>


    
    



</div>

</div>

</div>

<script src = "../API\openweathermap\Get_Forecast.js"></script>



<!-- ADD FILLABLE TYPES SO THAT USERS CAN ENTER THEIR LOCATION FOR ACCURATE FORECAST BUT ALSO HAVE METHODS TO PREVENT THEM FROM ENTERING EXACT LOCATIONS IF THEY DON'T CHOOSE TO -->


<!-- Statistics -->

<!-- onclick="boxtoggle('Statistics1' , 'Statistics2')" -->
<div  class="initialbox" id = "Statistics1">

<img width="100" height="100" src="https://img.icons8.com/ios/100/combo-chart--v1.png" alt="combo-chart--v1"/>
<h2>Statistics</h2>
<h1>COMING SOON</h1>
</div>

<div  class = "ExpandBackground" id = "Statistics2">
<div  class = "expandedbox" id = "Statistics3" >

<img width="90" height="90" src="https://img.icons8.com/ios-glyphs/90/chance-of-storm.png" alt="chance-of-storm"/>
<div class = "moistureBox">

    <img width="100" height="100" src="https://img.icons8.com/plasticine/100/back.png" alt="back" onclick="boxtoggle('Statistics2' , 'Statistics1' , 'Statistics3')"/>

    <div>
    <h1>Statistics</h1>
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

<div  class = "ExpandBackground" id = "Switch2">
<div  class = "expandedbox" id = "Switch3" >

<img width="100" height="100" src="https://img.icons8.com/ios/100/switches.png" alt="switches"/>
<div class = "moistureBox">

    <img width="100" height="100" src="https://img.icons8.com/plasticine/100/back.png" alt="back" onclick="boxtoggle('Switch2' , 'Switch1' , 'Switch3')"/>

    <div>
    <h1>Switch</h1>
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

<!--  onclick="boxtoggle('Automation1' , 'Automation2')" -->
<div class="initialbox" id = "Automation1">

<img width="100" height="100" src="https://img.icons8.com/ios/100/robot-3.png" alt="robot-3"/>
<h2>Automation</h2>
<h1>COMING SOON</h1>
</div>

<div class = "ExpandBackground" id = "Automation2">
<div  class = "expandedbox" id = "Automation3" >

<img width="100" height="100" src="https://img.icons8.com/ios/100/robot-3.png" alt="robot-3"/>
<div class = "moistureBox">

    <img width="100" height="100" src="https://img.icons8.com/plasticine/100/back.png" alt="back" onclick="boxtoggle('Automation2' , 'Automation1' , 'Automation3')"/>

    <div>
    <h1>Automation</h1>
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




<!-- Adding Sensors (ADMIN) -->
<?php
    if($_SESSION['role'] === 'ADMIN'):
?>
<div class="initialbox" onclick="boxtoggle('Addition1' , 'Addition2')" id = "Addition1" >

<img width="100" height="100" src="https://img.icons8.com/ios/100/add--v1.png" alt="add--v1"/>
<h2>Sensor Addition</h2>
</div>

<div class = "ExpandBackground" id = "Addition2">
<div  class = "expandedbox" id = "Addition3" >

<img width="100" height="100" src="https://img.icons8.com/ios/100/add--v1.png" alt="add--v1"/>
<div class = "moistureBox">

    <img width="100" height="100" src="https://img.icons8.com/plasticine/100/back.png" alt="back" onclick="boxtoggle('Addition1' , 'Addition2' , 'Addition3')"/>

    <div>
    <h1>Sensor Addition</h1>
    </div>

    <div class = "sensorDividor">

            <div>

            <h1> Enter Details below </h1>

            <div class = "AdditionContent">

            <h3>Type</h3>
        <input type="radio" id="OptSoilMoisture" name="option" value="soil_moisture">
        <label for="">Soil Moisture</label><br>
        <input type="radio" id="Irrigation" name="option" value="Irrigation">
        <label for="">Irrigation</label>

        <h3>HostName</h3>
        <input type="text" id="Sensor_HostName" placeholder="HOSTNAME">
        <h3>Password</h3>
        <input type="text" id="Sensor_Password" placeholder="PASSWORD">

        <a href=""><button type="button" class = "Sumbitton">Add</button></a>


        </div>
    </div>
        

    </div>

</div>

</div>

</div>

<?php
    endif;
?>

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