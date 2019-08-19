<?php
    include("includes/header.php"); //llama a la cabecera la cual esta en un archivo php, de este modo no es necesario craer una cabecera para cada apartado de la pagina, está se tiene en una rchivo independiente y basta con solo llamarla al inicio de cada archivo.
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  <!--los scripts sirven para que los componentes de la cabecera funcionen de manera correctam sin ellos el menu de hamburguesa no se podria desplegar, estos ayudan a hacer dinamica la pagina-->
  
</body>  <!-- Es para indicar el inicio del cuerpo de cada apartado de la pagina -->
<div class="container mt-5">   <!-- la clase container es utilizada en boostrap, al usar esta clase la parte donde sea declarada sera dividida en 12 partes iguales-->
    <div class="row">  <!--una vez declarado un container se usa la clase row, esto para poder manipular los 12 espacios de trabajo en los cuales fue dividida la pagina-->
    <img src="img/computer_keyboard.jpg" class="img-fluid" alt=""> <!-- Aqui se imprime una imagen con la clse img-fluid que indica que sera una imagen responsiva -->
        <div class="col-12">  <!-- se indica que se usaran los 12 espacios del contenedor  -->
            <h2 class="mt-5 display-4 color-razer"> Misión</h2>  <!--  mt-5 indica que se hara un espaciado de 5 unidaddees ya establecidas en los estilos de boostrap 'matgen-top' display-4 se usa para asignar un tamaño de letra tambien pertenece a lso estilos de boostrap color-razer es una clase creada para usar el color que destaca en la pagina el cal es verde conun valor hexadecimal : #00ff00-->
            <p>
                Compu City, empresa mexicana destinada para ayudar a los usuarios en la búsqueda de equipos de cómputo ensamblados y de sus componentes para cubrir sus necesidades. Nos comprometemos  a ofrecer un servicio atento, inteligente y personalizado para los usuarios.
            </p>    <!-- Parrafo-->
        </div>
        <div class="col-12">
            <h2 class="mt-5 display-4 color-razer"> Visión </h2>
            <p>
                Posicionarnos como los mejores proveedores de equipos de cómputo ensamblados y componentes en el mercado. Con innovaciones constantes y sumando mayor alcance en territorio.            
            </p>
        </div>
        <div class="col-12">
            <h2 class="mt-5 display-4 color-razer"> Objetivo</h2>
            <p>
                Enfocarnos en atender las necesidades de usuarios por medio de ensamblajes de equipos de cómputo personalizados.            
            </p>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");  //Se incluye el footer(pie de pagina), al igual que con la cabecera este fue hecho en un archivo independiente para que no tenga que escrito su codigo en cada una de las paginas, con esto tambien logramos que los links a los cuales hace referencia no tengan que ser cambiados en cada archivo, basta con con que se escriba una vez la direcciona  a la cual hacen referencia.
?>
</html>