<?php 

    $db = new mysqli("localhost", "root", "", "simulazioni");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST["nome"]) && isset($_POST["altezza"]) && isset($_POST["peso"])){
            $stm = $db->prepare("INSERT INTO starwars (`name`, height, mass) VALUES (?, ?, ?)");
            $stm->bind_param("sii", $_POST["nome"], $_POST["altezza"], $_POST["peso"]);
            $stm->execute();
            if($stm == false){
                //errore
            } else {
                echo "inserimento avvenuto con successo!";
            }
            $stm->close();
        }
    } else if($_SERVER['REQUEST_METHOD'] == "GET"){
        $stm = $db->prepare("SELECT COUNT(*) as num FROM starwars");
        $stm->execute();
        if($stm == false){
            //errore
        } else {
            $result = $stm->get_result()->fetch_all(MYSQLI_ASSOC)[0]["num"];
            $stm->close();
            if($result <= 0){
                //errore
            } else {
                $stm = $db->prepare("SELECT `name`, height, mass FROM starwars");
                $stm->execute();
                if($stm == false){
                    //errore
                } else {
                    $result = $stm->get_result()->fetch_all(MYSQLI_ASSOC);

                    $json = array();
                    foreach($result as $personaggio){
                        $personaggioArray = array();
                        $personaggioArray["nome"] = $personaggio["name"];
                        $personaggioArray["altezza"] = $personaggio["height"];
                        $personaggioArray["peso"] = $personaggio["mass"];
                        array_push($json, $personaggioArray);
                    }

                    $json = json_encode($json);
                    echo $json;
                }
            }
        }

    }
 
    $db->close();
?>