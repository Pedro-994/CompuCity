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
                                        <img class="d-block w-100" src="admin/img_prod/<?php echo $img1; ?>" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="admin/img_prod/<?php echo $img2; ?>" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="admin/img_prod/<?php echo $img3; ?>" alt="Third slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="admin/img_prod/<?php echo $img4; ?>" alt="Third slide">
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
                           
                           <form action="detalles.php?add_cart=<?php echo $id_prod; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Products Quantity</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="cantidad" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                               
                               <p class="price">$ <?php echo $price; ?></p>
                               
                               <p class="text-center buttons"><button class="btn btn-success i fa fa-shopping-cart"> Add to cart</button></p>
                               
                           </form><!-- form-horizontal Finish -->
                        </div>
                        <div class="row" id="thumbs">
                            <div class="col-3">
                                <a href="admin/img_prod/<?php echo $img1; ?>" class="thumb" data-target="#myCarousel" data-slide-to="0">
                                    <img src="admin/img_prod/<?php echo $img1; ?>" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="admin/img_prod/<?php echo $img2; ?>" class="thumb" data-target="#myCarousel" data-slide-to="1">
                                    <img src="admin/img_prod/<?php echo $img2; ?>" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="admin/img_prod/<?php echo $img3; ?>" class="thumb" data-target="#myCarousel" data-slide-to="2">
                                    <img src="admin/img_prod/<?php echo $img3; ?>" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="admin/img_prod/<?php echo $img4; ?>" class="thumb" data-target="#myCarousel" data-slide-to="3">
                                    <img src="admin/img_prod/<?php echo $img4; ?>" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="detalles">
                    <h4>Detalles</h4>
                    <p ><?php echo $pro_desc; ?></p>
                     <div class="table-responsive-sm">
<!--
                <table class="table text-white">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">RTX 2080 Ti Founders Edition</th>
                        <th scope="col">RTX 2080 Ti </th>
                        <th scope="col">GeForce RTX 2080 Ti</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Arquitectura</th>
                        <td>Turing</td>
                        <td>Turing</td>
                        <td>Pascal</td>
                    </tr>
                    <tr>
                        <th scope="row">RTX-OPS</th>
                        <td>78T</td>
                        <td>76T</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th scope="row">Frecuencia acelerada</th>
                        <td>1635 MHz</td>
                        <td>1545 MHz</td>
                        <td>1582 MHz</td>
                    </tr>
                    <tr>
                        <th scope="row">Memoria de Video</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    <tr>
                        <th scope="row">Frecuencia de Video</th>
                        <td>11Gb GDDR6</td>
                        <td>11Gb GDDR6</td>
                        <td>11Gb GDDR5X</td>
                    </tr>
                </tbody>
            </table>
-->
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>

</html>