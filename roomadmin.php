<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'config.php';
    $roomname = $_POST["roomname"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM `rooms` WHERE `roomname` LIKE '$roomname' AND `password` LIKE '$password'";
    $q = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($q);
    if($rows> 0){
        session_start();
        $_SESSION["roomname"] = $roomname;
        echo "<script>window.location='http://localhost/myanony/dashboard.php';</script>";
    }
    else{
        $alerts = "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Cretentials</strong> The information you have given is incorrect
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Room Admin Pannel</title>
</head>

<body>
    <form method="POST" action="roomadmin.php">
        <?php if($_SERVER["REQUEST_METHOD"]=="POST"){echo $alerts;} ?>
        <div class="login" style="padding: 211px;">
            <div class="form-group">
                <input type="text" name="roomname" class="form-control" id="roomname" aria-describedby="emailHelp"
                    placeholder="Enter Roomname">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</html>