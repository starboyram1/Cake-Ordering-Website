<?php
$host="localhost";
$user="root";
$pwd="root";
$dbname="cake";
$conn=new MySQLi($host,$user,$pwd,$dbname);
if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}
?>