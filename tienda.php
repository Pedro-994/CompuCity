<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../js/script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
    <title>Tarjetas Graficas</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
        <!--Barra de navegacion-->
        <a class="navbar-brand mx-auto text-white " href="../index.php" style="width: 100px;">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link text-white" href="../index.php"><i
                            class="fas fa-home"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUCTOS</a>
                    <div class="dropdown-menu bg-black" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Motherboard</a>
                        <a class="dropdown-item" href="#">Almacenamiento</a>
                        <a class="dropdown-item" href="#">Procesador</a>
                        <a class="dropdown-item" href="#">Fuente de alimentacion</a>
                        <a class="dropdown-item" href="#">Memoria RAM</a>
                        <a class="dropdown-item" href="Tarjetas-de-video.php">Tarjeta de video</a>
                        <a href="#" class="dropdown-item">Accesorios</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DISEÑAR PC</a>
                    <div class="dropdown-menu bg-black" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Mejora tu PC</a>
                        <a class="dropdown-item" href="#">Configurar PC desde cero</a>
                    </div>
                </li>
                <li class="nav-item "><a href="../marcas.php" class="nav-link text-white">MARCAS</a></li>
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
                            <a class="dropdown-item" href="../mi_cuenta.php">Mi cuenta</a>
                            <a class="dropdown-item" href="../login.php">Inicia Sesion</a>
                            <a class="dropdown-item" href="../registro_cliente.php">Registrarse</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Consultar Pedido</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="../carrito_de_compra.php" class="nav-link text-white"><i
                                class="fas fa-shopping-cart"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Fin barra de navegacion-->
    <div class="container-fluid mt-5">
        <div class="row text-white">
            <div class="col-md-3">
              <?php
                include("includes/sidebar.php");
              ?>
            </div>
            <!--Fin productos-->
            <div class="col-12 col-md-9 ">
                <!--Contenedor Productos-->
                <div class="container-fluid">
                    <p class="display-4 ">Tarjetas Grafica</p>
                    <section class="lista_productos mt-5">
                        <div class="card-deck justify-content-md-center">
                            <div class=" producto col-lg-4 col-md-6 col-sm-6 mb-4" category="Chip-Nvidia">
                                <div class="card align-items-center">
                                    <img class="card-img-top"
                                        src="../img/productos/Tarjetas de video/nvidia/geforce-rtx-2080-ti-gallery-a.jpg">
                                    <div class="card-body">
                                        <a href="Grafica/2080ti.html">
                                            <h5 class="card-title">2080Ti</h5>
                                        </a>
                                        <p class="price">$15000</p>
                                        <p class="button">
                                            <a href="Grafica/2080ti.html" class="btn btn-outline-success">Detalles</a>
                                            <a href="#" class="btn btn-success"><i class="fas fa-cart-plus">Agregar a
                                                    Carrito</i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="producto col-lg-4 col-md-6 col-sm-6 mb-4" category="Chip-Nvidia">
                                <div class="card align-items-center">
                                    <img class="card-img-top"
                                        src="../img/productos/Tarjetas de video/Aorus/2080/2080_aorus.png" alt="">
                                    <div class="card-body ">
                                        <a href="/productos/Grafica/Aorus/2080/Aorus_2080.html">
                                            <h5 class="card-title">Aorus 2080</h5>
                                        </a>
                                        <p class="price">$15000</p>
                                        <p class="button">
                                            <a href="/productos/Grafica/Aorus/2080/Aorus_2080.html"
                                                class="btn btn-outline-success">Detalles</a>
                                            <a href="#" class="btn btn-success"><i class="fas fa-cart-plus">Agregar a
                                                    Carrito</i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="producto col-lg-4 col-md-6 col-sm-6 mb-4" category="Chip-Nvidia">
                                <div class="card align-items-center">
                                    <img class="card-img-top"
                                        src="../img/productos/Tarjetas de video/Aorus/2080WB/aorus_2080_8g.png" alt="">
                                    <div class="card-body">
                                        <a href="/productos/Grafica/Aorus/2080WB/Aorus_2080_WB.html">
                                            <h5 class="card-title">Aorus 2080 WB</h5>
                                        </a>
                                        <p class="price">$15000</p>
                                        <p class="button">
                                            <a href="#" class="btn btn-outline-success">Detalles</a>
                                            <a href="#" class="btn btn-success"><i class="fas fa-cart-plus">Agregar a
                                                    Carrito</i>
                                            </a>
                                        </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="producto col-lg-4 col-md-6 col-sm-6 mb-4" category="Chip-Nvidia">
                                <div class="card align-items-center">
                                    <img class="card-img-top"
                                        src="../img/productos/Tarjetas de video/Asus/RTX_2060/DUAL-RTX2060-O6G.jpg"
                                        alt="">
                                    <div class="card-body">
                                        <a href="/productos/Grafica/Asus/RTX_2060/RTX_2060.html">
                                            <h5 class="card-title">RXT 2060</h5>
                                        </a>
                                        <p class="price">$15000</p>
                                        <p class="button">
                                            <a href="#" class="btn btn-outline-success">Detalles</a>
                                            <a href="#" class="btn btn-success"><i class="fas fa-cart-plus">Agregar a
                                                    Carrito</i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="producto col-lg-4 col-md-6 col-sm-6 mb-4" category="Chip-AMD">
                                <div class="card align-items-center">
                                    <img class="card-img-top"
                                        src="../img/productos/Tarjetas de video/Asus/Strix_RX570/Strix_RX5070.jpg"
                                        alt="">
                                    <div class="card-body">
                                        <a href="/productos/Grafica/Asus/Strix_RX570/STRIX-RX570.html">
                                            <h5 class="card-title">RX 570</h5>
                                        </a>
                                        <p class="price">$15000</p>
                                        <p class="button">
                                            <a href="/productos/Grafica/Asus/Strix_RX570/STRIX-RX570.html"
                                                class="btn btn-outline-success">Detalles</a>
                                            <a href="#" class="btn btn-success"><i class="fas fa-cart-plus">Agregar a
                                                    Carrito</i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="producto col-lg-4 col-md-6 col-sm-6 mb-4" category="Chip-AMD">
                                <div class="card align-items-center">
                                    <img class="card-img-top"
                                        src="../img/productos/Tarjetas de video/Gigabyte/Radeon590/radeon_rx_590.png"
                                        alt="">
                                    <div class="card-body">
                                        <a href="">
                                            <h5 class="card-title">Radeon 590</h5>
                                        </a>
                                        <p class="price">$15000</p>
                                        <p class="button">
                                            <a href="#" class="btn btn-outline-success">Detalles</a>
                                            <a href="#" class="btn btn-success"><i class="fas fa-cart-plus">Agregar a
                                                    Carrito</i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="producto col-lg-4 col-md-6 col-sm-6 mb-4" category="Chip-AMD">
                                <div class="card align-items-center">
                                    <img class="card-img-top"
                                        src="../img/productos/Tarjetas de video/Gigabyte/RadeonVII/Radeon VII.png"
                                        alt="">
                                    <div class="card-body">
                                        <a href="">
                                            <h5 class="card-title">Radeon VII</h5>
                                        </a>
                                        <p class="price">$15000</p>
                                        <p class="button">
                                            <a href="#" class="btn btn-outline-success">Detalles</a>
                                            <a href="#" class="btn btn-success"><i class="fas fa-cart-plus">Agregar a
                                                    Carrito</i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="producto col-lg-4 col-md-6 col-sm-6 mb-4" category="Chip-Nvidia">
                                <div class="card align-items-center">
                                    <img class="card-img-top"
                                        src="../img/productos/Tarjetas de video/MSI/GTX960/gtx_960_g.png" alt="">
                                    <div class="card-body">
                                        <a href="">
                                            <h5 class="card-title">RXT 960</h5>
                                        </a>
                                        <p class="price">$15000</p>
                                        <p class="button">
                                            <a href="#" class="btn btn-outline-success">Detalles</a>
                                            <a href="#" class="btn btn-success"><i class="fas fa-cart-plus">Agregar a
                                                    Carrito</i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="producto col-lg-4 col-md-6 col-sm-6 mb-4" category="Chip-Nvidia">
                                <div class="card align-items-center">
                                    <img class="card-img-top"
                                        src="../img/productos/Tarjetas de video/MSI/GTXGE/gtx_980_GE.png" alt="">
                                    <div class="card-body">
                                        <a href="">
                                            <h5 class="card-title">GTX 980</h5>
                                        </a>
                                        <p class="price">$15000</p>
                                        <p class="button">
                                            <a href="#" class="btn btn-outline-success">Detalles</a>
                                            <a href="#" class="btn btn-success"><i class="fas fa-cart-plus">Agregar a
                                                    Carrito</i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="producto col-lg-4 col-md-6 col-sm-6 mb-4" category="Chip-AMD">
                                <div class="card align-items-center">
                                    <img class="card-img-top"
                                        src="../img/productos/Tarjetas de video/MSI/R7_370/radeon_r7_370.png" alt="">
                                    <div class="card-body">
                                        <a href="">
                                            <h5 class="card-title">Radeon R7</h5>
                                        </a>
                                        <p class="price">$15000</p>
                                        <p class="button">
                                            <a href="#" class="btn btn-outline-success">Detalles</a>
                                            <a href="#" class="btn btn-success"><i class="fas fa-cart-plus">Agregar a
                                                    Carrito</i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="producto col-lg-4 col-md-6 col-sm-6 mb-4" category="Chip-AMD">
                                <div class="card align-items-center">
                                    <img class="card-img-top"
                                        src="../img/productos/Tarjetas de video/MSI/R9_380/radeon_r9_380.png" alt="">
                                    <div class="car">
                                        <a href="">
                                            <h5 class="card-title">R9 380</h5>
                                        </a>
                                        <p class="price">$15000</p>
                                        <p class="button">
                                            <a href="#" class="btn btn-outline-success">Detalles</a>
                                            <a href="#" class="btn btn-success"><i class="fas fa-cart-plus">Agregar a
                                                    Carrito</i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

</body>

</html>