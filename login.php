<?php
    include("includes/header.php");
?>
<form method="post" action="login.php">
  <div class="login-box">
    <h1>Iniciar sesion</h1>
    <div class="textbox">
      <i class="fas fa-user"></i>
      <input type="text" placeholder="Username" name="username">
    </div>
    <div class="textbox">
      <i class="fas fa-lock"></i>
      <input type="password" placeholder="Contraseña"  name="pass">
    </div>
    <div class="text-center">
      <!-- text-center Begin -->
      <button name="login" value="Login" class="btn btn-block btn-outline-success">
        <i class="fa fa-sign-in"></i> Login
      </button>
    </div>
</form>
    <a href="registro_cliente.php">
    <p class="text-muted">Aun no estas registrado..? Registrate ahora </p>
    </a>
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


    <?php 

if(isset($_POST['login'])){
    
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    
    $select_cliente = "SELECT NOMBRE_USUARIO,CONTRASENIA FROM usuario where NOMBRE_USUARIO='$username'";
    
    $run_cliente = mysqli_query($db,$select_cliente);
    $get_ip = getRealIpUser();
    $check_cliente = mysqli_num_rows($run_cliente);

    $fila = mysqli_fetch_array($run_cliente);
    $contraseña = $fila['CONTRASENIA'];
    $veri = password_verify($pass,$contraseña);
    if(!$check_cliente){
      echo "<script>alert('Usuario o contraseña incorrectos')</script>";
      exit();
    }else if(!$veri){
      echo "<script>alert('Usuario o contraseña incorrectos')</script>";
      exit();
    }else{
      $_SESSION['NOMBRE_USUARIO']=$username;
      echo "<script>alert('Usted está conectado')</script>"; 
      echo "<script>window.open('index.php', '_self')</script>"; 
    }
}

?> 

