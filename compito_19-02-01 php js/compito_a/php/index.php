<?php

function checkCinquina($numeri, $input){
  $inputNumeri = explode('-', $input);
  if(count($inputNumeri) != 5) {
    return false;
  }

  foreach($inputNumeri as $numero){
    if(!is_numeric($numero) || !isset($numeri[$numero])){ // questo check riassume tutti i check richiesti sull'input dei numeri
      return false;
    }
  }
  return true;
}

function aggiungiNumero($db, $numeri) {
  if(count($numeri) >= 90){
    return;
  }
  $nuovo = "".rand(1, 90);
  do {
    $nuovo = "".rand(1, 90);
  } while(isset($numeri[$nuovo]));

  $db->exec('INSERT INTO partita(numero) VALUES (' . $nuovo . ')');
}

if(isset($_GET['bingo']) && !empty($_GET['bingo']) && ($_GET['bingo'] === 'cinquina' || $_GET['bingo'] === 'bingo')){
try {
  $db = new PDO('mysql:host=127.0.0.1;dbname=bingo', 'root', '');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  $numeri = [];
  $records = $db->query('SELECT numero FROM partita')->fetchAll();
  foreach($records as $record){
    $numeri[$record['numero']] = $record['numero'];
  }

  if($_GET['bingo'] === 'cinquina') {
    if(count($numeri) < 5){
      echo 'non è ancora possibile fare cinquina';
      aggiungiNumero($db, $numeri);
    } else {
      if(checkCinquina($numeri, $_GET['bingo_row1']) || checkCinquina($numeri, $_GET['bingo_row2']) || checkCinquina($numeri, $_GET['bingo_row3'])) {
        echo 'Hai fatto cinquina';
      } else {
        aggiungiNumero($db, $numeri);
      }
    }
  } else if($_GET['bingo'] === 'bingo') {
    if(count($numeri) < 15){
      echo 'non è ancora possibile fare bingo';
      aggiungiNumero($db, $numeri);
    } else {
      if(checkCinquina($numeri, $_GET['bingo_row1']) && checkCinquina($numeri, $_GET['bingo_row2']) && checkCinquina($numeri, $_GET['bingo_row3'])) {
        echo 'Hai fatto bingo';
      } else {
        aggiungiNumero($db, $numeri);
      }
    }
  }

}catch(PDOException $e) {
  echo 'errore pdo ' . $e->getMessage();
}
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
       <form action="index.php">
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
