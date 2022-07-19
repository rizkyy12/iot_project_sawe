<!doctype html>
<?php
    include_once 'config.php';
?>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="css/style-user.css">
        <!-- <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet"> -->

        <title>Login User</title>
    </head>
    <body>
        <div class="global-container">
            <div class="card login-form">
                <div class="card-body">
                    <h1 class="card-title text-center">
                        Login
                    </h1>
                    <div class="card-text">
                        <form method="POST" action="cek_login.php">
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="username" class="form-control form-control-sm" id="typeEmailX" name="username" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control form-control-sm" id="typePasswordX" name="password" placeholder="Password"/>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>