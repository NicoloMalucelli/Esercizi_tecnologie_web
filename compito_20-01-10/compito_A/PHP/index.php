<?php

class DatabaseHelper{
  private $db;
  
  public function __construct($servername, $username, $password, $dbname, $port){
    $this->db = new mysqli($servername, $username, $password, $dbname, $port);
    if($this->db->connect_error){
        die("Connesione fallita al db");
    }
  }  

  function getCitta(){
    $stmt = $this->db->prepare("SELECT citta FROM temperature");
    $stmt->execute();
    $result = $stmt->get_result();
  
    $arr = array();
    foreach($result->fetch_all(MYSQLI_ASSOC) as $row){
      array_push($arr, $row["citta"]);
    }
  
    return $arr;
  }

  function getInfo($citta){
    $stmt = $this->db->prepare("SELECT * FROM temperature WHERE citta = ?");
    $stmt->bind_param('s',$citta);
    $stmt->execute();
    $result = $stmt->get_result();
  
    return $result->fetch_all(MYSQLI_ASSOC)[0];
  }
}

$dbh = new DatabaseHelper("localhost", "root", "", "temperature", 3306);

$templateParams["citta"] = $dbh->getCitta();
if(isset($_GET["citta"]) && $_GET["citta"] != ""){
  $templateParams["cittaSelezionata"] = $dbh->getInfo($_GET["citta"]);
}

?>

<html lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Città Italiane</title>
  </head>
  <body>
    <form action="index.php" method="GET">
      <label for="citta">Città</label>
      <select name="citta">
        <?php foreach($templateParams["citta"] as $citta):?>
          <option value="<?php echo $citta?>"><?php echo $citta?></option>
        <?php endforeach;?>
      </select>
      <input type="submit" value="Invia" />
    </form>
    <?php if(isset($templateParams["cittaSelezionata"])): ?>
      <p><?php echo $templateParams["cittaSelezionata"]["citta"]?></p>
      <p><?php echo $templateParams["cittaSelezionata"]["min"]?></p>
      <p><?php echo $templateParams["cittaSelezionata"]["max"]?></p>
      <?php endif;?>
  </body>
</html>
