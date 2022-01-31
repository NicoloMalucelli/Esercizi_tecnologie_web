<?php

$db = new mysqli("localhost", "root", "", "simulazioni");

$stm = $db->prepare("SELECT DISTINCT Citta FROM temperature");
$stm->execute();
if($stm != false){
  $citta = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
} else {

}
$stm->close();

if(isset($_GET["citta"])){
  $stm = $db->prepare("SELECT `min`, `max`, citta FROM temperature WHERE citta = ?");
  $stm->bind_param("s", $_GET["citta"]);
  $stm->execute();
  if($stm != false){
    $dettagli = $stm->get_result()->fetch_all(MYSQLI_ASSOC)[0];
  } else {

  }
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
        <?php foreach($citta as $c): ?>
          <option value="<?php echo $c["Citta"]?>" <?php if(isset($dettagli) && $dettagli["citta"] == $c["Citta"]){echo "selected";}?>><?php echo $c["Citta"]?></option>
        <?php endforeach; ?>
      </select>
      <input type="submit" value="Invia" />
    </form>
    <?php if(isset($dettagli)): ?>
      <p>t.min: <?php echo $dettagli["min"]?></p>
      <p>t.max: <?php echo $dettagli["max"]?></p>
    <?php endif; ?>
  </body>
</html>
