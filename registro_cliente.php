<?php
    include("includes/header.php");
?>
 <form action="registro_cliente.php" method="post" enctype="multipart/form-data">
    <div class="login-box">
        <h1>Crear cuenta</h1>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="user" required>
        </div>
        <div class="textbox">
            <i class="fas fa-at"></i>
            <input type="email" name = "email" aria-describedby="emailHelp" placeholder="Email" required>
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Contraseña" name="password" required>
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" name="password2" placeholder="Repetir contraseña" required>
        </div>
        <div class="text-center"><!-- text-center Begin -->   
            <button type="submit" name="Registro" class="btn btn-block btn-outline-success">
                <i class="fa fa-user-md"></i> Registrar
            </button>
            <a href="login.php">
    <p class="text-muted">Ya tienes una cuenta? Inicia sesion. </p>
    </a>                      
        </div><!-- text-center Finish -->
        </form><!-- form Finish -->

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>
</html>


<?php 

if(isset($_POST['Registro'])){
    
    $c_name = $_POST['user'];
    $c_email = $_POST['email'];
    $c_pass = $_POST['password'];
    $c_pass2 = $_POST['password2'];
        if(strcmp($c_pass,$c_pass2)){
            echo "<script>alert('La contraseñas no coinciden')</script>";
            echo "<script>window.open('registro_cliente.php','_self')</script>";
        }else{
          $c_ip = getRealIpUser();
          $c_pass = password_hash($c_pass,PASSWORD_DEFAULT,['cost' => 10]);

    $insert_cliente = "CALL creausuario('$c_name','$c_pass','$c_email')";

    $run_cliente = mysqli_query($db,$insert_cliente);    

    if($run_cliente){
                
        $_SESSION['NOMBRE_USUARIO']=$c_name;
        
        echo "<script>alert('Registro exitoso')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        echo "<script>alert('No se pudo realizar el registro')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
    }
    }
}

?>