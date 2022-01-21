<?php

if(isset($_GET["bingo"])){
    if($_GET["bingo"] == "cinquina"){
        $input = $_GET["bingo_row1"];
        $input = explode("-", $input);
        $dbValues = getValues();

        if(count(getValues()) >= 5){
            $match = 0;
            foreach($input as $inputVal){
                if(in_array($inputVal, $dbValues)){
                    $match++;
                }
            }
            if($match == 5){
                echo "hai fatto cinquina";
            } else {
                addValue();
            }
        } else {
            echo "non è ancora possibile fare cinquina";
            addValue();
        }
    } else if($_GET["bingo"] == "bingo"){
        if(isset($_GET["bingo_row1"]) && isset($_GET["bingo_row2"]) && isset($_GET["bingo_row3"])){
            $row1 = explode("-", $_GET["bingo_row1"]);
            $row2 = explode("-", $_GET["bingo_row2"]);
            $row3 = explode("-", $_GET["bingo_row3"]);
            if(count($row1) == 5 && count($row2) == 5 && count($row3) == 5){
                $dbValues = getValues();

                if(count(getValues()) >= 15){
                    $match = 0;
                    foreach($row1 as $inputVal){
                        if(in_array($inputVal, $dbValues)){
                            $match++;
                        }
                    }
                    foreach($row2 as $inputVal){
                        if(in_array($inputVal, $dbValues)){
                            $match++;
                        }
                    }
                    foreach($row3 as $inputVal){
                        if(in_array($inputVal, $dbValues)){
                            $match++;
                        }
                    }
                    if($match == 15){
                        echo "hai fatto bingo";
                    } else {
                        addValue();
                    }
                }
            }
        }
    }
}

function getValues(){
    $db = new mysqli("localhost", "root", "", "bingo");
    $stm = $db->prepare("SELECT numero FROM partita");
    $stm->execute();
    $result = $stm->get_result()->fetch_all(MYSQLI_ASSOC);

    $arr = array();
    foreach($result as $row){
        array_push($arr, $row["numero"]);
    }
    return $arr;
}

function addValue(){
    $dbValues = getValues();

    $available = array_diff(range(1,90), $dbValues);
    $index = rand(0, count($available)-1);
    $toAdd = $available[$index];
    
    $db = new mysqli("localhost", "root", "", "bingo");
    $stm = $db->prepare("INSERT INTO partita (numero) VALUES (?)");
    $stm->bind_param("i", $toAdd);
    $stm->execute();
}

?>

<!DOCTYPE html>
 <html>
   <head>
     <title>Bingo</title>
   </head>
   <body>
     <h1>Esercizio PHP</h1>
     <div>
       <form action="#">
         <h2>Bingo</h2>
         <section id="numbers">
          <label for="bingo_row1">
            Riga1: <input type="text" id="bingo_row1" name="bingo_row1">
          </label>
          <label for="bingo_row2">
            Riga2: <input type="text" id="bingo_row2" name="bingo_row2">
          </label>
          <label for="bingo_row3">
            Riga3: <input type="text" id="bingo_row3" name="bingo_row3">
          </label>
         </section>
         <section id="control">
           <input type="radio" name="bingo" value="cinquina">Controlla cinquina<br>
           <input type="radio" name="bingo" value="bingo">Controlla bingo<br>
        </section>
        <input type="submit" value="submit">
        </form>
     </div>
   </body>
 </html>