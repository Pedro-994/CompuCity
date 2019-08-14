<?php
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
        
        $check_product = "SELECT * from detpedido where IDPEDIDO='$ip_add' AND IDPRODUCTO='$p_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('Este producto ya existe en tu carrito')</script>";
            echo "<script>window.open('detalles.php?id_prod=$p_id','_self')</script>";
            
        }else{
            
            $query = "INSERT INTO detpedido (IDPRODUCTO,IDPEDIDO,CANTIDAD_PROD) values ('$p_id','$ip_add','$product_qty')";
            
            $run_query = mysqli_query($db,$query);
            
            echo "<script>window.open('detalles.php?id_prod=$p_id','_self')</script>";
            
        }
        
    }
    
}

    function getPro(){
        global $db;
        mysqli_set_charset($db,"utf8");
        $get_producto = "SELECT * FROM producto";
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
                        <a href='detalles.php?id_prod=$id_prod' class='btn btn-success'><i class='fas fa-cart-plus'>Agregar a
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
        $get_cat = "SELECT * FROM categoria";
        $resultado_cat = mysqli_query($db,$get_cat);
        while ($fila = mysqli_fetch_array($resultado_cat)){
            $id_cat = $fila['IDCATEGORIA'];
            $nomcat = $fila['NOMBRECAT'];
            
            echo "<a href='tienda.php?id_cat=$id_cat'class='list-group-item list-group-item-action bg-dark text-white'> $nomcat</a>";

                
        }
    }
    function getCategoria2(){
        global $db;
        mysqli_set_charset($db,"utf8");
        $get_cat = "SELECT * FROM categoria";
        $resultado_cat = mysqli_query($db,$get_cat);

        echo "<h6 class='text-uppercase font-weight-bold'>Categorias</h6> <hr class='accent-2 mt-0 d-inline-block mx-auto' style='width: 60px;'>
            <ul>";
        while ($fila = mysqli_fetch_array($resultado_cat)){
            $id_cat = $fila['IDCATEGORIA'];
            $nomcat = $fila['NOMBRECAT'];
            
            echo "<li><a href='tienda.php?id_cat=$id_cat'> $nomcat</a></li>";

                
        }
    }

    function nomcat(){
        global $db;
        if(isset($_GET['id_cat'])){

            $p_cat_id = $_GET['id_cat'];
            $get_p_cat ="SELECT * FROM categoria WHERE IDCATEGORIA = $p_cat_id";
            $run_p_cat = mysqli_query($db,$get_p_cat);
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            $p_cat_title = $row_p_cat['NOMBRECAT'];
            $p_cat_desc = $row_p_cat['DESCRIPCIONCAT'];
            $get_products ="SELECT * FROM PRODUCTO where IDCATEGORIA='$p_cat_id'";
        
        $run_products = mysqli_query($db,$get_products);
            $count = mysqli_num_rows($run_products);
            if($count==0){
            
                echo "
                    <div class= 'mt-5'>
                    
                        <h1 class='display-4'> No se encontraron productos en esta categoria </h1>
                    
                    </div>
                ";
                
            }else{
                
                echo "
                
                    <div class='mt-5'>
                    
                        <h class='display-4'> $p_cat_title </h>
                        
                        <p> $p_cat_desc </p>
                    
                    </div>
                
                ";
                
            }
        }


    }
    
function getpcatpro(){
    
    global $db;
    
    if(isset($_GET['id_cat'])){

        $p_cat_id = $_GET['id_cat'];
        
        $get_products ="SELECT * FROM producto where IDCATEGORIA='$p_cat_id'";
        
        $run_products = mysqli_query($db,$get_products);
        
        while($fila=mysqli_fetch_array($run_products)){

            $id_prod = $fila['IDPRODUCTO'];
            $nombre = $fila['NOMBRE_P'];
            $precio = $fila['PRECIO'];
            $categoria = $fila['IDCATEGORIA'];
            $img = $fila['img1'];

            
            echo "
            
            <div class='producto col-lg-4 col-md-6 col-sm-6 mb-4'>
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
    
}

?>