<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet">
    <title>Carrito</title>
</head>

<body>
    <?php
        include("includes/navbar.php");
    ?>

    <div id="content">
        <div class="container mt-5 ">
            <div class="row">
                    <div class="col-md-9" id="cart">  <!--box carrito-->
                        <div class="box">
                            <form action="cart.php" method="POST" enctype="multipart/form-data">
                                <h1>Carrito de compra</h1>
                                <p class="text-muted">Tienes 3 articulos en tu carrito</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th colspan="1">Eliminar</th>
                                                <th colspan="2">Sub-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="/img/productos/Tarjetas de video/nvidia/geforce-rtx-2080-ti-gallery-a.jpg"
                                                        alt="" >
                                                </td>
                                                <td>
                                                    <a href="/productos/Grafica/2080ti.html">Nvidia 2080Ti</a>
                                                </td>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    $15000
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="remove[]">
                                                </td>
                                                <td>
                                                    $30000
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="/img/productos/Tarjetas de video/Aorus/2080WB/frontWB.png"
                                                        alt="">
                                                </td>
                                                <td>
                                                    <a href="/productos/Grafica/2080ti.html">Aorus 2080WB</a>
                                                </td>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    $17000
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="remove[]">
                                                </td>
                                                <td>
                                                    $34000
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="/img/productos/Tarjetas de video/Asus/RTX_2060/DUAL-RTX2060-O6G.jpg"
                                                        alt="">
                                                </td>
                                                <td>
                                                    <a href="/productos/Grafica/2080ti.html">Asus 2060</a>
                                                </td>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    $10000
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="remove[]">
                                                </td>
                                                <td>
                                                    $20000
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="/img/productos/Tarjetas de video/Gigabyte/RadeonVII/Radeon VII.png"
                                                        alt="">
                                                </td>
                                                <td>
                                                    <a href="/productos/Grafica/2080ti.html">Radeon VII</a>
                                                </td>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    $10000
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="remove[]">
                                                </td>
                                                <td>
                                                    $20000
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th colspan="2">$14000</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div >
                                    <div class="float-left">
                                        <a href="productos/Tarjetas-de-video.php"btn btn-default"><i class="fa fa-chevron-left">Continuar comprando</i></a>
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" name="update" value="Actualizar" class="btn btn-outline-success">
                                            <i class="fa fa-refresh"> Actualizar</i>
                                        </button>
                                        <a href="checkout.php" class="btn btn-success">
                                            Proceder a pagar <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  <!--box carrito-->
                    <div class="col-md-3">
                        <div class="order-sumary" class="box">
                            <div class="box-header">
                                <h3>Resumen de Compra</h3>
                            </div>
                            <p class="text-muted">
                                Envio y costo adicional son calculados en base al producto y el lugar al que sera enviado
                            </p>
                            <div class="table-responsive">
                                    <table class="table">
                                      <tbody>
                                          <tr>
                                              <td>Sub total compra</td>
                                              <th>$14000</th>
                                          </tr>
                                          <tr>
                                              <td>Envio</td>
                                              <td>$0</td>
                                          </tr>
                                          <tr>
                                              <td>Impuestos</td>
                                              <th>$0</th>
                                          </tr>
                                          <tr class="total">
                                              <td>Total</td>
                                              <th>$140000</th>
                                          </tr>
                                      </tbody>
                                    </table>
                                  </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


    <?php
        include("includes/footer.php");
    ?>

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