<?php
//parte il turno 1
function count_turn($partitaDB){
  $counter = 0;
  for($j=0; $j<count($partitaDB); $j++){
    echo $partitaDB[$j][2];
    if($partitaDB[$j][2] == 1){
      $counter++;
    }else{$counter--;}
  }
echo $counter;
return $counter == 0 ? "1" : "2";
}

/*TOMBOLA -> Estrai nuovo numero oppure resetta partita */
$servername="localhost";
$username ="root";
$password ="";
$database = "forza4";
$conn = new mysqli($servername, $username, $password, $database);

if(isset($_GET["forza4"])){
  $forzaQuattro = $_GET["forza4"];
  $partitaDB = [];

  //la string non è vuota
  if ($forzaQuattro != "") {

    $forzaQuattro_array = explode(",",$forzaQuattro);

    $query = "SELECT `riga`, `colonna`, `turno` from `partita` WHERE 1";
    $result = $conn->query($query);

    //prendo i dati dal db
    while ($row = $result->fetch_assoc()) {
      $mossa = [];
      array_push($mossa, $row["riga"],$row["colonna"], $row["turno"]);
      array_push($partitaDB, $mossa);
    }

    $isAmmissible = TRUE;

    if($forzaQuattro_array[0] > 6 or $forzaQuattro_array[0] > 7){
        echo "La mossa non è ammissibile";
        $isAmmissible = FALSE;
      }

    for($i=0; $i<count($partitaDB); $i++){

       if($partitaDB[$i][0] == $forzaQuattro_array[0] and $partitaDB[$i][1] == $forzaQuattro_array[1]){
         echo "La mossa non è ammissibile";
         $isAmmissible = FALSE;
       }
    }

    if($isAmmissible == TRUE){
      $sql = "INSERT INTO `partita`(`riga`, `colonna`, `turno`) VALUES ('".$forzaQuattro_array[0]."','".$forzaQuattro_array[1]."','".count_turn($partitaDB)."')";
      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    $conn->close();
  }

}

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <title>Forza Quattro</title>
   </head>
   <body>
     <div>
       <form action="index.php" method="get">
         <input type="text" name="forza4" id="forza4">
         <input type="submit" value="submit">
        </form>
     </div>
   </body>
 </html>
