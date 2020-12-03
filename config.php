<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "myanony";
$conn = mysqli_connect($server, $user, $pass, $db);
if($conn){
    echo "";
}
else{
    echo "Error: " . mysqli_errno($conn);
}
?>