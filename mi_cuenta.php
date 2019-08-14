<?php
    include("includes/header.php");
?>
<p>.</p>
<ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="EditarPerfil-tab" data-toggle="tab" href="#EditarPerfil" role="tab"
      aria-controls="EditarPerfil" aria-selected="true">Editar Perfil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="CambiarContraseña-tab" data-toggle="tab" href="#CambiarContraseña" role="tab"
      aria-controls="CambiarContraseña" aria-selected="false">Cambiar Contraseña</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="MisPedidos-tab" data-toggle="tab" href="#MisPedidos" role="tab" aria-controls="MisPedidos"
      aria-selected="false">Mis Pedidos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="MisTarjetas-tab" data-toggle="tab" href="#MisTarjetas" role="tab"
      aria-controls="MisTarjetas" aria-selected="false">Opciones de pago</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="EliminarCuenta-tab" data-toggle="tab" href="#EliminarCuenta" role="tab"
      aria-controls="EliminarCuenta" aria-selected="false">Eliminar Cuenta</a>
  </li>
</ul>
<div class="tab-content " id="myTabContent">
  <div class="tab-pane fade show active" id="EditarPerfil" role="tabpanel" aria-labelledby="EditarPerfil-tab">
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="mx-auto">
          <h2 class="text-white mt-3">Datos personales</h2>
          <div class="form-row">
            <div class="form-group col-md-6 textbox">
              <input type="text" placeholder="Nombre(s)" name="nombre">
            </div>
            <div class="form-group col-md-6 textbox">
              <input type="text" placeholder="Apellido(s)" name="apellido">
            </div>
          </div>
          <div id="locationField" class="form-group textbox">
            <input id="autocomplete" placeholder="Ingresa tu direccion" onFocus="geolocate()" type="text" />
          </div>
          <div class="form-row">
            <div class="textbox col-md-6">
              <input id="route" placeholder="Calle" />
            </div>
            <div class="textbox col-md-6">
              <input id="street_number" placeholder="Numero" />
            </div>
          </div>
          <div class="form-row">
            <div class="textbox col-md-6">
              <input id="locality" placeholder="Ciudad" />
            </div>
            <div class="textbox col-md-6">
              <input id="administrative_area_level_1" placeholder="Estado" />
            </div>
          </div>
          <div class="form-row">
          </div>
          <div class="textbox">
            <input id="postal_code" placeholder="C.P." />
          </div>
          <div class="textbox">
            <input id="country" placeholder="Pais" />
          </div>
          <button type="submit" class="btn btn-block btn-outline-success">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade " id="CambiarContraseña" role="tabpanel" aria-labelledby="CambiarContraseña-tab">
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="mx-auto">
          <h2 class="text-white mt-3">Cambiar Contraseña</h2>
          <div class="form-group textbox">
            <input type="password" placeholder="Contraseña actual">
          </div>
          <div class="form-group textbox">
            <input type="password" placeholder="Nueva Contraseña">
          </div>
          <div class="form-group textbox">
            <input type="password" placeholder="Confirmar Contraseña">
          </div>
          <button type="submit" class="btn btn-block btn-outline-success">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade text-white" id="MisPedidos" role="tabpanel" aria-labelledby="MisPedidos-tab">
    <div class="container mt-5">
      <div class="row">
        <div class="mx-auto">
          <h1>Mis pedidos</h1>
          <p>Todos tus pedidos</p>
          <p class="text-muted">
            Si tienes alguna duda contactanos
          </p>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Total</th>
                <th># Orden</th>
                <th>Cantidad</th>
                <th>Pedido Realizado</th>
                <th>Estatus pago</th>
                <th>Estatus</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <th> 1 </th>
                <td>$10000</td>
                <td>12346</td>
                <td>5</td>
                <td>10/05/18</td>
                <td>Aprobado</td>
                <td><a href="confirm.php" target="_black" class="btn btn-outline-success btn-sm">Ver mas</a></td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <th> 1 </th>
                <td>$10000</td>
                <td>12346</td>
                <td>5</td>
                <td>10/05/18</td>
                <td>Aprobado</td>
                <td><a href="confirm.php" target="_black" class="btn btn-outline-success btn-sm">Ver mas</a></td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <th> 1 </th>
                <td>$10000</td>
                <td>12346</td>
                <td>5</td>
                <td>10/05/18</td>
                <td>Aprobado</td>
                <td><a href="confirm.php" target="_black" class="btn btn-outline-success btn-sm">Ver mas</a></td>
              </tr>
            </tbody>
          </table>
        </div>
        </table>
      </div>
    </div>
  </div>
  <div class="tab-pane fade text-white" id="MisTarjetas" role="tabpanel" aria-labelledby="MisTarjetas-tab">
    <div class="container mt-5 col-">
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">
          <h1>Opciones de pago</h1>
          <div id="accordion">
            <!--tarjetas-->
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    MATERCARD terminacion 0101
                  </button>
                </h5>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <div class="container text-center text-md-left mt-5">
                    <div class="row mt-6">
                      <div class="col-6">
                        <ul>
                          <p>Nombre de la tarjeta</p>
                          <p>>Juan Peréz</p>
                        </ul>
                      </div>
                      <div class="col-6">
                        <p>Dirección de facturación</p>
                        <p>Pedro Ángel Gómez Dimas</p>
                        <p>Nicolás Bravo #76</p>
                        <p>SAN MIGUEL</p>
                        <p>METEPEC, MÉXICO, 52140</p>
                        <p>mexico</p>
                        <p>7894565632</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    Visa terminacion 0202
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  <div class="container text-center text-md-left mt-5">
                    <div class="row mt-6">
                      <div class="col-6">
                        <ul>
                          <p>Nombre de la tarjeta</p>
                          <p>>Juan Peréz</p>
                        </ul>
                      </div>
                      <div class="col-6">
                        <p>Dirección de facturación</p>
                        <p>Pedro Ángel Gómez Dimas</p>
                        <p>Nicolás Bravo #76</p>
                        <p>SAN MIGUEL</p>
                        <p>METEPEC, MÉXICO, 52140</p>
                        <p>mexico</p>
                        <p>7894565632</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree">
                    Agregar nueva
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                  <h2 class="text-white mt-3">Nueva Tarjeta</h2>
                  <div class="form-row">
                    <div class="form-group col-md-6 textbox">
                      <input type="text" placeholder="Nombre(s)">
                    </div>
                    <div class="form-group col-md-6 textbox">
                      <input type="text" placeholder="Apellido(s)">
                    </div>
                    <div class="form-group col-md-6 textbox">
                      <input type="text" placeholder="Numero tarjeta">
                    </div>
                    <div class="textbox">
                      <input type="month" name="mes" value="2019-01" min="2018-02" max="2018-06"
                        placeholder="Fecha vencimiento" />
                    </div>
                  </div>
                  <div id="locationField" class="form-group textbox">
                    <input id="autocomplete" placeholder="Ingresa tu direccion" onFocus="geolocate()" type="text" />
                  </div>
                  <div class="form-row">
                    <div class="textbox col-md-6">
                      <input id="route" placeholder="Calle" />
                    </div>
                    <div class="textbox col-md-6">
                      <input id="street_number" placeholder="Numero" />
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="textbox col-md-6">
                      <input id="date" placeholder="Ciudad" />
                    </div>
                    <div class="textbox col-md-6">
                      <input id="administrative_area_level_1" placeholder="Estado" />
                    </div>
                  </div>
                  <div class="form-row">
                  </div>
                  <div class="textbox">
                    <input id="postal_code" placeholder="C.P." />
                  </div>
                  <div class="textbox">
                    <input id="country" placeholder="Pais" />
                  </div>
                  <button type="submit" class="btn btn-block btn-outline-success">Guardar</button>
                </div>
              </div>
            </div>
          </div>
          <!--fin tarjetas-->

        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade show " id="EliminarCuenta" role="tabpanel" aria-labelledby="EliminarCuenta-tab">
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="mx-auto">
          <h2 class="text-white mt-3">¿Deseas eliminar tu cuenta?</h2>
          <form action="" method="POST">
            <input type="submit" name="Si" value="Si, deseo borrarla" class="btn btn-danger">
            <input type="submit" name="No" value="no,no quiero eliminarla" class="btn btn-success">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
        include("includes/footer.php");
    ?>
<!-- <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfQH5MI5OoDLFr-oj5TxUAd2rr9nU3ico&libraries=places&callback=initAutocomplete"
    async defer></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>