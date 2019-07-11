<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet">
        <title>Login</title>
    </head>
<body>
<?php
        include("includes/navbar.php");
    ?>
        <div class="login-box">
                <h1>Iniciar sesion</h1>
                <div class="textbox">
                  <i class="fas fa-user"></i>
                  <input type="text" placeholder="Username">
                </div>
                <div class="textbox">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Contraseña">
                </div>
                <input type="button" class="btn btn-block btn-outline-success" value="Iniciar sesion">
        </div>
</body>
</html>