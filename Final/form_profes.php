<?php
$host = 'localhost';
$usuario = 'root';
$password = '';
$base_datos = 'my_proyecto';


$conn = new mysqli($host, $usuario, $password, $base_datos);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $materia = $conn->real_escape_string($_POST['materia']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $dias = $conn->real_escape_string($_POST['dias']);

    
    $sql = "INSERT INTO profesores (materia, nombre, email, dias_disponibles) 
            VALUES ('$materia', '$nombre', '$email', '$dias')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message'>¡Profesor registrado exitosamente!</div>";
    } else {
        echo "<div class='error-message'>Error: " . $conn->error . "</div>";
    }
}


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Profesores</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
            color: #333;
        }

        .back-to-home {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .back-to-home .btn {
            font-size: 18px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-to-home .btn:hover {
            background-color: #0056b3;
        }

        .form-container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .success-message {
            margin: 20px auto;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="back-to-home">
        <a href="index.php" class="btn">Volver al inicio</a>
    </div>

   

    <div class="form-container">
        <h2>Formulario para Profesores</h2>
        <form action="form_profes.php" method="POST">
            <label for="materia">Materia:</label>
            <input type="text" id="materia" name="materia" placeholder="Materia que impartes" required>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required>

            <label for="dias">Días Disponibles:</label>
            <input type="text" id="dias" name="dias" placeholder="Ejemplo: Lunes, Miércoles" required>

            <button type="submit">Enviar</button>
        </form>
    </div>

</body>
</html>
