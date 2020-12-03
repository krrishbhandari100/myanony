<?php
//connecting to db
include 'config.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $message = $_POST['message'];
    $roomname = $_POST['roomname'];
    $ip = $_SERVER["REMOTE_ADDR"];
    $sql = "INSERT INTO `messages` (`roomname`, `time`, `message`, `ip`) VALUES ('$roomname', CURRENT_TIMESTAMP, '$message', '$ip');";
    if(mysqli_query($conn, $sql)){
        echo "";
    }
    else{
        echo "Error: " . mysqli_errno($conn);
    }
    mysqli_close($conn);
}

?>