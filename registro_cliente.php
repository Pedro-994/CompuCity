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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>
</html>