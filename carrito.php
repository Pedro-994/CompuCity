<?php
    include("includes/header.php");
?>
<div id="content">
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-9 mt-3" id="cart">
                <!--box carrito-->
                <div>
                    <form action="carrito.php" method="POST" enctype="multipart/form-data">
                        <h1 class="mt-5">Carrito de compra</h1>
                        <?php 
                            $ip_add = getRealIpUser();
                            $select_cart = "SELECT * FROM detpedido WHERE IP_ADD = '$ip_add'";
                            $run_cart = mysqli_query($db,$select_cart);
                            $count = mysqli_num_rows($run_cart);
                        ?>
                        <p class="text-muted">Tienes <?php echo $count; ?> articulo(s) en tu carrito</p>
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
                                    <?php 
                                   
                                   $total = 0;
                                   
                                   while($row_cart = mysqli_fetch_array($run_cart)){       
                                        $pro_id = $row_cart['IDPRODUCTO'];
                                        $cantidad = $row_cart['CANTIDAD_PROD'];
                                        $get_products = "SELECT * FROM producto WHERE IDPRODUCTO='$pro_id'";
                                        $run_products = mysqli_query($db,$get_products);
                                       
                                       while($row = mysqli_fetch_array($run_products)){       
                                           $nombre = $row['NOMBRE_P'];
                                           $img1 = $row['img1'];
                                           $precio = $row['PRECIO'];
                                           $sub_total = $row['PRECIO']*$cantidad;
                                           $total += $sub_total;      
                                   ?>
                                    <tr>
                                        <td>
                                            <img src="admin/img_prod/<?php echo $img1; ?>" alt="Product 3a">
                                        </td>
                                        <td>
                                            <a href="detalles.php?pro_id=<?php echo $pro_id; ?>">
                                                <?php echo $nombre; ?> </a>
                                        </td>
                                        <td>
                                            <?php echo $cantidad; ?>
                                        </td>
                                        <td>
                                            $ <?php echo $precio; ?>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                        </td>
                                        <td>
                                            $<?php echo $sub_total; ?>
                                        </td>

                                    </tr>
                                    <?php } 
                                        $sub = "SELECT IVA(1200)";
                                        $res_sub = mysqli_query($db,$sub);
 
                                } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th colspan="2">$<?php echo $total; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div>
                            <div class="float-left">
                                <a href="tienda.php" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Continuar comprando
                                </a>
                            </div>
                            <div class="float-right">
                                <button type="submit" name="update" value="Actualizar" class="btn btn-outline-success">
                                    <i class="fa fa-refresh"> Actualizar</i>
                                </button  type="submit" name="pedido" class="btn btn-success">
                                <a  class="btn btn-success">
                                    Proceder a pagar <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <?php     
                function update_cart(){
                    global $db;
                    if(isset($_POST['update'])){
                        foreach($_POST['remove'] as $remove_id){
                            $delete_product = "DELETE FROM detpedido where IDPRODUCTO='$remove_id'";
                            $run_delete = mysqli_query($db,$delete_product);
                            if($run_delete){
                                echo "<script>window.open('carrito.php','_self')</script>";   
                            }   
                        }   
                    } 
                }
                echo @$up_cart = update_cart();
                ?>
            </div>
            <div class="col-md-3 mt-5">
                <div class="box">
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
                                    <th> $<?php echo $total; ?> </th>
                                </tr>
                                <tr>
                                    <td>Envio</td>
                                    <td>$0</td>
                                </tr>
                                <tr>
                                    <td>Sub+IVA</td>
                                    <th>$ <?php echo $sub;?></th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th> $<?php echo $total; ?> </th>
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