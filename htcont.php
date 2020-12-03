<?php
include 'config.php';
$roomname = $_POST['roomname'];
$search = "SELECT * FROM `messages` WHERE `roomname` LIKE '$roomname'";
$q = mysqli_query($conn, $search);
$rows = mysqli_num_rows($q);
$res = "";
if($rows > 0){
    while($row = mysqli_fetch_assoc($q)) {
      $res = $res . "<div class='container'>";
      $res = $res . "<p><span class='name'> " . $row['ip'] . " " . "says:" . "</span> ". "<b>" . $row['message'] . "</b>" . "</p>";
      $res = $res . "<span class='time-right'>" . $row['time'] ."</span>";
      $res = $res . "</div>";
    }
}
echo $res;
?>