<?php

if(isset($_GET["lotto"])){
  if($_GET["lotto"] == "extract"){
    $values = getValues();
    if(count($values) >= 5){
      echo "impossibile inserire un nuovo numero";
    } else {
      insertNewNumber();
    }
  } else if($_GET["lotto"] == "start"){
    clearDB();
  }
}

function insertNewNumber(){
  $values = getValues();

  $available = array_diff(range(1, 90), $values);
  $index = rand(0, count($available)-2);
  $toAdd = $available[$index];

  $db = new mysqli("localhost", "root", "", "lotto");
  $stm = $db->prepare("INSERT INTO estrazione (numero) VALUES (?)");
  $stm->bind_param("i", $toAdd);
  $stm->execute();

  echo "numero inserito ".$toAdd;

  $stm->close();
  $db->close();
}

function getValues(){
  $db = new mysqli("localhost", "root", "", "lotto");
  $stm = $db->prepare("SELECT numero FROM estrazione");
  $stm->execute();
  $result = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
  
  $stm->close();
  $db->close();

  $numbers = array();
  foreach($result as $row){
    array_push($numbers, $row["numero"]);
  }

  return $numbers;
}

function clearDB(){
  $db = new mysqli("localhost", "root", "", "lotto");
  $stm = $db->prepare("DELETE FROM estrazione");
  $stm->execute();

  $stm->close();
  $db->close();
}

?>

<!DOCTYPE html>
 <html>
   <head>
     <title>Lotto</title>
   </head>
   <body>
     <div>
       <form action="esercizio-php.php" method="get">
         <input type="radio" name="lotto" value="extract">Estrai un nuovo numero<br>
         <input type="radio" name="lotto" value="start">Inizia una nuova estrazione<br>

         <input type="submit" value="submit">

        </form>
     </div>
   </body>
 </html>