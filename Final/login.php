<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $host = 'localhost';
    $usuario = 'root';
    $password = '';
    $base_datos = 'my_proyecto';

    $conn = new mysqli($host, $usuario, $password, $base_datos);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    
    $email = $_POST['email'];
    $pass = $_POST['password'];

    
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$pass' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $_SESSION['user_email'] = $email;  
        header("Location: index.php"); 
        exit();
    } else {
       
        $error = "Correo electrónico o contraseña incorrectos.";
    }

   
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar sesión</button>
        </form>

       
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <p>No tienes una cuenta? <a href="register.php">Registrate aquí</a></p>
    </div>

</body>
</html>
