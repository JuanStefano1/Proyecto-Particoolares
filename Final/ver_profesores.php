<?php

$host = 'localhost';
$usuario = 'root';
$password = '';
$base_datos = 'my_proyecto';

$conn = new mysqli($host, $usuario, $password, $base_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql_delete = "DELETE FROM profesores WHERE id = ?";
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Profesor eliminado correctamente.');</script>";
        echo "<script>window.location.href = 'ver_profesores.php';</script>";
        exit;
    } else {
        echo "Error al eliminar el profesor: " . $conn->error;
    }
}

$sql = "SELECT * FROM profesores";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #171717;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #2980b9;
            color: white;
            text-transform: uppercase;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-reserva {
            padding: 8px 12px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-reserva:hover {
            background-color: #c0392b;
        }
        .back-to-home {
            text-align: center;
            margin-top: 20px;
        }
        .back-to-home .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2980b9;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .back-to-home .btn:hover {
            background-color: #1a5276;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Profesores</h1>
        <?php if ($resultado->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                        <th>Días Disponibles</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($fila['materia']); ?></td>
                            <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($fila['email']); ?></td>
                            <td><?php echo htmlspecialchars($fila['dias_disponibles']); ?></td>
                            <td>
                                <form method="POST" action="ver_profesores.php" onsubmit="return confirm('¿Estás seguro de reservar este profesor?');">
                                    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                    <button type="submit" class="btn-reserva">Reserva</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay profesores registrados actualmente.</p>
        <?php endif; ?>
        <div class="back-to-home">
            <a href="index.php" class="btn">Volver al Inicio</a>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
