<?php
session_start();

//var_dump($_POST);


if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    
    

    require_once("dbCon.php");

    

    try{

        

    $sql = "SELECT * FROM userdetails WHERE email = :email";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
 
    if($user && password_verify($password, $user["Password"])){

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["User_firstName"] = $user["FirstName"];

        header("Location: ../pages/dashboard.php");

        exit();
    
        }else{
            echo "<div> Invalid Email or Password </div>";
        }

    }catch(PDOException $e){
        echo '<div>Database error: ' . $e->getMessage() . '</div>';
    }

}



?>