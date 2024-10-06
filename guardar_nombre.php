<?php
// Datos de conexión a la base de datos
$servername = "localhost";  // Servidor de la base de datos (localhost si es en XAMPP)
$username = "root";         // Usuario por defecto en XAMPP
$password = "";             // Contraseña por defecto en XAMPP (déjala vacía)
$dbname = "rpg_game";       // Nombre de la base de datos que creaste

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre del jugador enviado desde el juego mediante POST
$nombre = $_POST['nombre'];

// Verificar que el campo 'nombre' no esté vacío
if (!empty($nombre)) {
    // Insertar el nombre en la tabla 'respuestas'
    $sql = "INSERT INTO respuestas (respuesta) VALUES ('$nombre')";
    
    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "Nombre guardado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "El nombre está vacío";
}

// Cerrar la conexión
$conn->close();
?>
