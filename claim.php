<?php
include 'config.php';
include 'variables.php';
if($_SERVER["REQUEST_METHOD"]=="GET"){
    echo "Method not allowed";
}
else{
    $roomname = $_POST['roomname'];
    if($roomname==""){
        $HTML_CONTENT = "
        <!DOCTYPE html>
        <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Warning</title>
            </head>
        <body>
            
        </body>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>
        <script>
            swal('Warning', 'Roomname cannot be be blank', 'warning')
            .then(() => {
            window.location='$address';
            });
        </script>
        </html>
        ";
    }
    
    else if(strlen($roomname)>20 or strlen($roomname)<2){
        $HTML_CONTENT = "
        <!DOCTYPE html>
        <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Warning</title>
            </head>
        <body>
            
        </body>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>
        <script>
            swal('Warning', 'Roomname must be between 2 to 20 characters', 'warning')
            .then(() => {
            window.location='$address';
            });
        </script>
        </html>
        ";
    }
    
    else if(!ctype_alnum($roomname)){
        $HTML_CONTENT = "
        <!DOCTYPE html>
        <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Document</title>
            </head>
        <body>
            
        </body>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>
        <script>
            swal('Warning', 'Roomname must be containing only alphabets and numbers', 'warning')
            .then(() => {
            window.location='$address;
            });
        </script>
        </html>
        ";
    }
    else{
        $sql = "SELECT * FROM `rooms` WHERE `roomname` LIKE '$roomname'";
        $q = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($q);
        if($row>0){
            $HTML_CONTENT = "
        <!DOCTYPE html>
        <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Document</title>
            </head>
        <body>
            
        </body>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>
        <script>
            swal('Warning', 'This roomname is claimed please choose another roomname', 'warning')
            .then(() => {
            window.location='$address';
            });
        </script>
        </html>
        ";
        }
        else{
            $password = MD5(rand());
            $ip = $_SERVER['REMOTE_ADDR'];
           $ins_sql = "INSERT INTO `rooms`(`roomname`, `password`, `ip_addr`) VALUES ('$roomname','$password','$ip')";
           if(mysqli_query($conn, $ins_sql)){
            $HTML_CONTENT = "
            <!DOCTYPE html>
            <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Document</title>
                </head>
            <body>
                
            </body>
            <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
            <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>
            <script>
                swal('Success', 'your room is created go and chat with freely', 'success')
                .then(() => {
                window.location='$address" . "setjoiningname.php?roomname=$roomname';
                });
            </script>
            </html>
            ";
           }
           else{
               echo "Error: " . mysqli_errno($conn);
           }
        }
    }
}
echo $HTML_CONTENT;
mysqli_close($conn);