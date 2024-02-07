<?php
    include "connection.php";
    session_start();
    $connection = connectMySQL();
    function getActors($connection){
        try{
            $sql = "SELECT * FROM attori";
            $result = $connection->query($sql);
            if($result->num_rows > 0){
                $string = "Attori presenti nel database: <br><br>";
                while($row = $result->fetch_assoc()){
                    $string .= ($row["Nome"].", ".$row["AnnoNascita"].", ".$row["Nazionalita"]."<br>");
                }
            } else {
                $string = "0 results <br>";
            }
            $string .= "<br>";
        }catch(Exception $e){
            $string = $e->getMessage."<br><br>";
        }
        return $string;
    }
    $list = getActors($connection);
    $connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Gestione attori</title>
</head>
<body>
    <h1>Gestione attori</h1>
    <p>Seleziona il tipo di query da effettuare</p>
    <input type="radio" id="insert_input" name="select" value="insert" onclick="updateInputs()" checked>
    <label for="insert_input"> Insert</label><br>
    <input type="radio" id="delete_input" name="select" value="delete" onclick="updateInputs()">
    <label for="delete_input"> Delete</label><br>
    <input type="radio" id="update_input" name="select" value="update" onclick="updateInputs()">
    <label for="update_input"> Update</label><br>
    <br>
    <form id="form" action="insert.php" method="post">
        <div id="name">
            <label id="name_label" for="name_input">Nome e Cognome:</label><br>
            <input type="text" id="name_input" name="name"><br><br>
        </div>
        <div id="year">
            <label id="year_label" for="year_input">Anno di nascita:</label><br>
            <input type="number" id="year_input" name="year"><br><br>
        </div>
        <div id="nation">
            <label id="nation_label" for="nation_input">Nazione:</label><br>
            <input type="text" id="nation_input" name="nation"><br><br>
        </div>
        <input type="submit" value="Esegui">
    </form>
    <?php
        if(isset($_SESSION["message"])){
            echo "<br><b>" . $_SESSION["message"] . "</b>";
        }
        echo "<br>" . $list;
    ?>
    <script src="script.js"></script>
</body>
</html>