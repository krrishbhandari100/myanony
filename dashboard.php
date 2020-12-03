<?php
session_start();
if(!isset($_SESSION["roomname"])){
    echo "<script>window.location='http://localhost/myanony/';</script>";
}
else{
    echo $_SESSION["roomname"];
}
?>