<?php 

    $db = new mysqli("localhost", "root", "", "settembre", 3306);
    echo "ad";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST["nome"]) && isset($_POST["altezza"]) && isset($_POST["peso"])
        && $_POST["nome"] != null && $_POST["altezza"] != null && $_POST["peso"] != null){
            $stmt = $db->prepare("INSERT INTO starwars (`name`, height, mass) VALUES (?, ?, ?)");
            $stmt->bind_param("sii", $_POST["nome"], $_POST["altezza"], $_POST["peso"]);
            $stmt->execute();
            if($stmt == false){
                echo "errore";
            }
            $result = $stmt->get_result();
        }
    }
?>