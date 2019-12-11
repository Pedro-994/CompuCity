<?php
    include("includes/header.php");
    include("includes/DB.php");
    if(isset($_SESSION['NOMBREA'])){
      echo "<script>window.open('productos.php','_self')</script>";
  }
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto mt-5">
            <form method="post" action="index.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuario</label>
                    <input type="text" class="form-control" name = "user" aria-describedby="emailHelp" placeholder="Usuario" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Entrar</button>
            </form>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['login'])){
    
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        mysqli_set_charset($db,"utf8");
        $select_admin= "SELECT NOMBREA,PASSA FROM administrador where NOMBREA='$user'";
        
        $run_admin = mysqli_query($db,$select_admin);
        $check_admin = mysqli_num_rows($run_admin);
    
        $fila = mysqli_fetch_array($run_admin);
        $contraseña = $fila['PASSA'];
        $veri = password_verify($pass,$contraseña);
        if(!$check_admin){
          echo "<script>alert('Usuario o contraseña incorrectos')</script>";
          exit();
        }else if(!$veri){
          echo "<script>alert('Usuario o contraseña incorrectos')</script>";
          exit();
        }else{
          $_SESSION['NOMBREA']=$user;
          echo "<script>alert('Inicio de sesion exitoso')</script>"; 
          echo "<script>window.open('productos.php', '_self')</script>"; 
        }
    }
?>

<?php
include("includes/footer.php");
?>