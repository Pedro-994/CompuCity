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
                            <form action="details.php?add_cart=<?php echo $id_prod; ?>" method="post">
                                <div class="form-group">
                                    <label for="" class="col-md-5 control-label">Cantidad</label>
                                    <div class="col-md-7">
                                        <select name="cantidad" id="" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="price">$ <?php echo $price; ?></p>
                                <p class="text-center buttons"><button
                                        class="btn btn-success i fa fa-shopping-cart">Agregar a carrito</button></p>
                            </form>
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
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam omnis et tempore eligendi illo voluptates repudiandae odio alias, minima eveniet modi consectetur fugit! Sed ipsa veniam, reiciendis vero doloribus voluptas?</p>
                     <div class="table-responsive-sm">
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
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>

</html>