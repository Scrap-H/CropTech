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
            boxtoggle('Setting2' , 'Setting1' , 'Setting3');

            boxtoggle('Addition2' , 'Addition1' , 'Addition3');
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
echo '<h1> Hello '.$name.'</h1>';
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


<div onclick = "AppearDissapearOtherEffect('Soil1' , 'Soil2')" class="initialbox" id = "Soil1">
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
        <button class = "Sumbitton" onclick="AppearDissapear('addSensor')">Add Sensor</button>
        <button class = "Sumbitton" onclick="AppearDissapear('removeSensor')">Remove Sensor</button>
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

<!-- INCLUDE CONNECTION BUTTON FOR ARDUINO / RASBERRY PIE -->

<!-- Weather -->


<div onclick="AppearDissapearOtherEffect('Weather1' , 'Weather2')" class="initialbox" id = "Weather1">

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
        <button onclick = "fetchForecast(1)" class = "Sumbitton">Get Weather</button>
        </div>
         


        <button id = "MoreDetails" onclick = "AppearDissapearOtherEffect('WeatherPlus' , 'WeatherInitialSection')" class = "Sumbitton">Add More details</button>



        <div  id = "WeatherPlus" style = "display:none;">

            <input type="text" name="city" id="cityInput"  placeholder = "City">
            <input type="text" name="city" id="stateInput" placeholder = "State">
            <input type="text" name="city" id="zipcodeInput" placeholder = "Zipcode">



            <p>Please note that these information will be saved for future convience and live data display</p>
            <p>By clicking "get Weather" below you agree that you are happy to have these details saved into our system</p>
            <p>If you wish to remove these information please contact support at : croptechad@gmail.com</p>

            <button onclick = "fetchMoreDetails(2)" class = "Sumbitton">Get Weather</button>

        </div>

    </div>


    
    



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

<div onclick="AppearDissapearOtherEffect('Switch1' , 'Switch2')" class="initialbox" id = "Switch1">

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


<!-- Setting -->

<div onclick="AppearDissapearOtherEffect('Setting1' , 'Setting2')" class="initialbox" id = "Setting1">

<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="90" height="90" viewBox="0 0 32 32">
<path d="M 13.1875 3 L 13.03125 3.8125 L 12.4375 6.78125 C 11.484375 7.15625 10.625 7.683594 9.84375 8.3125 L 6.9375 7.3125 L 6.15625 7.0625 L 5.75 7.78125 L 3.75 11.21875 L 3.34375 11.9375 L 3.9375 12.46875 L 6.1875 14.4375 C 6.105469 14.949219 6 15.460938 6 16 C 6 16.539063 6.105469 17.050781 6.1875 17.5625 L 3.9375 19.53125 L 3.34375 20.0625 L 3.75 20.78125 L 5.75 24.21875 L 6.15625 24.9375 L 6.9375 24.6875 L 9.84375 23.6875 C 10.625 24.316406 11.484375 24.84375 12.4375 25.21875 L 13.03125 28.1875 L 13.1875 29 L 18.8125 29 L 18.96875 28.1875 L 19.5625 25.21875 C 20.515625 24.84375 21.375 24.316406 22.15625 23.6875 L 25.0625 24.6875 L 25.84375 24.9375 L 26.25 24.21875 L 28.25 20.78125 L 28.65625 20.0625 L 28.0625 19.53125 L 25.8125 17.5625 C 25.894531 17.050781 26 16.539063 26 16 C 26 15.460938 25.894531 14.949219 25.8125 14.4375 L 28.0625 12.46875 L 28.65625 11.9375 L 28.25 11.21875 L 26.25 7.78125 L 25.84375 7.0625 L 25.0625 7.3125 L 22.15625 8.3125 C 21.375 7.683594 20.515625 7.15625 19.5625 6.78125 L 18.96875 3.8125 L 18.8125 3 Z M 14.8125 5 L 17.1875 5 L 17.6875 7.59375 L 17.8125 8.1875 L 18.375 8.375 C 19.511719 8.730469 20.542969 9.332031 21.40625 10.125 L 21.84375 10.53125 L 22.40625 10.34375 L 24.9375 9.46875 L 26.125 11.5 L 24.125 13.28125 L 23.65625 13.65625 L 23.8125 14.25 C 23.941406 14.820313 24 15.402344 24 16 C 24 16.597656 23.941406 17.179688 23.8125 17.75 L 23.6875 18.34375 L 24.125 18.71875 L 26.125 20.5 L 24.9375 22.53125 L 22.40625 21.65625 L 21.84375 21.46875 L 21.40625 21.875 C 20.542969 22.667969 19.511719 23.269531 18.375 23.625 L 17.8125 23.8125 L 17.6875 24.40625 L 17.1875 27 L 14.8125 27 L 14.3125 24.40625 L 14.1875 23.8125 L 13.625 23.625 C 12.488281 23.269531 11.457031 22.667969 10.59375 21.875 L 10.15625 21.46875 L 9.59375 21.65625 L 7.0625 22.53125 L 5.875 20.5 L 7.875 18.71875 L 8.34375 18.34375 L 8.1875 17.75 C 8.058594 17.179688 8 16.597656 8 16 C 8 15.402344 8.058594 14.820313 8.1875 14.25 L 8.34375 13.65625 L 7.875 13.28125 L 5.875 11.5 L 7.0625 9.46875 L 9.59375 10.34375 L 10.15625 10.53125 L 10.59375 10.125 C 11.457031 9.332031 12.488281 8.730469 13.625 8.375 L 14.1875 8.1875 L 14.3125 7.59375 Z M 16 11 C 13.25 11 11 13.25 11 16 C 11 18.75 13.25 21 16 21 C 18.75 21 21 18.75 21 16 C 21 13.25 18.75 11 16 11 Z M 16 13 C 17.667969 13 19 14.332031 19 16 C 19 17.667969 17.667969 19 16 19 C 14.332031 19 13 17.667969 13 16 C 13 14.332031 14.332031 13 16 13 Z"></path>
</svg>
<h2>Settings</h2>
</div>

