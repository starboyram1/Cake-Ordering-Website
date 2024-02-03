<?php
include 'connect.php';
session_start();
if(isset($_POST['add'])){
    $tid = $_POST['tid'];
    $name = $_POST['name'];
    $url = $_POST['url'];
    $price = $_POST['price'];
    $sql ="INSERT INTO `caketypes`(`tid`, `name`, `url`, `price`) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('issi', $tid, $name, $url, $price);

    $result = $stmt->execute();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
if(isset($_POST['update'])){
    $tid = $_POST['tid'];
    $name = $_POST['name'];
    $url = $_POST['url'];
    $price = $_POST['price'];
    $sql ="UPDATE `caketypes` SET `name` = ?, `url` = ?, `price` = ? WHERE `tid` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssii',$name,$url,$price,$tid);

    $result = $stmt->execute();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
if(isset($_POST['delete'])){
    $tid = $_POST['tid'];
    $sql ="DELETE FROM `caketypes` WHERE `tid` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $tid);

    $result = $stmt->execute();
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
    <title>Edit- Online Cake Delivery </title>
    <link rel="stylesheet" href="style.css">
    <script>
        function toggleAddForm() {
            var form = document.getElementById("myForm");
            form.classList.toggle("hidden");
        }
        function toggleDeleteForm(){
            var form = document.getElementById("myDelForm");
            form.classList.toggle("hidden");
        }
        function toggleUpdateForm(){
            var form = document.getElementById("myUpdateForm");
            form.classList.toggle("hidden");
        }
    </script>
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
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
            </tr>

            <?php
                $sql="SELECT * FROM `caketypes`";
                $stmt=$conn->prepare($sql);
                $stmt->execute();
                $result=$stmt->get_result();

                while($row = $result->fetch_assoc()){
                ?>
                    <tr>
                        <td><?php echo $row['tid']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><img src="<?php echo $row['url']; ?>" width="100px" height="100px"></td>
                        <td><?php echo $row['price']; ?></td>
                    </tr>
            <?php
                }
            ?>
        </table>
    </div>

    <div class="cat" style="text-align:center;">
        <button onclick="toggleAddForm()" class="btn">ADD</button>
            <form method="post" id="myForm" class="hidden">
            <pre>
                <b>Enter the ID of the cake type you want to update(Maintain the order of the ID):</b><br>
                <input type="text" name="tid" placeholder="Enter ID"><br>
                <input type="text" name="name" placeholder="Enter Name"><br>
                <b>Enter the url of the image only:</b><br>
                <input type="text" name="url" placeholder="Enter url"><br>
                <input type="text" name="price" placeholder="Enter price"><br>
                <button type="submit" name="add">ADD to cake types</button><br>
            </pre>
            </form>
        
        <button onclick="toggleDeleteForm()" class="btn" >DELETE</button>
            <form method="post" id="myDelForm" class="hidden">
            <pre>
                <input type="text" name="tid" placeholder="Enter ID"><br>
                <button type="submit" name="delete">DELETE cake types</button><br>
            </pre>
            </form>

        <button onclick="toggleUpdateForm()" class="btn">UPDATE</button>
            <form method="post" id="myUpdateForm" class="hidden">
            <pre>
                <input type="text" name="tid" placeholder="Enter ID"><br>
                <b>Enter the values to be updated as:</b><br>
                <input type="text" name="name" placeholder="Enter Name"><br>
                <b>Enter the url of the image only:</b><br>
                <input type="text" name="url" placeholder="Enter url"><br>
                <input type="text" name="price" placeholder="Enter price"><br>
                <button type="submit" name="update">UPDATE to cake types</button><br>
            </pre>
            </form>
    </div>
    <br><br>

</body>
</html>