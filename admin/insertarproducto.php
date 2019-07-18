<?php
    include("includes/DB.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet">
    <title>Insertar Productos</title>
</head>

<body>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-money fa-fw"></i>Insertar Producto
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group row  justify-content-md-center">
                            <label class="col-md-2">ID producto</label>
                            <div class="col-md-3">
                                <input type="text" name="IDPRODUCTO" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-md-2">Categoria</label>
                            <div class="col-md-3">
                                <select name="CAT" class="form-control" >
                                <option> Seleccione una categoria</option>
                                <?php
                                    $get_categoria = "SELECT * FROM CATEGORIA";
                                    $resultado_categoria = mysqli_query($conexion,$get_categoria);

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
                        <div class="form-group row  justify-content-md-center">
                            <label class="col-md-2">Nombre Producto</label>
                            <div class="col-md-3">
                                <input type="text" name="NOMBRE_P" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-md-2">MARCA</label>
                            <div class="col-md-3">
                                <input type="text" name="MARCA" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-md-2">CARACTERISTICAS</label>
                            <div class="col-md-3">
                                <textarea name="CARACTERISTICAS" class="form-control" cols="19" rows="6" ></textarea>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-md-2">Precio</label>
                            <div class="col-md-3">
                                <input type="float" name="PRECIO" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-md-2">Descripcion</label>
                            <div class="col-md-3">
                                <textarea name="DESCRIPCION" class="form-control" cols="19" rows="6" ></textarea>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            
                            <div class="col-md-3">
                                <input type="submit" name="submit" value="Insertar Producto" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>
</html>

<?php
    if(isset($_POST["submit"])){
        $idproducto = $_POST["IDPRODUCTO"];
        $categoria = $_POST['CAT'];
        $nombproducto = $_POST["NOMBRE_P"];
        $marca = $_POST["MARCA"];
        $caracteristica = $_POST["CARACTERISTICAS"];
        $precio = $_POST["PRECIO"];
        $$descripcion = $_POST["DESCRIPCION"];

        $insertar_producto = "INSERT INTO `producto`(`IDPRODUCTO`, `IDCATEGORIA`, `NOMBRE_P`, `MARCA`, `CARACTERISTICAS`, `PRECIO`, `DESCRIPCION`) VALUES ($idproducto,$categoria,'$nombproducto','$marca','$caracteristica',$precio,'$descripcion')";

        $guardar_producto = mysqli_query($conexion,$insertar_producto);

        if($guardar_producto){
            echo "<script>alert('Producto insertado')</script>";
            echo "<script>windows.open('insertarroducto.php','_self')</script>";
        }else{
            echo "<script>alert('No se pudo agregar producto')</script>";
        }
    }
?>