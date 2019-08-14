<?php
    include("includes/header.php");
?>
    <!-- HOME -->
    <header>
        <div class="dark-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md col-xl-8">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3766.7683515532754!2d-99.60026328509618!3d19.248924886988988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cd8bd474bbd7c5%3A0x5fbf75625d9d6148!2sCompuCity!5e0!3m2!1ses-419!2smx!4v1561962421904!5m2!1ses-419!2smx"
                                width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h3>Sucursal</h3>
                                <p><i class="fas fa-map-marker-alt"></i> Nicolas Bravo #76, Barrio San Miguel,
                                    Metepec,México</p>
                                <p><i class="fas fa-mobile-alt"></i> 722 555 7223</p>
                                <p><i class="far fa-clock"></i> Lunes a Viernes: 9:00-4:30 Sabados: 10:00 2:00</p>
                                <p><i class="far fa-envelope"></i> ventas@compucity.co</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="info-head-section">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="p-5">
                        <h1 class="display-4">¿Cómo podemos ayudarte?</h1>
                        <p class="lead">Este espacio esta hecho para que podamos aclarar tus dudas y te puedas contactar
                            con nosotros, envianos un correo y te ofreceremos atencion personalizada para resolver tus
                            dudas e inquietudes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="info-section bg-light text-muted py-5" id="info-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="img//icons/sensible.png" alt="" class="img-fluid mb-3 rouded-circle">
                </div>
                <div class="col-md-6">
                    <h3>Servicios y Productos</h3>
                    <p>Atencion personalizada</p>

                    <div class="d-flex flex-row">
                        <div class="p-4 align-self-start">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="p-4 align-self-end">
                            Contactanos por correo electronico
                        </div>
                    </div>

                    <div class="d-flex flex-row">
                        <div class="p-4 align-self-start">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="p-4 align-self-end">
                            Resolvemos tus dudas
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="p-4 align-self-start">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="p-4 align-self-end">
                            Atencion personalizada.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--
    
    <section class="info-head-section bg-danger">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="p-5">
                        <h1 class="display-4">Info</h1>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus provident
                            expedita optio magnam maiores deleniti perferendis quibusdam veniam. Quas quasi alias rerum,
                            hic et adipisci culpa provident odit fugiat atque!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->
    <section class="info-section text-muted py-5" id="info-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mx-auto">
                        <h2 class="text-white mt-3">Contacto</h2>
                        <div class="form-row">
                            <div class="form-group col-md-6 textbox">
                                <input type="text" placeholder="Nombre(s) y Apellido(s)" name="name" required>
                            </div>
                            <div class="form-group col-md-6 textbox">
                                <input type="email" placeholder="Correo electronico" name="email" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6 textbox">
                            <input type="text" placeholder="Telefono" name="telefono" required>
                        </div>
                        <textarea cols="100" rows="10" placeholder="Escribenos ..." name="mensaje" required></textarea>
                        <button type="submit" class="btn btn-block btn-outline-success">Enviar</button>
                    </div>

                </div>
                <div class="col-md-6">
                    <img src="img/icons/apoyo-tecnico.png" alt="" class="img-fluid mb-3 rouded-circle">
                </div>
            </div>
        </div>
    </section>
    <?php
        include("includes/footer.php");
    ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>

</html>