<?php
    $name = "compucity";
    $db = mysqli_connect("localhost","root","","compucity");

    
function getRealIpUser(){
    
    switch(true){
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];       
    }
    
}

function add_cart(){
    
    global $db;
    
    if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];
        
        $product_qty = $_POST['cantidad'];
        
        $check_product = "SELECT * FROM DETPEDIDO WHERE IDPEDIDO='$ip_add' AND IDDETALLE='$p_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('Este producto ya existe en tu carrito')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id', '_self')</script>";
            
        }else{
            
            $query = "INSERT INTO DETPEDIDO (IDDETALLE,IDPEDIDO,CANTIDAD_PROD) values ('$p_id','$ip_add','$product_qty')";
            
            $run_query = mysqli_query($db,$query);
            
            echo "<script>window.open('details.php?pro_id=$p_id', '_self')</script>";
            
        }
        
    }
    
}

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

            
            echo "<div class='producto col-lg-4 col-md-6 col-sm-6 mb-4' category='$categoria'>
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
            
            echo "<a href'tienda.php?id_cat=$id_cat' class='list-group-item list-group-item-action bg-dark categoria'
                category='$id_cat'>$nomcat</a>";
        }
    }

    function mostrarProductos(){
        global $db;

        if(isset($_GET['id_cat'])){

            $id_cat = $_GET['id_cat'];

            $get_cat = "SELECT * FROM CATEGORIA WHERE IDCATEGORIA = $id_cat";

            $run_cat = mysqli_query($db,$get_cat);

            $row_cat = mysqli_fetch_array($run_cat);

            $titulo_cat = $row_cat['NOMBRECAT'];
            $desc_cat = $row_cat['DESCRIPCIONCAT'];

            $get_productos = "SELECT * FROM PRODUCTO WHERE IDCATEGORIA = $id_cat";

            $run_productos = mysqli_query($db,$get_productos);
            $count = mysqli_num_rows($run_productos);

            if(count==0){
                echo "No hay productos";
            }else{
                echo " <h1> $titulo_cat</h1>
                <p> $desc_cat</p>";
            }
            
        }

    }

?>