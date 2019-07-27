<?php
include("INCLUDES/DB.php");
$nombre = '';
$precio= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM PRODUCTO WHERE IDPRODUCTO = $id";
  $result = mysqli_query($conexion, $query);
  if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['NOMBRE_P'];
    $precio = $row['PRECIO'];
    $stock = $row['CANTIDAD_ALMACEN'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre = $_POST['NOMBRE_P'];
  $precio = $_POST['PRECIO'];

  $query = "UPDATE PRODUCTO set NOMBRE_P = '$nombre', PRECIO = $precio WHERE IDPRODUCTO=$id";
  mysqli_query($conexion, $query);
  $_SESSION['message'] = 'Actualizacion realizada';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="NOMBRE_P" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre del productoe">
        </div>
        <div class="form-group">
          <input name="PRECIO" type="float" class="form-control" value="<?php echo $precio; ?>" placeholder="Precio del productoe">
        </div>
        <button class="btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>

