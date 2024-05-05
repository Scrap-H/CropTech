<?php
session_start();


?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/Nav.css">
        <link rel="stylesheet" href="../style/LoginandRegistration.css">


        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../assets\images\Icon.png" sizes="32x32" type="image/png">
        <title>CropTech</title>
    </head>

    <body>
        <header>
            
            <div class="NavBoard">

                <a href="../index.php">

                    <div class="logo">
                        <img src="../assets\images\Icon.png">
                    </div>
                </a>
                
                <nav>
                    <ul>
                        <li><a href="../index.php#AboutUs">About</a></li>
                        <li><a href="../index.php#Features">Features</a></li>
                        <li><a href="../index.php#Pricing">Pricing</a></li>

                        <li><a href="login.php">Login/Register</a></li>
                    </ul>
                </nav>
            </div>


        </header>

        <div class = "pagebackgroundLoginReg">

        <div class="LoginPage">

            <div class="LoginBox">
    
                <form action="../Connector/userdet_READ.php" method="post">

                    <div class="inputs">
                        <input type="text" placeholder="email" id="username" name="email" required>
    
                        <input type="password" placeholder="password" id="password" name="password" required>
                    </div>

                    <input type="submit" name="login" value="Login" class="Sumbitton">


                    <div class="BottomLogin">
                        <input type="checkbox"  checked = "checked" name="remember"> Remember me

                        <a href="">Forget Password</a>

                    </div>

                    <p>Don't have an account ?</p>
                <a href="register.php"><button type="button" class = "Sumbitton">Register</button></a>
                    
                </form>
                
                
                
            </div>

        </div>

        </div>

        <script>

            // REMEMBER ME FUNCTION

        </script>


    </body>




</html>