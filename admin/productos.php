<?php include("includes/DB.php"); ?>

<?php
    include("includes/header.php");
        if(!isset($_SESSION['NOMBREA'])){
        echo "<script>window.open('index.php','_self')</script>";
    }

?>
<div class="row">
<div class="col-lg-12">
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
    </div>
    <div class="table-responsive p-3">
      <table class="table align-items-center table-flush" id="dataTable">
        <thead class="thead-light">
          <tr>
            <th>Idproducto</th>
            <th>Nombreproducto</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM producto";
          $result_tasks = mysqli_query($db, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['IDPRODUCTO']; ?></td>
            <td><?php echo $row['NOMBRE_P']; ?></td>
            <td> $ <?php echo $row['PRECIO']; ?></td>
            <td><?php echo $row['ESTADO']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['IDPRODUCTO']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?id=<?php echo $row['IDPRODUCTO']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jq  uery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function () {
    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });
</script>

</body>

</html>