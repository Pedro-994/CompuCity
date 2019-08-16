<?php include("includes/DB.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <?php include("insertaproducto.php");?>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Idproducto</th>
            <th>Nombreproducto</th>
            <th>Precio</th>
            <th>Estado</th>
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
              <a
                href="edit.php?id=<?php echo $row['IDPRODUCTO']?>"
                class="btn btn-secondary"
              >
                <i class="fas fa-marker"></i>
              </a>
              <a
                href="delete.php?id=<?php echo $row['IDPRODUCTO']?>"
                class="btn btn-danger"
              >
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>