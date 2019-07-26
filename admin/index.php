<?php include("includes/DB.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div
        class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show"
        role="alert"
      >
        <?= $_SESSION['message']?>
        <button
          type="button"
          class="close"
          data-dismiss="alert"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
        <?php
          include("insertaproducto.php")
        ?>

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
          
          mysqli_set_charset($conexion,"utf8");
          $query = "SELECT * FROM producto";
          $result_tasks = mysqli_query($conexion, $query);    

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
                href="delete_task.php?id=<?php echo $row['IDPRODUCTO']?>"
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

<?php include('includes/footer.php'); ?>
