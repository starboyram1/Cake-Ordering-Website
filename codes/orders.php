<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['name'])) {
        header("location: login.php");
        exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['b'])) {
        
        date_default_timezone_set('Asia/Kolkata');
        $names = "";
        $quantity = $_POST['quantity'];
        $totalPrice = 0;
        $payment = $_POST['pay'];
        $address = $_POST['address'];
        $nextDate = date('Y-m-d H:i:s', strtotime($currentDate . ' +1 day'));
        $delivery = $nextDate;
        $phno = $_POST['phno'];
        
        $sql = "SELECT * FROM `cart` WHERE `email` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $_SESSION["email"]);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {

                $totalPrice += $quantity * $row['price'];
                $names .= $row['name'] . ' X ' . $quantity . ', ';
            }
            $names = rtrim($names, ', ');
        }

        
        $currentDate = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `orders` (`name`, `price`, `email`, `d`,`payment`,`address`, `delivery`,`phno`) VALUES (?, ?, ?, ?, ?, ?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisssssi", $names, $totalPrice, $_SESSION["email"], $currentDate, $payment, $address, $delivery,$phno);
        $stmt->execute();

        $sql1 = "DELETE FROM `cart` WHERE `email` = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("s",$_SESSION["email"]);
        $stmt1->execute();

        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['remove'])) {
        $oid = $_POST['oid'];

        
        $sql = "DELETE FROM `cart` WHERE `oid` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $oid);
        $result = $stmt->execute();

        
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
        <table cellspacing="20px" cellpadding="20px" width="100%" style="text-align:center;">
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <?php
                $sql = "SELECT * FROM `cart` WHERE `email` = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $_SESSION["email"]);
                $stmt->execute();
                $result = $stmt->get_result();
                $totalPrice = 0;
                $names = [];
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $p = $row['quantity']*$row['price'];
                        $quantity = $row['quantity'];
                        $totalPrice += $p;
                        $names[] = $row['name'];
                ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td>Rs.<?php echo $row['price']. ' X '.$row['quantity'].' = Rs.'.$row['price']*$row['quantity']; ?></td>
                            <td><img src="<?php echo $row['url']; ?>" width="100px" height="100px" /></td>
                            <td>
                                <input type="hidden" name="oid" value="<?php echo $row["oid"]; ?>">
                                <input type="hidden" name="quantity" value="<?php echo $row["quantity"]; ?>">
                                <button type="submit" name="remove" class="btn1">Remove</button>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                ?>
                    <h3>No orders yet</h3>
                <?php
                }
                ?>
                <tr>
                    <td>Payment:               
                        <input type="radio" name="pay" value="Cash" checked required>COD</input>
                        <input type="radio" name="pay" value="Card" required>CARD</input>
                    </td>
                    <td>Address:
                        <textarea name="address" rows="4" columns="20" required></textarea>
                    </td>
                    <td>Phone:
                        <input type="text" name="phno"  required/>
                    </td>
                    <td>Total Price: <?php echo "Rs. $totalPrice"; ?></td>
                    <td>
                        <input type="hidden" name="names" value="<?php echo implode(", ", $names); ?>">
                        <input type="hidden" name="total" value="<?php echo $totalPrice; ?>">
                         
                        <button type="submit" name="b" class="btn1">Order</button>
                    </td>
                </tr>
            </form>
        </table>
    </div>
</body>
</html>