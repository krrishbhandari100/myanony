<?php $roomname = $_GET['roomname']; ?>
<?php
include 'config.php';
include 'variables.php';
$sql = "SELECT * FROM `rooms` WHERE `roomname` LIKE '$roomname'";
$q = mysqli_query($conn,$sql);
if(mysqli_num_rows($q)>0){
  while($row = mysqli_fetch_assoc($q)) {
    $ip = $row['ip_addr'];
    $password = $row["password"];
  }
}
if($ip==$_SERVER["REMOTE_ADDR"]){
  $btn = "<a href='#'><button style='border: 1px solid black;'>Delete Room</button></a>";
  echo "<center>Your room password is: " . $password . "</center>";
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <style>
    .container {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
    }

    .darker {
        border-color: #ccc;
        background-color: #ddd;
    }

    .container::after {
        content: "";
        clear: both;
        display: table;
    }

    .container img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }

    .container img.right {
        float: right;
        margin-left: 20px;
        margin-right: 0;
    }

    .time-right {
        float: right;
        color: #aaa;
    }

    .time-left {
        float: left;
        color: #999;
    }

    .chatbox {
        overflow: scroll;
    }
    </style>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>
    <link href='static/main.css' rel='stylesheet'>
    
    <title>Room</title>
</head>
<body class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">
    <center>
        <h1 style="font-size: 40px;">Roomname - <?php echo $roomname; ?></h1>
        <?php echo $btn; ?>
        <div class="script">
        </div>
        <div style="height: 25rem; width: 65rem; border: 1px solid black;" class="chatbox">

        </div>
        <input type="text" id="message" class="message" style="width: 60rem;">
        <input type="button" class="btn" id="btn" style="width: 5rem;" value="Send">
    </center>
</body>
<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $(".btn").click(function() {
        var message = $(".message").val()
        $.post("postmsg.php", {
            message: message,
            roomname: '<?php echo $roomname; ?>'
        }, function(data, status) {
            // console.log(data)
            $(".chatbox").html(data);
            $(".message").val("");
        })
    })
})
</script>

<script>
$(document).ready(function() {
    setInterval(runfunc, 1000)

    function runfunc() {
        var message = $(".message").val()
        $.post("htcont.php", {
            roomname: '<?php echo $roomname; ?>'
        }, function(data, status) {
            // console.log(data)
            $(".chatbox").html(data);
        })
        
        $.post("checkroom.php", {
            roomname: '<?php echo $roomname; ?>'
        }, function(data, status) {
            $(".script").html(data)
        })
    }
})
</script>
<script>
var input = document.getElementById("message");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("btn").click();
  }
});
</script>


</html>