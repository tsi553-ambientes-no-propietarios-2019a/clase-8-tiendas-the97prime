<?php
include('common/utils.php')
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form action="php/process_login.php" method="post">
        <div>
            <input type="text" name="username" placeholder="Usuario">
        </div>
        <div>
            <input type="password" name="password" placeholder="Clave">
        </div>
        
        <button>Ingresar</button>
        
        <br>
        <a href="registration.php">Registrame, no tengo usuario :(!</a>
    </form>
</body>
</html>
