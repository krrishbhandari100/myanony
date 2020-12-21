<?php
include 'config.php';
include 'variables.php';
$roomname = $_GET["roomname"];
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joining Name</title>
    <script>
        var name = prompt('Enter a joining name for roomname: <?php echo $roomname; ?>')
        window.location='<?php echo $address; ?>room.php?roomname=<?php echo $roomname; ?>&joining_name=' + name
    </script>
</head>
<body>
    
</body>
</html>