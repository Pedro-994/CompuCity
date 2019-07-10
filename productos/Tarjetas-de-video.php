<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../js/script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <title>Tarjetas Graficas</title>
</head>

<body>

    <div class="container-fluid mt-5">
        <div class="row text-white">
            <div class="col-md-3">
                <form class="form-inline">
                    <label for="inlineFormCustomSelectPref" class="my-1 mr-2">Ordenar por:</label>
                    <select name="" id="inlineFormCustomSelectPref" class="custom-select my-1 mr-sm-2 bg-black text-white">
                        <option value="1">Precio(Mayor-menor)</option>
                        <option value="2">Precio(Menor-mayor)</option>
                        <option value="3">Nombre(A-Z)</option>
                        <option value="4">Nombre(Z-A)</option>
                    </select>
                </form>
                <div id="accordion" class="lista-categoria ">
                    <a href="#" class="categoria" category="all">
                        <h3>Todos</h3>
                    </a>
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="false" aria-controls="collapseOne">
                                    Chip Grafico
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-check">
                                    <a href="#" class="categoria" category="Chip-AMD">AMD</a>
                                </div>
                                <div class="form-check">
                                    <a href="#" class="categoria" category="Chip-Nvidia">Nvidia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    Marca(ensambladora)
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Asus
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        EVGA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios3">
                                        GIGABYTE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios4">
                                        Zotac
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios5">
                                        Power Color
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        MSI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        PNY
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Tipo de Memoria
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        DDR3
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        DDR4
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        DDR5
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        DDR6
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Memoria de Video
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        DDR4
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        DDR5
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        DDR6
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 " style="width: 200px;">
                <p class="display-4 ">Productos</p>
                <section class="lista_productos mt-5">
                    <div class="card-deck">
                        <div class="producto" category="Chip-Nvidia">
                            <div class="card" style="width: 19rem;">
                                <img class="card-img-top"
                                    src="../img/productos/Tarjetas de video/nvidia/geforce-rtx-2080-ti-gallery-a.jpg">
                                <div class="card-body">
                                    <a href="Grafica/2080ti.html">
                                        <h5 class="card-title">ARTX 2080Ti</h5>
                                    </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus">Agregar a
                                            Carrito</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="producto" category="Chip-Nvidia">
                            <div class="card" style="width: 19rem;">
                                <img class="card-img-top"
                                    src="../img/productos/Tarjetas de video/Aorus/2080/2080_aorus.png" alt="">
                                <div class="card-body ">
                                    <a href="/productos/Grafica/Aorus/2080/Aorus_2080.html">
                                        <h5 class="card-title">Aorus 2080</h5>
                                    </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus">Agregar a
                                            Carrito</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="producto" category="Chip-Nvidia">
                            <div class="card" style="width: 19rem;">
                                <img class="card-img-top"
                                    src="../img/productos/Tarjetas de video/Aorus/2080WB/aorus_2080_8g.png" alt="">
                                <div class="card-body">
                                    <a href="/productos/Grafica/Aorus/2080WB/Aorus_2080_WB.html">
                                        <h5 class="card-title">Aorus 2080 WB</h5>
                                    </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus">Agregar a
                                            Carrito</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="producto" category="Chip-Nvidia">
                            <div class="card" style="width: 19rem;">
                                <img class="card-img-top"
                                    src="../img/productos/Tarjetas de video/Asus/RTX_2060/DUAL-RTX2060-O6G.jpg" alt="">
                                <div class="card-body">
                                    <a href="/productos/Grafica/Asus/RTX_2060/RTX_2060.html">
                                        <h5 class="card-title">RXT 2060</h5>
                                    </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus">Agregar a
                                            Carrito</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="producto" category="Chip-AMD">
                            <div class="card" style="width: 19rem;">
                                <img class="card-img-top"
                                    src="../img/productos/Tarjetas de video/Asus/Strix_RX570/Strix_RX5070.jpg" alt="">
                                <div class="card-body">
                                    <a href="/productos/Grafica/Asus/Strix_RX570/STRIX-RX570.html">
                                        <h5 class="card-title">RX 570</h5>
                                    </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus">Agregar a
                                            Carrito</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="producto" category="Chip-AMD">
                            <div class="card bg-black" style="width: 19rem;">
                                <img class="card-img-top"
                                    src="../img/productos/Tarjetas de video/Gigabyte/Radeon590/radeon_rx_590.png"
                                    alt="">
                                <div class="card-body">
                                    <a href="">
                                        <h5 class="card-title">Radeon 590</h5>
                                    </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus">Agregar a
                                            Carrito</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="producto" category="Chip-AMD">
                            <div class="card bg-black" style="width: 19rem;">
                                <img class="card-img-top"
                                    src="../img/productos/Tarjetas de video/Gigabyte/RadeonVII/Radeon VII.png" alt="">
                                <div class="card-body">
                                    <a href="">
                                        <h5 class="card-title">Radeon VII</h5>
                                    </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus">Agregar a
                                            Carrito</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="producto" category="Chip-Nvidia">
                            <div class="card bg-black" style="width: 19rem;">
                                <img class="card-img-top"
                                    src="../img/productos/Tarjetas de video/MSI/GTX960/gtx_960_g.png" alt="">
                                <div class="card-body">
                                    <a href="">
                                        <h5 class="card-title">RXT 960</h5>
                                    </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus">Agregar a
                                            Carrito</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="producto" category="Chip-Nvidia">
                            <div class="card bg-black" style="width: 19rem;">
                                <img class="card-img-top"
                                    src="../img/productos/Tarjetas de video/MSI/GTXGE/gtx_980_GE.png" alt="">
                                <div class="card-body">
                                    <a href="">
                                        <h5 class="card-title">GTX 980</h5>
                                    </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus">Agregar a
                                            Carrito</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="producto" category="Chip-AMD">
                            <div class="card bg-black" style="width: 19rem;">
                                <img class="card-img-top"
                                    src="../img/productos/Tarjetas de video/MSI/R7_370/radeon_r7_370.png" alt="">
                                <div class="card-body">
                                    <a href="">
                                        <h5 class="card-title">Radeon R7</h5>
                                    </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus">Agregar a
                                            Carrito</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="producto" category="Chip-AMD">
                            <div class="card bg-black" style="width: 19rem;">
                                <img class="card-img-top"
                                    src="../img/productos/Tarjetas de video/MSI/R9_380/radeon_r9_380.png" alt="">
                                <div class="car">
                                    <a href="">
                                        <h5 class="card-title">R9 380</h5>
                                    </a>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus">Agregar a
                                            Carrito</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>