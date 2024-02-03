<?php
include 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['name'])) {
        header("location: login.php");
        exit();
    }

    // Get the cake details from the request
    $catid = $_POST['catid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $url = $_POST['url'];
    $quantity = $_POST['quantity'];

    // Insert the cake into the cart table
    $sql = "INSERT INTO `cart` (`oid`, `name`, `price`, `url`, `email`,`quantity`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isissi', $catid, $name, $price, $url, $_SESSION["email"], $quantity);
    $stmt->execute();

    // Redirect back to the same page
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cake flavours</title>
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
        <?php
        $query = "SELECT * FROM `cakecat`";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) > 0) {
            echo "<ul>";

            while ($row = $result->fetch_assoc()) {
                ?>
                <li class="category">
                    <img src="<?php echo $row["url"]?>" width="300px" height="200px"/><br>
                    <h3><?php echo $row["name"]?></h3>
                    <h3>Rs. <?php echo $row["price"]?></h3>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="catid" value="<?php echo $row["catid"]; ?>">
                        <input type="hidden" name="name" value="<?php echo $row["name"]; ?>">
                        <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
                        <input type="hidden" name="url" value="<?php echo $row["url"]; ?>">
                        <input type="number" name="quantity" min="1" max="5" value="1"/><br><br>
                        <button type="submit" class="btn1">Add to cart</button>
                    </form>
                </li>
                <?php
            }

            echo "</ul>";
        }
        ?>
    </div>
</body>
</html>