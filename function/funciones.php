<?php
    $name = "compucity";
    $db = mysqli_connect("localhost","root","","compucity");

    function getPro(){
        global $db;
        $get_producto = "SELECT * FROM PRODUCTO";
        $resultado_producto = mysqli_query($db,$get_producto);
        if(mysqli_connect_errno()){
            echo "Error al conectar a la Base de datos";
            exit();
        }
        mysqli_select_db($db,"compucity") or die ("No se encuentra la base de datos");

        while ($fila = mysqli_fetch_array($resultado_producto)){

            $ID= $fila['IDPRODUCTO'];
            $nombre = $fila['NOMBRE_P'];
            $precio= $fila['PRECIO'];

            
            echo "<div class='producto col-lg-4 col-md-6 col-sm-6 mb-4' category='Chip-Nvidia'>
            <div class='card align-items-center'>
                <img class='card-img-top'
                    src='../img/productos/Tarjetas de video/Aorus/2080/2080_aorus.png' alt=''>
                <div class='card-body '>
                    <a href='/productos/Grafica/Aorus/2080/Aorus_2080.html'>
                        <h5 class='card-title'>$nombre</h5>
                    </a>
                    <p class='price'> $ $precio</p>
                    <p class='button'>
                        <a href='/productos/Grafica/Aorus/2080/Aorus_2080.html'
                            class='btn btn-outline-success'>Detalles</a>
                        <a href='#' class='btn btn-success'><i class='fas fa-cart-plus'>Agregar a
                                Carrito</i>
                        </a>
                    </p>
                </div>
            </div>
        </div>";
        }
    }
?>