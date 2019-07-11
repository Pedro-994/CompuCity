<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/estilos.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet">
  <script src="js/maps.js"></script>
  <title>Mi cuenta</title>
</head>

<body>
  <?php
        include("includes/navbar.php");
    ?>

  <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="EditarPerfil-tab" data-toggle="tab" href="#EditarPerfil" role="tab" aria-controls="EditarPerfil"
        aria-selected="true">Editar Perfil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="CambiarContraseña-tab" data-toggle="tab" href="#CambiarContraseña" role="tab" aria-controls="CambiarContraseña"
        aria-selected="false">Cambiar Contraseña</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="MisPedidos-tab" data-toggle="tab" href="#MisPedidos" role="tab" aria-controls="MisPedidos"
        aria-selected="false">Mis Pedidos</a>
    </li>
  </ul>
  <div class="tab-content " id="myTabContent">
    <div class="tab-pane fade show active" id="EditarPerfil" role="tabpanel" aria-labelledby="EditarPerfil-tab">
        <div class="container-fluid mt-5">
            <div class="row">
              <div class="mx-auto">
                <h2 class="text-white mt-3">DATOS PERSONALES</h2>
                <div class="form-row">
                  <div class="form-group col-md-6 textbox">
                    <input type="text" placeholder="Nombre(s)">
                  </div>
                  <div class="form-group col-md-6 textbox">
                    <input type="text" placeholder="Apellido(s)">
                  </div>
                  <div class="form-group col-md-6 textbox">
                    <input type="email" placeholder="Email">
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
      <div class="container">
          <h2 class="mb-5 row justify-content-md-center">Pedidos</h2>
          <h2 class="mb-5 row justify-content-md-center">Pedidos Realizados</h2>
          <h2 class="mb-5 row justify-content-md-center">Pedidos en curso</h2>
          <h2 class="mb-5 row justify-content-md-center">Pedidos finalizados</h2>
      </div>
    </div>
  </div>
  <?php
        include("includes/footer.php");
    ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>