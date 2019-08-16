<?php
include("INCLUDES/DB.php");
$nombre = '';
$precio= '';
$cantidad = '';
$marca = '';
$precio = '';
$caracteristicas ='';
$descripcion = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  
  $query = "SELECT * FROM producto WHERE IDPRODUCTO = $id";
  $result = mysqli_query($db, $query);
  if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['NOMBRE_P'];
    $precio = $row['PRECIO'];
    $cantidad = $row['CANTIDAD_ALMACEN'];
    $marca = $row['MARCA'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre = $_POST['NOMBRE_P'];
  $precio = $_POST['PRECIO'];
  $cantidad = $_POST['CANTIDAD_ALMACEN'];
  $marca = $_POST['MARCA'];
  
  $query = "UPDATE producto set NOMBRE_P = '$nombre', PRECIO = $precio ,CANTIDAD_ALMACEN = $cantidad,
  MARCA = '$marca' WHERE IDPRODUCTO=$id";
  mysqli_query($db, $query);
  echo "<script>alert('Registro actualizado')</script>"; 
  echo "<script>window.open('index.php', '_self')</script>";
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="NOMBRE_P" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre del producto">
        </div>
        <div class="form-group">
          <input name="PRECIO" type="float" class="form-control" value="<?php echo $precio; ?>" placeholder="Precio del producto">
        </div>
        <div class="form-group">
          <input name="CANTIDAD_ALMACEN" type="text" class="form-control" value="<?php echo $cantidad; ?>" placeholder="Cantidad del producto">
        </div>
        <div class="form-group">
          <input name="MARCA" type="float" class="form-control" value="<?php echo $marca; ?>" placeholder="Marca del producto">
        </div>
        <button class="btn-success" name="update">Actualizar</button>
      </form>
      </div>
    </div>
  </div>
</div>