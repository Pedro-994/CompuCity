<?php
    session_start();
    include("includes/DB.php");
    include("function/funciones.php");
?>
<?php
    
    if(isset($_GET['id_prod'])){
        $id_prod = $_GET['id_prod'];

        mysqli_set_charset($db,"utf8");
        
        $get_p = "SELECT * FROM producto WHERE IDPRODUCTO = $id_prod";

        $run_P = mysqli_query($db,$get_p);

        $row_p = mysqli_fetch_array($run_P);

        $p_cat_id = $row_p['IDCATEGORIA'];
        $img1 = $row_p['img1'];
        $img2 = $row_p['img2'];
        $img3 = $row_p['img3'];
        $img4 = $row_p['img4'];
        $name = $row_p['NOMBRE_P'];
        $price = $row_p['PRECIO'];
        $pro_desc = $row_p['DESCRIPCION'];
    
        $get_p_cat = "SELECT * from categoria where IDCATEGORA='$p_cat_id'";
        
        $run_p_cat = mysqli_query($db,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];

    }
    
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/75a823aec8.js"></script>
    <script src="js/maps.js"></script>
    <title>CompuCity</title>
  </head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
        <!--Barra de navegacion-->
        <a class="navbar-brand mx-auto" href="../index.php"><img src="/img/logo.jpg" class="rounded" style="width: 100px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link text-white" href="../index.php"><i
                            class="fas fa-home"></i></a>
                </li>
                <?php 
                   
                   if(!isset($_SESSION['NOMBRE_USUARIO'])){
                       
                       echo "<li class='nav-item '><a class='nav-link text-white'>Bienvenido : Invitado</a></li>";
                       
                   }else{
                       $nombre = $_SESSION['NOMBRE_USUARIO'];
                       echo "<li class='nav-item '><a class='nav-link text-white'>Bienvenido : $nombre </a></li>";                       
                   }
                   ?>
                <li class="nav-item "><a href="../tienda.php" class="nav-link text-white">PRODUCTOS</a></li>
                <li class="nav-item "><a href="../nosotros.php" class="nav-link text-white">ACERCA DE</a></li>
                <li class="nav-item "><a href="../contacto.php" class="nav-link text-white">CONTACTO</a></li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar Producto" aria-label="Search">
                <button class="btn text-white my-2 my-sm-0" type="submit"><i class="fas fa-search"></i>

                </button>
            </form>
            <div class="float right">
                <ul class="navbar-nav mr-auto ">
                    <li class="nav-item btn-group dropleft ">
                        <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="far fa-user"></i> Tu
                            Cuenta</a>
                        <div class="dropdown-menu bg-black" aria-labelledby="navbarDropdown">
                            <?php 
                           
                           if(!isset($_SESSION['NOMBRE_USUARIO'])){
                       
                                echo "<a class='dropdown-item' href='login.php'>Iniciar Sesion</a>
                                <a class='dropdown-item' href='../registro_cliente.php'>Registrarse</a>";

                                

                               }else{
                                echo "<a class='dropdown-item' href='../mi_cuenta.php'>Mi cuenta</a>
                                <a class='dropdown-item' href='logout.php'>Cerrar Sesion</a>
                                <a class='dropdown-item' >Consultar Pedido</a>";

                               }
                           
                         ?>                            
                        </div>
                    </li>
                    <li class="nav-item"><a href="../carrito.php" class="nav-link text-white"><i
                                class="fas fa-shopping-cart"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    