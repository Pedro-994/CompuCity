<?php
    include("includes/header.php");
?>
    <!--Fin barra de navegacion-->
    <div class="container-fluid mt-5">
        <div class="row text-white">
            <div class="col-md-3">
              <?php
                include("includes/sidebar.php");
              ?>
            </div>
            <!--Fin productos-->
            <div class="col-12 col-md-9 ">
                <!--Contenedor Productos-->
                <div class="container-fluid">
                <?php
                    if(!isset($_GET['id_cat'])){
                        echo"<p class='display-4'>Todos los productos</p>"; 
                    }
                   
                ?>
                    <section class="lista_productos mt-5">
                        <div class="card-deck justify-content-md-center">
                            <?php 
                                getPro(); 
                            ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>