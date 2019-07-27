<?php
    include("includes/header.php");
?>
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
            <input type="password" placeholder="Repetir contraseña">
        </div>
        <input type="button" class="btn btn-block btn-outline-success " value="Crear cuenta">
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>