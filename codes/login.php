<?php
include 'connect.php';
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $sql = "SELECT `email`, `name`, `pwd`, `usertype` FROM `cakereg` WHERE `email`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$email);
    $stmt->execute();

    $stmt->bind_result($db_email,$db_name,$db_pwd,$db_usertype);
    
    if($stmt->fetch()){
        $_SESSION['name']=$db_name;
        $_SESSION['email']=$db_email;
        if($db_usertype=="user")
        {
            if(password_verify($pwd, $db_pwd)){
                echo "Login successfull";
                header("location:index.php");
            }
            else{
                echo "Login failed<br>";
           
            }
        }
        else{
            if(password_verify($pwd, $db_pwd)){
                echo "Login successfull";
                header("location:admin.php");
            }
            else{
                echo "Login failed<br>";
           
            }
        }
    }
    else{
        echo "EMAIL & PASSWORD Incorrect";
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="background-image: linear-gradient(rgba(118, 109, 109, 0),rgba(179, 129, 129,1)); width:auto;height:auto;">
    <form action="login.php" method="post" style="border: 1px solid white;margin: 10% 40%;">
        <fieldset style="display: block; font: 1.5em sans-serif;">
            <legend style="border: 1px solid black ; border-radius: 20px; background-color: blanchedalmond; text-align: center;">Login</legend>

            <label for="email">Enter email address: </label><br>
            <input type="email" name="email" id="email" placeholder="enter email...." style="border: none;outline: none;border-bottom: 1px solid #ccc;"><br><br>

            <label for="password">Enter Password: </label><br>
            <input type="password" name="password" id="password" placeholder="enter password...." style="border: none;outline: none;border-bottom: 1px solid #ccc;"><br><br>

            <button type="submit" style="border-radius: 20px; outline-style: none; cursor: pointer; text-align: center;" name="submit" id="submit">Login</button><br><br>
            <a href="register.php" style="text-decoration:none; color: whitesmoke; cursor: pointer; text-align: center;" >Don't have an account?</a>

        </fieldset>


    </form>
    
</body>
</html>