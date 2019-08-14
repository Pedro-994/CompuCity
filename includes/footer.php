<body>
  <!-- Footer -->
  <footer class="font-small">

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5" backgroung="">

      <!-- Grid row -->
      <div class="row mt-3">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold">Paginas</h6>
          <hr class="accent-2 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <ul>
            <li><a href="carrito.php">Carrito de compra</a></li>
            <li><a href="tienda.php">Tienda</a></li>
            <li><a href="contacto.php" >Contacto</a></li>
            <li><a href="mi_cuenta.php">Mi cuenta</a></li>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <?php 
            getCategoria2(); 
        ?>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
        </ul>
          <h6 class="text-uppercase font-weight-bold">Usuario</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="registro_cliente.php">Registro</a></li>
          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Contacto</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <i class="fas fa-home mr-3"></i> Mexico, Metepec, Mx</p>
          <p>
            <i class="fas fa-envelope mr-3"></i> info@example.com</p>
          <p>
            <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
          <p>
            <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a href="http://compucity.co/"> compucity.co</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</body>