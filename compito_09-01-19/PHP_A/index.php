<?php

function randNum($min, $max){
    return rand($min, $max);
}


/*LOTTO -> Estrai nuovo numero oppure inzia una nuova estrazione */
$servername="localhost";
$username ="root";
$password ="";
$database = "lotto";
$conn = new mysqli($servername, $username, $password, $database);

if(isset($_GET["lotto"])){
  $lotto = $_GET["lotto"];
  $numeriDB = [];

  if($lotto == "extract"){
    $query = "SELECT `numero` from `estrazione` WHERE 1";
    $result = $conn->query($query);

    //prendo i dati dal db
    while ($row = $result->fetch_assoc()) {
      array_push($numeriDB, $row["numero"]);
    }

    $ifPresent = TRUE;
    // controllo sul numero massimo di numeri da inserire e se il numero estratto casualmente non sia già presente nel db
    if(count($numeriDB) <= 4){
      while($ifPresent == TRUE){

        $randNum = randNum(1, 90);
        $ifPresent = FALSE;

          for($i = 0; $i < count($numeriDB) ; $i++){

              if($randNum == $numeriDB[$i]){
                  $ifPresent = TRUE;
              }
        }

        if($ifPresent == FALSE){
          $sql = "INSERT INTO `estrazione`(`numero`) VALUES ('". $randNum ."')";

          if ($conn->query($sql) === TRUE) {
              echo "Numero inserito correttamente";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }

        }

      }
    }else{print "E' già stato inserito il numero massimo di numeri";}

    $conn->close();
  }

  if($lotto == "start"){

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE from `estrazione`";

    if ($conn->query($sql) === TRUE) {
        echo "Numeri cancellati, inzia una nuova partita";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

  }

}

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <title>Lotto</title>
   </head>
   <body>
     <div>
       <form action="index.php" method="get">
         <input type="radio" name="lotto" value="extract">Estrai un nuovo numero<br>
         <input type="radio" name="lotto" value="start">Inizia una nuova estrazione<br>

         <input type="submit" value="submit">

        </form>
     </div>
   </body>
 </html>
