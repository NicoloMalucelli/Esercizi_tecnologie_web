<?php

$servername = "localhost";
$username = "root";
$password = "";
$namedb = "terzoappello";

// Create connection
$conn = new mysqli($servername, $username, $password, $namedb);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
if(isset($nome) && $nome!=null && isset($cognome) && $cognome!=null){
  $sql = 'SELECT * FROM mail WHERE nome="'.$nome.'" AND cognome="'.$cognome.'"';

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while(strlen($nome.".".$cognome.($result->num_rows+1))>20){
        $nome = substr($nome,0,strlen($nome)-1);
    }
    $email = $nome . "." . $cognome . ($result->num_rows+1) . "@studio.unibo.it";
  } else {
    while(strlen($nome.".".$cognome)>20){
        $nome = substr($nome,0,strlen($nome)-1);
    }
    $email = $nome . "." . $cognome . "@studio.unibo.it";
  }
  $nome = $_POST["nome"];
  $sql = 'INSERT INTO `mail`(`matricola`, `nome`, `cognome`, `mail`) VALUES (NULL,"'.$nome.'","'.$cognome.'","'.$email.'")';
  $result = $conn->query($sql);
} else {
  echo "Valori inseriti sono incorretti";

}
$conn->close();
?>
