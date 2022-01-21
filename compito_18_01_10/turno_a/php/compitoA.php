<?php
session_start();

$servername="localhost";
$username ="root";
$password ="";
$database = "impiccato";
$conn = new mysqli($servername, $username, $password, $database);

$parolaDB = "";

  if(isset($_POST["lettera"])){
    if(!isset($_SESSION["parola"])){
      $randParola = rand(1,5);
      $_SESSION["parola"] = $randParola;
    }else {
      $randParola = $_SESSION["parola"];
    }

    $query = "SELECT `parola` from `parola` WHERE `parola_id`= ".$randParola." ;";
    $result = $conn->query($query);


      while ($row = $result->fetch_assoc()) {
        $parolaDB = $row["parola"];
      }

$conn->close();


  }

  function pos_all($haystack, $needle) {

      $offset = 0;
      while (($position = strpos($haystack, $needle, $offset)) !== FALSE) {
          $offset = $position + 1;
          echo 'lettera: ' . $needle . ' indice: ' . $position . "<br>";
      }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Impiccato</title>
  </head>
  <body>
    <form action="index.php" method="post">
      <label>Lettera</label>
      <input type="text" name="lettera" id="lettera">
      <br>
      <input type="submit" value="submit">
    </form>
    <div>
      <?php
        //Cerca se c'è/ci sono la/e lettera/e nella parola nascosta e qual è la posizione
        if(isset($_POST["lettera"]))
          pos_all($parolaDB, $_POST["lettera"]);
       ?>
    </div>
  </body>
</html>
