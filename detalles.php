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
                <div id="productMain" class="row">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel" data-slide-to="1"></li>
                                    <li data-target="#carousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="admin/img_prod/<?php echo $img1; ?>" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="base2080.png" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="comb2080.png" alt="Third slide">
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
                            <h1 class="text-center"> <?php $name ?></h1>
                            <form>
                                <div class="form-group" action="detalles.php" method="POST">
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
                                <p class="price">$500</p>
                                <p class="text-center buttons"><button
                                        class="btn btn-success i fa fa-shopping-cart">Agregar a carrito</button></p>
                            </form>
                        </div>
                        <div class="row" id="thumbs">
                            <div class="col-4">
                                <a href="" class="thumb">
                                    <img src="2080_aorus.png" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="" class="thumb">
                                    <img src="base2080.png" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="" class="thumb">
                                    <img src="cost2080.png" alt="" class="img-fluid">
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
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../js/script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet">
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