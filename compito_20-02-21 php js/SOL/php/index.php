<?php 

if(isset($_COOKIE["categoria"])){
  $templateParams["articoli"] = getFromCategory($_COOKIE["categoria"]);
} else {
  $templateParams["articoli"] = getAll();
}

function getFromCategory($category){
  $db = new mysqli("localhost", "root", "", "simulazioni");
  $stm = $db->prepare("SELECT Titolo, Categoria, Descrizione FROM articoli WHERE categoria = ?");
  $stm->bind_param("s", $category);
  $stm->execute();
  if($stm != false){
    $result = $stm->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
}

function getAll(){
  $db = new mysqli("localhost", "root", "", "simulazioni");
  $stm = $db->prepare("SELECT Titolo, Categoria, Descrizione FROM articoli");
  $stm->execute();
  if($stm != false){
    $result = $stm->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
}
?>

<html lang="it">
  <head>
    <title>Esercizio PHP</title>
  </head>
  <body>
    <div class="header">
      <a  class="home">Esercizio PHP</a>
      <div class="products">
        <a href="index.php">Homepage</a>
        <a href="settings.php">Settings</a>
      </div>
    </div>
    <article>
      <?php foreach($templateParams["articoli"] as $articolo):?>
        <div>
          <h1><?php echo $articolo["Titolo"]?></h1>
          <p><?php echo $articolo["Descrizione"]?></p>
        </div>
      <?php endforeach; ?>
    </article>
  </body>
</html>
