<?php
session_start();
  include("includes/DB.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">Admin</a>
        <?php 
          if(isset($_SESSION['NOMBREA'])){       
            $nombread = $_SESSION['NOMBREA'];
            echo "<a class='nav-link text-white'>Bienvenido : $nombread </a>
            <a class='nav-link text-white' href='productos.php'>Productos</a>
            <a class='nav-link text-white' href='logout.php'>Cerrar Sesion</a>         
            <a class='nav-link text-white' href='registro_Admin.php'>Registrar Admin</a>";
          }  
        ?>                       
          </div>
      </div>
    </nav>