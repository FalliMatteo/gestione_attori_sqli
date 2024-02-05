<?php
    session_start();
    $connection = new mysqli("localhost", "root", "", "cinema");
    if($connection->connect_error){
        die($connection->connect_error);
    }
    function updateActor($connection, $name, $nation){
        if($nation != "" && $name != ""){
            $sql = "UPDATE attori SET Nazionalita = '$nation' WHERE Nome = '$name'";
            $connection->query($sql);
            if($connection->affected_rows > 0){
                $_SESSION["message"] = "Attore aggiornato con successo <br><br>";
            }else{
                $_SESSION["message"] = "Errore: attore inesistente <br><br>";
            }
        }else{
            $_SESSION["message"] = "Errore: gli input devono essere compilati <br><br>";
        }
    }
    updateActor($connection, $_POST["name"], $_POST["nation"]);
    $connection->close();
    header("Location: index.php");
?>