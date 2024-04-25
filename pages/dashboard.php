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

    <link rel="icon" href="../assets\images\Icon.png" sizes="32x32" type="image/png">



</head>

<body>
    
<div class = "greeting">

<?php
$name = $_SESSION["User_firstName"];
echo '<h1> Hello '.$name. '</h1>';
?>

</div>

    <div class = "dashboardBackground dashboardlayout">

        
        <div class = "Icons" >

        <a href="">
        <img width="100" height="100" src="https://img.icons8.com/ios/100/soil.png" alt="soil"/>
        <h1 id="SensorVal" class = "TempVal"></h1>
        <h2>Soil Moisture</h2>
        </a>
                    

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


       <div class = "Icons">

       <a href="">
       <img width="100" height="100" src="https://img.icons8.com/ios/100/combo-chart--v1.png" alt="combo-chart--v1"/>
       <h1>statistics</h1>
       </a>    

       </div>

       
       <div class = "Icons">

       <a href="">
       <img width="100" height="100" src="https://img.icons8.com/ios/100/switches.png" alt="switches"/>
       <h1>switch</h1>                 
       </a>                 

       </div> 


       <div class = "Icons">

        <a href="">
        <img width="100" height="100" src="https://img.icons8.com/ios/100/partly-cloudy-day--v1.png" alt="partly-cloudy-day--v1"/>                
        <h1>weather</h1>                
        </a>
       
       </div> 


       <div class = "Icons">

       <a href="">
       <img width="100" height="100" src="https://img.icons8.com/ios/100/robot-3.png" alt="robot-3"/>
       <h1>Automation timetable</h1>                 
       </a>
       
       </div> 


       <?php 
        if($_SESSION['role'] === 'ADMIN'):
        ?>

        <div class = "Icons"> 

        <a href="https://accounts.google.com/v3/signin/identifier?hl=en_GB&ifkv=ARZ0qKJ5PT5oUMrBg575ewqh6wKDlllGxrZ_hlagmyf4GJitM-GQXvWCstEbrAjx-vF0mCkx80xw&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S-503238949%3A1713818496159177&theme=mn&ddm=0" target="_blank">
        <img width="100" height="100" src="https://img.icons8.com/ios/100/mail.png" alt="mail"/>
        <h1>Admin email</h1>    
        </a>

        </div>

        <?php 
        endif; 
        ?>


       <div class = "Icons">

        <a href="?logout=true">
        <img width="100" height="100" src="https://img.icons8.com/ios/100/exit--v1.png" alt="exit--v1"/>
        <h1>LogOut</h1>
        </a>

        </div>


        




        
    </div>

    <footer>
            <div class="footerText">
                <h1> Contact us </h1>
                <h5>email : mervin.chung729@gmail.com</h5>
                <h5>      : croptechad@gmail.com</h5>
            </div>
            

            <h6>2024 CropTech</h6>

        </footer>


</body>
</html>