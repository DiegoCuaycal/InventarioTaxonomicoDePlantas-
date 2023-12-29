<?php
class CConexion
{
    function ConexionBD()
    {
        $host = "localhost";
        $dbname = "InventarioTaxonomico";
        $username = "postgres";
        $password = "Diego";

        $conn = null;  // Asegúrate de declarar $conn antes del bloque try-catch

<<<<<<< HEAD
        try {
            $conn = new PDO("pgsql:host=$host; dbname=$dbname", $username, $password);
            echo "Se conectó correctamente a la Base de Datos";
        } catch (PDOException $e) {
            echo ("No se puede conectar a la base de datos, $e ");
        }
        ///

        

=======
       try {
           $conn = new PDO("pgsql:host=$host; dbname=$dbname", $username, $password);
           echo "Se conectó correctamente a la Base de Datos";
       } catch (PDOException $e) {
           echo ("No se puede conectar a la base de datos, $e ");
       }
       ///

    
       ///Test Comentario #2
       ///Test Comentario #3
>>>>>>> 0bf3aa60639bf7fa28b73c04a563e9e98e61df6e



        return $conn;
    }
}

?>