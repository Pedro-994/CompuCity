<?php

include("includes/DB.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM producto WHERE IDPRODUCTO = $id";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Consulta fallida.");
  }
  $_SESSION['message'] = 'Registro eliminado';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
