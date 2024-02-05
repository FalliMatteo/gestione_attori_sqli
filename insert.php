<?php
    session_start();
    $connection = new mysqli("localhost", "root", "", "cinema");
    if($connection->connect_error){
        die($connection->connect_error);
    }
    function insertActor($connection, $name, $birth_year, $nation){
        if($name != "" && $birth_year != 0 && $nation != ""){
            $sql = "INSERT INTO attori (Nome, AnnoNascita, Nazionalita) VALUES('$name', '$birth_year', '$nation')";
            $connection->query($sql);
            $_SESSION["message"] = "Attore aggiunto con successo <br><br>";
        }else{
            $_SESSION["message"] = "Errore: gli input devono essere compilati <br><br>";
        }
    }
    insertActor($connection, $_POST["name"], $_POST["year"], $_POST["nation"]);
    $connection->close();
    header("Location: index.php");
?>