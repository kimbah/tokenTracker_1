<?php require_once('../private/initialize.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./stylesheets/style.css" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <title>User Login and Registration</title>
</head>
<body>
    <div class="containter">
        <div class="login-box">
            <div class="row">
                <div class="col-md-6 login-left">
                    <h2> Login here</h2>
                    <form action="validation.php" method="post">
                        <div class="form-group">
                            <label for="">Username:</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="col-md-6 login-right">
                    <h2> Register here</h2>
                    <form action="registration.php" method="post">
                        <div class="form-group">
                            <label for="">Username:</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>