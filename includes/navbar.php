    <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
    <a class="navbar-brand mx-auto text-white " href="index.php" style="width: 100px;">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link text-white" href="index.php"><i
                        class="fas fa-home"></i></a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUCTOS</a>
                <div class="dropdown-menu bg-black" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Motherboard</a>
                    <a class="dropdown-item" href="#">Almacenamiento</a>
                    <a class="dropdown-item" href="#">Procesador</a>
                    <a class="dropdown-item" href="#">Fuente de alimentacion</a>
                    <a class="dropdown-item" href="#">Memoria RAM</a>
                    <a class="dropdown-item" href="productos/Tarjetas-de-video.php">Tarjeta de video</a>
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
            <li class="nav-item "><a href="marcas.php" class="nav-link text-white">MARCAS</a></li>            
            <li class="nav-item "><a href="nosotros.php" class="nav-link text-white">ACERCA DE</a></li>
            <li class="nav-item "><a href="contacto.php" class="nav-link text-white">CONTACTO</a></li>
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
                            class="far fa-user"></i> Tu Cuenta</a>
                    <div class="dropdown-menu bg-black" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="cuenta.html">Mi cuenta</a>
                        <a class="dropdown-item" href="login.html">Inicia Sesion</a>
                        <a class="dropdown-item" href="register.html">Registrarse</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Consultar Pedido</a>
                    </div>
                </li>
                <li class="nav-item"><a href="" class="nav-link text-white"><i class="fas fa-shopping-cart"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>