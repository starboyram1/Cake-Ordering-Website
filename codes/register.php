<?php
include "connect.php";
if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $phone = $_POST['phone'];
    $usertype = $_POST['usertype'];

    $pass = password_hash($password, PASSWORD_DEFAULT);

    $email_check = "SELECT * FROM `cakereg` WHERE `email` = ?";
    $email_stmt = $conn->prepare($email_check);
    $email_stmt->bind_param("s", $email);
    $email_stmt->execute();

    $email_stmt->store_result();
    if($email_stmt->num_rows()>0){
        ?>
        <script>alert("User already registered");</script>
    <?php
    }
    else{

        $sql ="INSERT INTO `cakereg`(`name`, `email`, `pwd`, `phone`, `usertype`) VALUES (?,?,?,?,?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssis', $name, $email, $pass, $phone, $usertype);

        $result = $stmt->execute();

        if($result){
            header("location: login.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <script type="text/javascript">
    function verify(){
        var pwd1 = document.getElementById("password").value;
        var pwd2 = document.getElementById("rpassword").value;
        if(pwd1.length<6){
            alert("Password must contain more than 6 characters");
            return false;
        }
        else if(pwd1!=pwd2){
            alert("Passwords do not match");
            return false;
        }
        else{
            return true;
        }
    }
   </script> 
</head>
<body style="background-image: linear-gradient(rgba(118, 109, 109, 0),rgba(179, 129, 129,1)); padding-bottom:200px;">
    <form onsubmit="return verify()" method="post" style="border: 1px solid white;margin: 0% 20%;">
        <fieldset style="display: block; font: 1.5em sans-serif;">
            <legend style="border: 1px solid black ; border-radius: 20px; background-color: blanchedalmond; text-align: center;">Registration</legend>

            <div style="padding-left: 30%;">
            <label for="username">Enter Username: </label><br>
            <input type="text" name="username" id="username" placeholder="enter username...." style="border: none;outline: none;border-bottom: 1px solid #ccc;"><br><br>

            <label for="email">Enter Email: </label><br>
            <input type="email" name="email" id="username" placeholder="enter email...." style="border: none;outline: none;border-bottom: 1px solid #ccc;"><br><br>

            <label for="password">Enter Password: </label><br>
            <input type="password" name="password" id="password" placeholder="enter password...." style="border: none;outline: none;border-bottom: 1px solid #ccc;"><br><br>

            <label for="rpassword">Re-Enter Password: </label><br>
            <input type="password" name="rpassword" id="rpassword" placeholder="re-enter username...." style="border: none;outline: none;border-bottom: 1px solid #ccc;"><br><br>

            <label for="phone">Enter Phone number: </label><br>
            <input type="tel" name="phone" id="phone" placeholder="enter phone number...." style="border: none;outline: none;border-bottom: 1px solid #ccc;"><br><br>

            <label for="usertype">Who's using? </label><br>
            <select name="usertype" id="usertype" >
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select><br><br>

            <button type="submit" style="border-radius: 20px; outline-style: none; cursor: pointer;" name="submit" id="submit">Register</button><br><br>
            <a href="login.php" style="text-decoration:none; color: whitesmoke; cursor: pointer;" >Already have an account?</a>

            </div>
        </fieldset>


    </form>
   
</body>
</html>