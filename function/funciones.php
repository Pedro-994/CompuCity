<?php
    $db = mysqli_connect("localhost","root","","compucity");


    function getPro(){
        global $db;
        mysqli_set_charset($db,"utf8");
        $get_producto = "SELECT * FROM PRODUCTO";
        $resultado_producto = mysqli_query($db,$get_producto);
        if(mysqli_connect_errno()){
            echo "Error al conectar a la Base de datos";
            exit();
        }
        mysqli_select_db($db,"compucity") or die ("No se encuentra la base de datos");

        while ($fila = mysqli_fetch_array($resultado_producto)){

            $id_prod = $fila['IDPRODUCTO'];
            $nombre = $fila['NOMBRE_P'];
            $precio = $fila['PRECIO'];
            $categoria = $fila['IDCATEGORIA'];
            $img = $fila['img1'];

            
            echo "<div class='producto col-lg-4 col-md-6 col-sm-6 mb-4'>
            <div class='card align-items-center'>
                <img class='card-img-top'
                    src='admin/img_prod/$img' alt=''>
                <div class='card-body '>
                    <a href='detalles.php?id_prod=$id_prod'>
                        <h5 class='card-title'>$nombre</h5>
                    </a>
                    <p class='price'> $ $precio</p>
                    <p class='button'>
                        <a href='detalles.php?id_prod=$id_prod'
                            class='btn btn-outline-success'>Detalles</a>
                        <a href='detalles.php?id_prod$id_prod' class='btn btn-success'><i class='fas fa-cart-plus'>Agregar a
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
        mysqli_set_charset($db,"utf8");
        $get_cat = "SELECT * FROM CATEGORIA";
        $resultado_cat = mysqli_query($db,$get_cat);
        while ($fila = mysqli_fetch_array($resultado_cat)){
            $id_cat = $fila['IDCATEGORIA'];
            $nomcat = $fila['NOMBRECAT'];
            
            echo "<a href='tienda.php?id_cat=$id_cat'class='list-group-item list-group-item-action bg-dark text-white'> $nomcat</a>";

                
        }
    }

?>