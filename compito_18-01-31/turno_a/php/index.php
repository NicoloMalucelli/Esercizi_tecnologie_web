<?php

function randNum($min, $max){
    return rand($min, $max);
}


/*TOMBOLA -> Estrai nuovo numero oppure resetta partita */
$servername="localhost";
$username ="root";
$password ="";
$database = "tombola";
$conn = new mysqli($servername, $username, $password, $database);

if(isset($_GET["tombola"])){
  $tombola = $_GET["tombola"];
  $numeriDB = [];

  if($tombola == "extract"){
    $query = "SELECT `numero` from `partita` WHERE 1";
    $result = $conn->query($query);

    //prendo i dati dal db
    while ($row = $result->fetch_assoc()) {
      array_push($numeriDB, $row["numero"]);
    }

    $ifPresent = TRUE;
    // guardiamo se il numero estratto casualmente non sia già presente nel db
    while($ifPresent == TRUE){

      $randNum = randNum(1, 90);
      $ifPresent = FALSE;

      for($i = 0; $i < count($numeriDB) ; $i++){

          if($randNum == $numeriDB[$i]){
              $ifPresent = TRUE;
          }
      }

      if($ifPresent == FALSE){
        $sql = "INSERT INTO `partita`(`numero`) VALUES ('". $randNum ."')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

      }

    }

    $conn->close();
  }

  if($tombola == "reset"){

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE from `partita`";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
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
     <title>Tombola</title>
   </head>
   <body>
     <div>
       <form action="index.php" method="get">
         <input type="radio" name="tombola" value="extract">Estrai un nuovo numero<br>
         <input type="radio" name="tombola" value="reset">Resetta partita<br>

         <input type="submit" value="submit">

        </form>
     </div>
   </body>
 </html>
