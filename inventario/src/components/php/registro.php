<?php
include 'conexion.php';

$nombre_completo = $_POST["nombre_completo"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

// Crear una instancia de CConexion
$conexion = new CConexion();

// Llamar al método ConexionBD en la instancia creada
$conn = $conexion->ConexionBD();

// Verificar si la conexión se estableció correctamente
if ($conn) {
    try {
        // Utilizar una consulta preparada para evitar la inyección de SQL
        $query = "INSERT INTO Usuarios(nombre_completo, correo, usuario, contrasena)
                  VALUES(:nombre_completo, :correo, :usuario, :contrasena)";

        $stmt = $conn->prepare($query);

        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt) {
            // Hash de la contraseña
            $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

            $params = array(
                'nombre_completo' => $nombre_completo,
                'correo' => $correo,
                'usuario' => $usuario,
                'contrasena' => $hashed_password
            );

            // Ejecutar la consulta preparada con parámetros
            $result = $stmt->execute($params);

            // Después de ejecutar la consulta preparada
            if ($result) {
                echo "Registro exitoso<br>";
                // Redirigir o mostrar mensaje de éxito
                header("Location: registroexitoso.php");
                exit();
            } else {
                echo "Error en la ejecución de la consulta: " . $stmt->errorInfo()[2] . "<br>";
            }
        } else {
            echo "Error en la preparación de la consulta<br>";
        }
    } catch (PDOException $e) {
        // Capturar excepciones de PDO
        echo "Error en la conexión a la base de datos: " . $e->getMessage();
    } finally {
        // Cerrar la conexión
        $conn = null;
    }
} else {
    echo "Error en la conexión a la base de datos";
}
?>



            

