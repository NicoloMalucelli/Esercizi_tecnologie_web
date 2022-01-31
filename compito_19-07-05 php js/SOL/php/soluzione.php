<?php

$_POST["soglia1"] = 1;
$_POST["soglia2"] = 99999;

if(isset($_POST["soglia1"]) && isset($_POST["soglia2"]) 
&& $_POST["soglia1"] > 0 && $_POST["soglia2"] > 0){

    $db = new mysqli("localhost", "root", "", "simulazioni");

    $stm = $db->prepare("SELECT numero FROM numeri WHERE numero > ? && numero < ?");
    $stm->bind_param("ii", $_POST["soglia1"], $_POST["soglia2"]);
    $stm->execute();
    if($stm != false){
        $result = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
        $numbers = array();
        foreach($result as $row){
            array_push($numbers, $row["numero"]);
        }

        //ordinamento

    }

    $scambio = false;
    do{
        $scambio = false;
        for($i = 0; $i < count($numbers)-1; $i++){
            if($numbers[$i] > $numbers[$i+1]){
                $tmp = $numbers[$i];
                $numbers[$i] = $numbers[$i+1];
                $numbers[$i+1] = $tmp;
                $scambio = true;
            }
        }
    }while($scambio);

    var_dump(json_encode($numbers));
}

?>