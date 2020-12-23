<?php
//connecting to db
include 'config.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $message = $_POST['message'];
    $roomname = $_POST['roomname'];
    $ip = $_SERVER["REMOTE_ADDR"];
    $join_room = $_POST["join_room"];
    $sql = "INSERT INTO `messages` (`roomname`, `message`, `ip`, `join_name`) VALUES ('$roomname', '$message', '$ip', '$join_room');";
    if(mysqli_query($conn, $sql)){
        echo "";
    }
    else{
        echo "Error: " . mysqli_errno($conn);
    }
    mysqli_close($conn);
}

?>