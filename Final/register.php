<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $host = 'localhost';
    $usuario = 'root';
    $password = '';
    $base_datos = 'my_proyecto';

    $conn = new mysqli($host, $usuario, $password, $base_datos);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

   
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $error = "El correo electrónico ya está registrado.";
    } else {
       
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$pass')";

        if ($conn->query($sql) === TRUE) {
            header("Location: login.php"); 
            exit();
        } else {
            $error = "Error al registrar: " . $conn->error;
        }
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="register-container">
        <h2>Registrarse</h2>
        
        <form action="register.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Registrarse</button>
        </form>

       
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>

</body>
</html>
