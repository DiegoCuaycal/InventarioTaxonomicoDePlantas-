<?php
class CConexion
{
    function ConexionBD()
    {
        $host = "localhost";
        $dbname = "InventarioTaxonomico";
        $username = "postgres";
        $password = "Diego";

        $conn = null;  

        try {
            $conn = new PDO("pgsql:host=$host; dbname=$dbname", $username, $password);
            echo "Se conectó correctamente a la Base de Datos";
        } catch (PDOException $e) {
            echo ("No se puede conectar a la base de datos, $e ");
        }

        return $conn;
    }
}
?>
