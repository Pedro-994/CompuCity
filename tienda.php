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
                    <p class="display-4 ">Tarjetas Grafica</p>
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
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>
</html>