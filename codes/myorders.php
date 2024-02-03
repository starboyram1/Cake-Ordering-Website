<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['name'])) {
        header("location: login.php");
        exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>
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
    </div>

    <div class="cat">
        <table cellspacing="20px" cellpadding="20px" width="100%" style="text-align:center;"><pre>
        <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Ordered on</th>
        <th>Payment mode</th>
        <th>Address</th>
        <th>Delivered by</th>
        </tr>
        <?php
        $sql="SELECT * FROM `orders` WHERE `email` = ?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param('s', $_SESSION["email"]);
        $stmt->execute();
        $result=$stmt->get_result();
        $totalPrice=0;
        if (mysqli_num_rows($result) > 0) {
            $totalPrice=0;
            while($row = $result->fetch_assoc()){
                $p = $row['price'];
                $totalPrice += $p;
                $currentDate=$row['d'];
                ?>
                <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['d']; ?></td>
                <td><?php echo $row['payment']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['delivery']; ?></td>

                </tr>
            <?php
            }
        }
        ?>
        </table>
    </div>    
</body>
</html>