<div class = "ExpandBackground" id = "Setting2">
<div class="expandedbox" id = "Setting3" >
    
    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="90" height="90" viewBox="0 0 32 32">
    <path d="M 13.1875 3 L 13.03125 3.8125 L 12.4375 6.78125 C 11.484375 7.15625 10.625 7.683594 9.84375 8.3125 L 6.9375 7.3125 L 6.15625 7.0625 L 5.75 7.78125 L 3.75 11.21875 L 3.34375 11.9375 L 3.9375 12.46875 L 6.1875 14.4375 C 6.105469 14.949219 6 15.460938 6 16 C 6 16.539063 6.105469 17.050781 6.1875 17.5625 L 3.9375 19.53125 L 3.34375 20.0625 L 3.75 20.78125 L 5.75 24.21875 L 6.15625 24.9375 L 6.9375 24.6875 L 9.84375 23.6875 C 10.625 24.316406 11.484375 24.84375 12.4375 25.21875 L 13.03125 28.1875 L 13.1875 29 L 18.8125 29 L 18.96875 28.1875 L 19.5625 25.21875 C 20.515625 24.84375 21.375 24.316406 22.15625 23.6875 L 25.0625 24.6875 L 25.84375 24.9375 L 26.25 24.21875 L 28.25 20.78125 L 28.65625 20.0625 L 28.0625 19.53125 L 25.8125 17.5625 C 25.894531 17.050781 26 16.539063 26 16 C 26 15.460938 25.894531 14.949219 25.8125 14.4375 L 28.0625 12.46875 L 28.65625 11.9375 L 28.25 11.21875 L 26.25 7.78125 L 25.84375 7.0625 L 25.0625 7.3125 L 22.15625 8.3125 C 21.375 7.683594 20.515625 7.15625 19.5625 6.78125 L 18.96875 3.8125 L 18.8125 3 Z M 14.8125 5 L 17.1875 5 L 17.6875 7.59375 L 17.8125 8.1875 L 18.375 8.375 C 19.511719 8.730469 20.542969 9.332031 21.40625 10.125 L 21.84375 10.53125 L 22.40625 10.34375 L 24.9375 9.46875 L 26.125 11.5 L 24.125 13.28125 L 23.65625 13.65625 L 23.8125 14.25 C 23.941406 14.820313 24 15.402344 24 16 C 24 16.597656 23.941406 17.179688 23.8125 17.75 L 23.6875 18.34375 L 24.125 18.71875 L 26.125 20.5 L 24.9375 22.53125 L 22.40625 21.65625 L 21.84375 21.46875 L 21.40625 21.875 C 20.542969 22.667969 19.511719 23.269531 18.375 23.625 L 17.8125 23.8125 L 17.6875 24.40625 L 17.1875 27 L 14.8125 27 L 14.3125 24.40625 L 14.1875 23.8125 L 13.625 23.625 C 12.488281 23.269531 11.457031 22.667969 10.59375 21.875 L 10.15625 21.46875 L 9.59375 21.65625 L 7.0625 22.53125 L 5.875 20.5 L 7.875 18.71875 L 8.34375 18.34375 L 8.1875 17.75 C 8.058594 17.179688 8 16.597656 8 16 C 8 15.402344 8.058594 14.820313 8.1875 14.25 L 8.34375 13.65625 L 7.875 13.28125 L 5.875 11.5 L 7.0625 9.46875 L 9.59375 10.34375 L 10.15625 10.53125 L 10.59375 10.125 C 11.457031 9.332031 12.488281 8.730469 13.625 8.375 L 14.1875 8.1875 L 14.3125 7.59375 Z M 16 11 C 13.25 11 11 13.25 11 16 C 11 18.75 13.25 21 16 21 C 18.75 21 21 18.75 21 16 C 21 13.25 18.75 11 16 11 Z M 16 13 C 17.667969 13 19 14.332031 19 16 C 19 17.667969 17.667969 19 16 19 C 14.332031 19 13 17.667969 13 16 C 13 14.332031 14.332031 13 16 13 Z"></path>
    </svg>

    <div class="moistureBox">

    <img width="100" height="100" src="https://img.icons8.com/plasticine/100/back.png" alt="back" onclick="boxtoggle('Setting2' , 'Setting1' , 'Setting3')"/>
    

        <div  class = "ExtendedBoxHeader">
            

            <div class = "ExtHeaderTxt">
                <h1>Settings </h1>
                <h1 id="SensorVal2"></h1>
                <p id="Condition2"></p>
            </div>

        </div>

        <div class="sensorDividor">

            <div>

                <?php
                $id = $_SESSION["user_id"];
                echo '<h4> User-ID :  '.$id.'</h4>';
                ?>

                <p>Do not share your ID as it is your own personal ID</p>

                <div>
                    <h3>Personal Details</h3>


                    <form action="../Connector/userdet_UPDATE.php">

                    
                    <input type="text" name="NewFirstName" id="NewFirstNameInput" placeholder="New FirstName">
                    
                    <input type="text" name="NewLastName" id="NewLastNameInput" placeholder="New LastName">
                    
                    <input type="text" name="Newemail" id="NewemailInput" placeholder="New Email">
                    
                    <input type="text" name="Newpassword" id="NewpasswordInput" placeholder="New Password">

                    <button type = 'submit' id="ApplyButton">Apply</button>

                    </form>
                    
                </div>

                <div>
                    <h3>Data Protection</h3>

                    <button>Erase Sensitive Data</button>
                    
                    <p>Note by clicking the button above the following information will be cleared from our database :</p>
                    <p>- Location (City , State , ZipCode)</p>

                </div>



</div>    




        </div>

    </div>
</div>
</div>


<!-- Adding Sensors (ADMIN) -->
<?php
    if($_SESSION['role'] === 'ADMIN'):
?>
<div class="initialbox" onclick="AppearDissapearOtherEffect('Addition1' , 'Addition2')" id = "Addition1" >

<img width="100" height="100" src="https://img.icons8.com/ios/100/add--v1.png" alt="add--v1"/>
<h2>Sensor Addition</h2>
</div>

<div class = "ExpandBackground" id = "Addition2">
<div  class = "expandedbox" id = "Addition3" >

<img width="100" height="100" src="https://img.icons8.com/ios/100/add--v1.png" alt="add--v1"/>
<div class = "moistureBox">

    <img width="100" height="100" src="https://img.icons8.com/plasticine/100/back.png" alt="back" onclick="boxtoggle('Addition2' , 'Addition1' , 'Addition3')"/>

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