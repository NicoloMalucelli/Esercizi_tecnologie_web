<?php 

//var_dump(getValues(1));
//var_dump(getValues(2));

if(isset($_GET["A"]) && isset($_GET["B"])){
    $a = $_GET["A"];
    $b = $_GET["B"];

    if($a > 0 && $b > 0 && count(getValues($a)) > 0 && count(getValues($b)) > 0){
        $setA = getValues($a);
        $setB = getValues($b);

        $newSet = array_merge(array_diff($setA, $setB), array_diff($setB, $setA)); 
        var_dump($newSet);
        insertSet($newSet, getMaxId()+1, getMaxSetId()+1);
    }
}

function getValues($insieme){
    $db = new mysqli("localhost", "root", "", "giugno");
    $stm = $db->prepare("SELECT valore FROM insiemi WHERE insieme = ?");
    $stm->bind_param("i", $insieme);
    $stm->execute();
    $result = $stm->get_result()->fetch_all(MYSQLI_ASSOC);

    $arr = array();
    for($i = 0; $i < count($result); $i = $i + 1){
        array_push($arr, $result[$i]["valore"]);
    }
    return $arr; 
}

function getMaxId(){
    $db = new mysqli("localhost", "root", "", "giugno");
    $stm = $db->prepare("SELECT id FROM insiemi ORDER BY id DESC LIMIT 1");
    $stm->execute();
    $result = $stm->get_result();
    return $result->fetch_all(MYSQLI_ASSOC)[0]["id"];
}

function getMaxSetId(){
    $db = new mysqli("localhost", "root", "", "giugno");
    $stm = $db->prepare("SELECT insieme FROM insiemi ORDER BY insieme DESC LIMIT 1");
    $stm->execute();
    $result = $stm->get_result();
    return $result->fetch_all(MYSQLI_ASSOC)[0]["insieme"];
}

function insertSet($set, $id, $setID){
    $db = new mysqli("localhost", "root", "", "giugno");
    foreach($set as $val){
        $stm = $db->prepare("INSERT INTO insiemi (id, valore, insieme) VALUES (?, ?, ?)");
        $stm->bind_param("iii", $id, $val, $setID);
        $stm->execute();
        $id++;
    }
}
?>