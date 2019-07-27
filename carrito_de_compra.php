<?php
    include("includes/header.php");
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>

</html>