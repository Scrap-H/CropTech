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


        <div class="LoginPage">

            <div class="LoginBox">

                <form action="../Connector/main.php" method="post">
                    <div class="inputs">
                        <input type="text" placeholder="First Name" id="FirstName" name="FirstName" required>
    
                        <input type="text"  placeholder="Last Name" id="LastName" name="LastName" required>
    
                        <input type="email" placeholder="email" id="email" name="email" required>
    
                        <input type="password" placeholder="Password" id="NewPassword" name="NewPassword" required>

                        <input type="text" placeholder="Verify Password" id="PasswordVerification" name="PasswordVerification" required>
                        <span id="verificationStatus"></span>
                    </div>
    
                    <button type="submit" id="regButton" disabled>Register</button>
                </form>

            </div>


            <script>

                document.addEventListener("DOMContentLoaded" , function(){

                    var passIn = document.getElementById("NewPassword");
                    var verificationIn = document.getElementById("PasswordVerification");
                    var verificationStatus = document.getElementById("verificationStatus");
                    var regButtonstatus = document.getElementById("regButton");

                    function VerifyPassword(){

                        var pass = passIn.value;
                        var verification = verificationIn.value;

                        if(pass === verification){

                            verificationStatus.textContent = "";
                            regButtonstatus.disabled = false;

                        } else{
                            verificationStatus.textContent = "Does not match";
                            regButtonstatus.disabled = true;
                        }

                    }

                    passIn.addEventListener("input" , VerifyPassword);
                    verificationIn.addEventListener("input" , VerifyPassword);


                }
            
            
            
            
            
            )

            </script>



        </div>


    </body>




</html>