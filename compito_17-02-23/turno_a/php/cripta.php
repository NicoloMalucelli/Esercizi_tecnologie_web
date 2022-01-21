<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
<?php

function in_str($str, $find) {
  foreach ($find as $ch) {
    if (strpos($str, $ch) !== false) {
      return true;
    }
  }
  return false;
}

$symbols = array(',', '.', ':', '?', '!');
$digits = array();
for ($i = 0; $i < 10; $i++) {
  array_push($digits, chr(48 + $i));
}
$lowercases = array();
for ($i = 0; $i < 26; $i++) {
  array_push($lowercases, chr(97 + $i));
}
$uppercases = array();
for ($i = 0; $i < 26; $i++) {
  array_push($uppercases, chr(65 + $i));
}

if (isset($_POST['nome']) && strlen($_POST['nome']) > 0 && !in_str($_POST['nome'], $digits)
    && isset($_POST['cognome']) && strlen($_POST['cognome']) > 0 && !in_str($_POST['cognome'], $digits)
    && isset($_POST['password']) && strlen($_POST['password']) >= 9 && in_str($_POST['password'], $digits)
    && in_str($_POST['password'], $symbols) && in_str($_POST['password'], $uppercases) && in_str($_POST['password'], $lowercases)) {
  $chiave = 26 - (rand(0, 24) - 25);
  $password = '';
  $a = str_split($_POST['password']);
  foreach ($a as $ch) {
    if (in_str($ch, $lowercases)) {
        $ch = chr(97 + (ord($ch) -97 + $chiave) % 26);

    } else if (in_str($ch, $uppercases)) {
      $ch = chr(65 + (ord($ch) -65 + $chiave) % 26);
    }
    $password .= $ch;
  }

  $conn = new mysqli("localhost", "root", "", "terzoappello");
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO utenti (nome, cognome, password, chiave)
  VALUES ('" . $_POST['nome'] . "', '" . $_POST['cognome'] . "', '$password', $chiave)";

  if ($conn->query($sql) === TRUE) {
      echo "Aggiunto nuovo utente";
  } else {
      echo "Errore: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
} else {
  echo "Dati non validi";
}

?>
</body>
</html>
