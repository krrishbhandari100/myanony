<?php
include 'config.php';
include 'variables.php';
$roomname = $_POST["roomname"];
$sql = "SELECT * FROM `rooms` WHERE `roomname` LIKE '$roomname'";
$q = mysqli_query($conn,$sql);
if(mysqli_num_rows($q)=="0"){
    echo "<script>window.location='$address';</script>";
}
?>