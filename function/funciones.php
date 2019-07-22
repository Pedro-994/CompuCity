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

            $id = $fila['IDPRODUCTO'];
            $nombre = $fila['NOMBRE_P'];
            $precio = $fila['PRECIO'];
            $categoria = $fila['IDCATEGORIA'];
            $img = $fila['img1'];

            
            echo "<div class='producto col-lg-4 col-md-6 col-sm-6 mb-4' category='$categoria'>
            <div class='card align-items-center'>
                <img class='card-img-top'
                    src='admin/img_prod/$img' alt=''>
                <div class='card-body '>
                    <a href='detalles.php?id=$id'>
                        <h5 class='card-title'>$nombre</h5>
                    </a>
                    <p class='price'> $ $precio</p>
                    <p class='button'>
                        <a href='detalles.php?id=$id'
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

    function getCategoria(){
        global $db;
        $get_cat = "SELECT * FROM CATEGORIA";
        $resultado_cat = mysqli_query($db,$get_cat);
        while ($fila = mysqli_fetch_array($resultado_cat)){
            $id = $fila['IDCATEGORIA'];
            $nombre = $fila['NOMBRECAT'];
            
            echo "<a href'tienda.php?p_cat=$id' class='list-group-item list-group-item-action bg-dark categoria'
                category='$id'>$nombre</a>";
        }

    }
?>