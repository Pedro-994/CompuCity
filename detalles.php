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
        <div class="col-12 col-md-9 ">
            <div id="productMain" class="row">
                <div class="col-sm-6">
                    <div id="mainImage">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel" data-slide-to="1"></li>
                                <li data-target="#carousel" data-slide-to="2"></li>
                                <li data-target="#carousel" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="admin/img_prod/<?php echo $img1; ?>"
                                        alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="admin/img_prod/<?php echo $img2; ?>"
                                        alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="admin/img_prod/<?php echo $img3; ?>"
                                        alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="admin/img_prod/<?php echo $img4; ?>"
                                        alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box">
                        <h1 class="text-center"> <?php echo $name; ?></h1>

                        <?php add_cart(); ?>

                        <form action="detalles.php?add_cart=<?php echo $id_prod; ?>" class="form-horizontal"
                            method="post">
                            <!-- form-horizontal Begin -->
                            <div class="form-group">
                                <!-- form-group Begin -->
                                <label for="" class="col-md-5 control-label">Products Quantity</label>

                                <div class="col-md-7">
                                    <!-- col-md-7 Begin -->
                                    <select name="cantidad" id="" class="form-control">
                                        <!-- select Begin -->
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select><!-- select Finish -->

                                </div><!-- col-md-7 Finish -->

                            </div><!-- form-group Finish -->

                            <p class="price">$ <?php echo $price; ?></p>

                            <p class="text-center buttons"><button class="btn btn-success i fa fa-shopping-cart"> Add to
                                    cart</button></p>

                        </form><!-- form-horizontal Finish -->
                    </div>
                    <div class="row" id="thumbs">
                        <div class="col-3">
                            <a href="admin/img_prod/<?php echo $img1; ?>" class="thumb" data-target="#myCarousel"
                                data-slide-to="0">
                                <img src="admin/img_prod/<?php echo $img1; ?>" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="admin/img_prod/<?php echo $img2; ?>" class="thumb" data-target="#myCarousel"
                                data-slide-to="1">
                                <img src="admin/img_prod/<?php echo $img2; ?>" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="admin/img_prod/<?php echo $img3; ?>" class="thumb" data-target="#myCarousel"
                                data-slide-to="2">
                                <img src="admin/img_prod/<?php echo $img3; ?>" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="admin/img_prod/<?php echo $img4; ?>" class="thumb" data-target="#myCarousel"
                                data-slide-to="3">
                                <img src="admin/img_prod/<?php echo $img4; ?>" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h4 class ="Display-4 mt-5">Detalles</h4>
                    <p><?php echo $pro_desc; ?></p>
                    <h4 class ="Display-4 mt-5">Caracteristicas</h4>
                    <p><?php echo $pro_caract ; ?></p>
                    <p class = "Display-4 mt-5">Productos que podrian interesarte</p>
                </div>
                <section class="lista_productos mt-5">
                        <div class="card-deck justify-content-md-center">
                            <?php
                                   prodRand();
                            ?>
                        </div>
                </section>

            </div>
        </div>
    </div>
</div>
<?php
  include("includes/footer.php");
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

    
<?php
    
    function prodRand(){
        
        global $db;
        $get_rand ="CALL prodRand()";
        $run_rand = mysqli_query($db,$get_rand);
            
        while($fila=mysqli_fetch_array($run_rand)){
    
        $id_p = $fila['IDPRODUCTO'];
        $nombre = $fila['NOMBRE_P'];
        $precio = $fila['PRECIO'];
        $categoria = $fila['IDCATEGORIA'];
        $img = $fila['img1'];
    
        echo "
            <div class='producto col-lg-4 col-md-6 col-sm-6 mb-4'>
                <div class='card align-items-center'>
                    <img class='card-img-top'
                        src='admin/img_prod/$img' ?>
                    <div class='card-body '>
                        <a href='detalles.php?id_prod=$id_p'>
                            <h5 class='card-title'>$nombre</h5>
                        </a>
                        <p class='price'> $ $precio</p>
                        <p class='button'>
                            <a href='detalles.php?id_prod=$id_p'
                                class='btn btn-outline-success'>Detalles</a>
                        </p>
                    </div>
                </div>
            </div>";             
        }  
    }
    ?>
</body>

</html>