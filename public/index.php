<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./stylesheets/style.css">
    
    <link rel="stylesheet" type="text/css" href="bootstrap-grid.min.css">
    <title>Home Page</title>
</head>
<body>
     
    <div class="main-menu">
        <h1> Welcome <?php echo $_SESSION['username'] ?></h1>
        <a href="login.php">Login in to access tokens and exchanges</a>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>