<?php
include 'conexion.php';

$nombre_completo = $_POST["nombre_completo"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

$conexion = new CConexion();

$conn = $conexion->ConexionBD();

if ($conn) {
    try {
        $query = "INSERT INTO Usuarios(nombre_completo, correo, usuario, contrasena)
                  VALUES(:nombre_completo, :correo, :usuario, :contrasena)";

        $stmt = $conn->prepare($query);
        if ($stmt) {
            $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

            $params = array(
                'nombre_completo' => $nombre_completo,
                'correo' => $correo,
                'usuario' => $usuario,
                'contrasena' => $hashed_password
            );

            $result = $stmt->execute($params);

            if ($result) {
                echo "Registro exitoso<br>";
                header("Location: registroexitoso.php");
                exit();
            } else {
                echo "Error en la ejecución de la consulta: " . $stmt->errorInfo()[2] . "<br>";
            }
        } else {
            echo "Error en la preparación de la consulta<br>";
        }
    } catch (PDOException $e) {
        echo "Error en la conexión a la base de datos: " . $e->getMessage();
    } finally {
        $conn = null;
    }
} else {
    echo "Error en la conexión a la base de datos";
}
?>



            

