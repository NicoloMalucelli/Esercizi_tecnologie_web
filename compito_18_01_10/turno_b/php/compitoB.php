<?php


if (isset($_GET['numero'])){
  // Prendi la stringa risultante dalla richiesta GET
  $numero = $_GET['numero'];
  $set = array();
  $returnToDb = array();

  $servername="localhost";
  $username ="root";
  $password ="";
  $database = "set";

  // Connessione al db
  $db = new mysqli($servername, $username, $password, $database);
  if ($db->connect_error) {
      die('Connessione fallita: ' . $conn->connect_error);
  }

  // Query al db
  $query = $db->query("SELECT * FROM `set`");

  while ($row = $query->fetch_assoc()) {
      $set = explode("-", $row['numeri']);
  }

  foreach($set as $value){
    if($numero === $value){

        $valueTemp = $set;
        if (($key = array_search($numero, $valueTemp)) !== false) {
          unset($valueTemp[$key]);
        }

        $insertQuery = $db->query("INSERT INTO `set` (`id`, `numeri`) VALUES
                                  ('', '".implode('-',$valueTemp)."');");

        echo "Il numero $numero è nell'array del db";
      }

  }

}else{
  echo 'non è settato $_GET[numero]';
}

$db->close();

?>
