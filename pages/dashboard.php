<?php

//Page Security

session_start();

if (isset($_SESSION["user_id"])){
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

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/Nav.css">
    <link rel="stylesheet" href="../style/LoginandRegistration.css">

    <link rel="stylesheet" href="../API\sensorReaction\displaybox.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../assets\images\Icon.png" sizes="32x32" type="image/png">
    <title>Dashboard</title>
</head>

<body>

    <div  class= "dashboardBackground">

        <div class="dashbacking">

            <div>

                <h3>Hello </h3>

                <?php
                
                echo $_SESSION["User_firstName"];
                
                
                ?>

            </div>





    
                <div class="displaybox" >
                    <h2>Soil Moisture</h2>
                    <h3><span id="SensorVal" class = "TempVal"></span></h3>

                    <script>

                        function fetchSensorVal(lastIndex){
                            const url = '../../API/sensorReaction/ReadArr.php?lastIndex=' + lastIndex + '&t=' + new Date().getTime();
                            fetch(url)
                            .then(Response => Response.json())
                            .then(data => {

                                if(data.value !== null){
                                    document.getElementById('SensorVal').textContent = data.value + "%";
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


                </div>
    
    
                <div>
                    <a href="?logout=true">
                        <h1>LogOut</h1>
                    </a>
                </div>
    
        </div>

    </div>
    







    <script>

        // ENTER CODE TO HAVE USER NAME DISPLAYED FOR DASH TITLE


    </script>



</body>

</html>