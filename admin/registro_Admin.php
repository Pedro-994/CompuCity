<?php
    include("includes/header.php");
        if(!isset($_SESSION['NOMBREA'])){
        echo "<script>window.open('index.php','_self')</script>";
    }

?>
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto mt-5">
        <form action="registro_Admin.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name = "email" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Repetir contraseña</label>
                    <input type="password" class="form-control" name="pass2" placeholder="Password" required>
                </div>
                <button type="submit" name="registro" class="btn btn-primary">Registro</button>
            </form>
        </form>

        </div>
    </div>
</div>


<?php 

if(isset($_POST['registro'])){
    
    $a_name = $_POST['name'];
    $a_email = $_POST['email'];
    $a_pass = $_POST['pass'];
    $a_pass2 = $_POST['pass2'];

        if(strcmp($a_pass,$a_pass2)){
            echo "<script>alert('La contraseñas no coinciden')</script>";
            echo "<script>window.open('registro_Admin.php','_self')</script>";
        }else{
            $a_pass = password_hash($a_pass,PASSWORD_DEFAULT,['cost' => 10]);
            $insert_admin = "CALL administrador('$a_email','$a_name','$a_pass')";
            $run_admin = mysqli_query($db,$insert_admin);    

    if($run_admin){
        echo "<script>alert('Registro exitoso')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        echo "<script>alert('No se pudo realizar el registro')</script>";
        
        echo "<script>window.open('registro_Admin.php','_self')</script>";
    }
    }
}

?>

<?php
include("includes/footer.php");
?>