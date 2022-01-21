<?php

/*TOMBOLA -> Estrai nuovo numero oppure resetta partita */
$servername="localhost";
$username ="root";
$password ="";
$database = "tombola";
$conn = new mysqli($servername, $username, $password, $database);

if(isset($_GET["tombola"])){
  $tombola = $_GET["tombola"];
  $numeriDB = [];

  //la string non è vuota
  if ($tombola != "") {

    #stringa composta da numero e virgola
    $tombola_array = explode(",",$tombola);
    if(count($tombola_array) == 15){



      $query = "SELECT `numero` from `partita` WHERE 1";
      $result = $conn->query($query);

      //prendo i dati dal db
      while ($row = $result->fetch_assoc()) {
        array_push($numeriDB, $row["numero"]);
      }

      $isSubset = array_diff($tombola_array, $numeriDB);

      if (!$isSubset){
          echo 'Hai fatto tombola!';
      }else{
          echo 'Non hai fatto tombola, manca il numero: '.implode(', ',$isSubset);
      }

      $conn->close();
    }else{echo'devi inserire 15 numeri, ne hai inseriti: ' . count($tombola_array);}
  }

}

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <title>Tombola</title>
   </head>
   <body>
     <div>
       <form action="index.php" method="get">
         <input type="text" name="tombola" id="tombola">
         <input type="submit" value="submit">
        </form>
     </div>
   </body>
 </html>
