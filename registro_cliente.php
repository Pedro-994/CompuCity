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
            <input type="text" placeholder="Email" name="email" required> 
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
    $c_pass2 = $_POST['password'];
        if(strcmp(!$c_pass,$c_pass2)){
            echo "<script>alert('La contraseñas no coinciden')</script>";
            echo "<script>window.open('registro_cliente.php','_self')</script>";
        }else{
          $c_ip = getRealIpUser();
          
    $insert_customer = "INSERT INTO usuario(NOMBRE_USUARIO,CORREO,CONTRASENIA) values ('$c_name','$c_email','$c_pass')";
    
    $run_customer = mysqli_query($db,$insert_customer);
    
    $sel_cart = "SELECT * FROM detpedido where IDPRODUCTO='$c_ip'";
    
    $run_cart = mysqli_query($db,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>0){
        
        /// If register have items in cart ///
        
        $_SESSION['NOMBRE_USUARIO']=$c_name;
        
        echo "<script>alert('Registro exitoso')</script>";
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        
        /// If register without items in cart ///
        
        $_SESSION['NOMBRE_USUARIO']=$c_name;
        
        echo "<script>alert('Registro exitoso')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    } 
        }
    
}

?>