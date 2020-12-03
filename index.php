<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .head {
            font-size: 50px;
            margin-top: 138px;
        }

        .btn {
            width: 59px;
            height: 32px;
            border-radius: 12px;
            background-color: #f713eb;
            border: 1px solid orange;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Myanonymouschat</title>
</head>

<body class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">
    <header class="text-gray-700 body-font" style="background-color: black; color: white;">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <span class="ml-3 text-xl">Myanonymouschat</span>
        </div>
    </header>
    <center>
        <h1 class="head">Welcome to Myanonymouschat</h1><br>
        <span><b>Myanonymouschat/</b></span>
        <form action="claim.php" method="POST">
            <input type="text" name="roomname" style="width: 300px;"><br><br>
            <input type="submit" name="krrish" class="btn">
        </form>
    </center>
</body>

</html>