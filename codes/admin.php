<?php
include 'connect.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin- Online Cake Delivery </title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: wheat;">

    <div class="heading">
        <div class="logo"><img src="https://cdn.iconscout.com/icon/free/png-256/free-cake-1582399-1343940.png" width="24px" height="24px"> Cakestore </img></div>
        <ul class="nav">
            <li><a class="link" href="index.php"> Home </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a class="link" href="edittypes.php"> Types </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a class="link" href="editflavours.php"> Flavours </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li><a class="link" href="logout.php"> Logout </a></li><br>
        </ul>
        <h1>
            <?php 
            if(isset($_SESSION['name'])){
                echo "Welcome ".$_SESSION['name']."!";
                echo "You accessed admin portal";
            }
            ?>
        </h1>
    </div>

    <div class="cat"><br>
        <table cellspacing="20px" cellpadding="20px" width="100%" style="text-align:center;">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Email</th>
                <th>Date of order</th>
                <th>Payment</th>
                <th>Address</th>
                <th>Phone number</th>
                <th>Delivery date</th>
            </tr>

            <?php
                $sql="SELECT * FROM `orders`";
                $stmt=$conn->prepare($sql);
                $stmt->execute();
                $result=$stmt->get_result();

                while($row = $result->fetch_assoc()){
                ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['d']; ?></td>
                        <td><?php echo $row['payment']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['phno']; ?></td>
                        <td><?php echo $row['delivery']; ?></td>
                    </tr>
            <?php
                }
            ?>
        </table>
    
    </div>

    
</body>
</html>