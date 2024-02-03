<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Online Cake Delivery </title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: wheat;">

    <div class="heading">
        <div class="logo"><img src="https://cdn.iconscout.com/icon/free/png-256/free-cake-1582399-1343940.png" width="24px" height="24px"> Cakestore </img></div>
        <ul class="nav">
            <li><a class="link" href="index.php"> Home </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a class="link" href="types.php"> Types </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a class="link" href="flavours.php"> Flavours </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a class="link" href="orders.php"> My cart </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a class="link" href="myorders.php"> My orders </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a class="link" href="contact.html"> Contact us </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a class="link" href="about.html"> About </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a class="link" href="logout.php"> Logout </a></li><br>
        </ul>
        <h1>
            <?php 
            if(isset($_SESSION['name'])){
                echo "Welcome ".$_SESSION['name']."!";
            }
            ?>
        </h1>
    </div>

    <div class="indexbg" style="width: 100%;">
        <img src="https://www.bakerstreet.ca/wp-content/uploads/2022/02/10inchSlice_RedVelvet.jpg" style="width: 60%; height: 600px; float: left;"/>
        <p style="margin-left: 40%; height: 600px; padding-left: 300px; font-size: 3em; font-weight: bold; text-align: center;">Baked with love!<br>Best cakes<br><button class="btn" onclick="checkLogin()" > GET STARTED </button></p>
        <script>
            var isLoggedIn = <?php echo isset($_SESSION['name']) ? 'true' : 'false'; ?>;
            function checkLogin() {
              if (!isLoggedIn) {
                window.location.href = 'login.php';
              }
            }
        </script>  
    </div>

    
    <div class="i1">
        <img class="c1" src="https://www.fnp.com/assets/images/custom/cakes_23/cakes_delivery/Same-Day_Web.jpg" width="500px" height="400px"/>
        <img class="c1" src="https://www.fnp.com/assets/images/custom/cakes_23/cakes_delivery/Midnight-Delivery_Web.jpg" width="500px" height="400px"/>
        <img class="c1" src="https://www.fnp.com/assets/images/custom/cakes_23/cakes_delivery/Bestseller_Web.jpg" width="500px" height="400px"/>
        <img class="c1" src="https://www.fnp.com/assets/images/custom/cakes_23/cakes_delivery/New-Arrival_Web.jpg" width="500px" height="400px"/>
    </div>

    <div class="i2">
        <h1>Celebrate special occasions</h1>
        <img class="c2" src="https://www.fnp.com/assets/images/custom/cakes_23/special_occasion/Birthday_web.jpg" width="500px" height="400px"/>
        <img class="c2" src="https://www.fnp.com/assets/images/custom/cakes_23/special_occasion/Anniversary_web.jpg" width="500px" height="400px"/>
    </div>

    <div class="cat">
        <h1>Cake category</h1>
        <ul>
            <li class="category"><img src="https://assets.epicurious.com/photos/575991f3973781fc02c2a827/6:4/w_1600,c_limit/EP_06062016_Vanilla-Buttermilk-Wedding-Cake-with-Raspberries-and-Orange-Cream-Cheese-Frosting.jpg" width="300px" height="200px"/><br>BUTTER CAKE</li>
            <li class="category"><img src="https://assets.epicurious.com/photos/57c6f789082060f11022b586/6:4/w_1600,c_limit/no-recipe-required-pound-cake-lemon-poppy-seed-30082016.jpg" width="300px" height="200px"/><br>POUND CAKE</li>
            <li style="list-style-type: none; display: inline;padding-left: 10%;"><button class="btn1" onclick="window.location.href='types.php';">MORE...</button></li>
            </ul>
    </div>

    <div class="cat">
        <h1>Cake Flavours</h1>
        <ul>
            <li class="category"><img src="https://sweetfreedombakeshop.com/wp-content/uploads/IMG_4831-375x400.jpeg" width="300px" height="200px"/><br> Chai Tea Latte Cake</li>
            <li class="category"><img src="https://sweetfreedombakeshop.com/wp-content/uploads/Chocolate-Birthday-Cake.jpg" width="300px" height="200px"/><br>Chocolate Cake</li>
            <li style="list-style-type: none; display: inline;padding-left: 10%;"><button class="btn1" onclick="window.location.href='flavours.php';">MORE...</button></li>
            </ul>
    </div>

</body>
</html>