<div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-money fa-fw"></i>Insertar Producto
            </h3>
        </div>
        <div class="card-body">
            <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group row  justify-content-md-center">
                    <label class="col-md-6">Nombre Producto</label>
                    <div class="col-md-6">
                        <input type="text" name="NOMBRE_P" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row justify-content-md-center">
                    <label class="col-md-6">Categoria</label>
                    <div class="col-md-6">
                        <select name="CAT" class="form-control" >
                        <option> Seleccione una categoria</option>
                        <?php
                            $get_categoria = "SELECT * FROM categoria";
                            $resultado_categoria = mysqli_query($db,$get_categoria);

                            while ($fila = mysqli_fetch_array($resultado_categoria)){

                                $idcategoria= $fila['IDCATEGORIA'];
                                $nombrecat = $fila['NOMBRECAT'];
                                    
                                echo "<option value='$idcategoria'> $nombrecat </option>";
                            }
                            mysqli_close;
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row justify-content-md-center">
                    <label class="col-md-6">MARCA</label>
                    <div class="col-md-6">
                        <input type="text" name="MARCA" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row justify-content-md-center">
                    <label class="col-md-6">CARACTERISTICAS</label>
                    <div class="col-md-6">
                        <textarea name="CARACTERISTICAS" class="form-control" cols="19" rows="6" ></textarea>
                    </div>
                </div>
                <div class="form-group row justify-content-md-center">
                    <label class="col-md-6">Precio</label>
                    <div class="col-md-6">
                        <input type="float" name="PRECIO" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row  justify-content-md-center">
                    <label class="col-md-6">Imagen 1</label>
                    <div class="col-md-6">
                        <input type="file" name="img1" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row  justify-content-md-center">
                    <label class="col-md-6">Imagen 2</label>
                    <div class="col-md-6">
                        <input type="file" name="img2" class="form-control" required>
                    </div>
                </div>  
                <div class="form-group row  justify-content-md-center">
                    <label class="col-md-6">Imagen 3</label>
                    <div class="col-md-6">
                        <input type="file" name="img3" class="form-control" required>
                    </div>
                </div>  
                <div class="form-group row  justify-content-md-center">
                    <label class="col-md-6">Imagen 4</label>
                    <div class="col-md-6">
                        <input type="file" name="img4" class="form-control" required>
                    </div>
                </div>                          
                <div class="form-group row justify-content-md-center">
                    <label class="col-md-6">Descripcion</label>
                    <div class="col-md-6">
                        <textarea name="DESCRIPCION" class="form-control" cols="19" rows="6" ></textarea>
                    </div>
                </div>
                <div class="form-group row justify-content-md-center">
                    
                    <div class="col-md-6">
                        <input type="submit" name="submit" value="Insertar Producto" class="btn btn-primary form-control">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
    if(isset($_POST["submit"])){
        $categoria = $_POST['CAT'];
        $nombproducto = $_POST["NOMBRE_P"];
        $marca = $_POST["MARCA"];
        $caracteristica = $_POST["CARACTERISTICAS"];
        $precio = $_POST["PRECIO"];
        $descripcion = $_POST["DESCRIPCION"];

        $img1 = $_FILES['img1']['name'];
        $img2 = $_FILES['img2']['name'];
        $img3 = $_FILES['img3']['name'];
        $img4 = $_FILES['img4']['name'];

        $name1_temp = $_FILES['img1']['tmp_name'];
        $name2_temp = $_FILES['img2']['tmp_name'];
        $name3_temp = $_FILES['img3']['tmp_name'];
        $name4_temp = $_FILES['img4']['tmp_name'];

        move_uploaded_file($name1_temp,"img_prod/$img1");
        move_uploaded_file($name2_temp,"img_prod/$img2");
        move_uploaded_file($name3_temp,"img_prod/$img3");
        move_uploaded_file($name4_temp,"img_prod/$img4");
     

        $insertar_producto = "INSERT INTO producto(IDCATEGORIA,NOMBRE_P,MARCA,CARACTERISTICAS,PRECIO,DESCRIPCION,img1,img2,img3,img4) VALUES ($categoria,'$nombproducto','$marca','$caracteristica',$precio,'$descripcion','$img1','$img2','$img3','$img4')";

        $guardar_producto = mysqli_query($db,$insertar_producto);

        if($guardar_producto){
            echo "<script>alert('Producto insertado')</script>";
            echo "<script>windows.open('insertarroducto.php','_self')</script>";
        }else{
            echo "<script>alert('No se pudo agregar producto')</script>";
        }
    }
?>