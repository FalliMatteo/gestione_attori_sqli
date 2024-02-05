<?php
    session_start();
    $connection = new mysqli("localhost", "root", "", "cinema");
    if($connection->connect_error){
        die($connection->connect_error);
    }
    function deleteActor($connection, $name){
        $sql = "DELETE FROM attori WHERE Nome = '$name'";
        $connection->query($sql);
        if($connection->affected_rows > 0){
            $_SESSION["message"] = "Attore rimosso con successo <br><br>";
        }else{
            $_SESSION["message"] = "Errore: attore inesistente <br><br>";
        }
    }
    deleteActor($connection, $_POST["name"]);
    $connection->close();
    header("Location: index.php");
?>