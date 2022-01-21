<?php

class Hamming{
    
    function isValid($str1, $str2){
        return strlen($str1) == strlen($str2);
    }

    function distance($str1, $str2){
        $distance = 0;
        $arr1 = str_split($str1);
        $arr2 = str_split($str2);
        for($i = 0; $i < strlen($str1); $i++){
            if($arr1[$i] != $arr2[$i]){
                $distance++;
            }
        }
        return $distance;
    }

    function weight($str){
        $str2 = array();
        for($i = 0; $i < strlen($str); $i++){
            array_push($str2, "0");
        }

        return $this->distance($str, implode("", $str2));
    }

}

$nome = "mario";

$hamming = new Hamming();

$db = new mysqli("localhost", "root", "", "settembre");

$stm = $db->prepare("SELECT stringa FROM stringhe");
$stm->execute();

if($stm == false){
    echo "errore";
} else{
    $result = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
    $strings = array();
    foreach($result as $row){
        array_push($strings, $row["stringa"]);
    }

    $hammings = array();
    foreach($strings as $string){
        if($hamming->isValid($nome, $string)){
            $hammings[$string] = array();
            $hammings[$string]["distanza"] = $hamming->distance($nome, $string);
            $hammings[$string]["peso"] = $hamming->weight($string);
        }
    }
    var_dump(json_encode($hammings));
}
$stm->close();

?>