<?php


$db = new mysqli("localhost", "root", "", "luglio");
$_POST["soglia"] = 1;

if(isset($_POST["soglia"]) && $_POST["soglia"] != null){
    $stm = $db->prepare("SELECT numero FROM numeri WHERE numero > ?");
    $stm->bind_param("i", $_POST["soglia"]);
    $stm->execute();
    if($stm == false){
        echo "errore";
        return;
    }
    $result = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
    $values = array();
    foreach($result as $row){
        array_push($values, $row["numero"]);
    }

    var_dump($values);
    for($i = 1; $i < count($values); $i++){
        for($j = $i-1; $j < count($values); $j++){
            if($values[$j] > $values[$i]){
                $tmp = $values[$j];
                $values[$j] = $values[$i];
                $values[$i] = $tmp;
                break;
            }
        }
    }
    var_dump($values);
}


$db->close();
?>