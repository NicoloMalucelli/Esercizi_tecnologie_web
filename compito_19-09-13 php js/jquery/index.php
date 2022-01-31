<?php
  // Ottengo le variabili inviate tramite GET
  $nome = $_POST['nome'];
  $altezza = $_POST['altezza'];
  $peso = $_POST['peso'];


  // Verifico la correttezza delle variabili
  if (isset($nome) && isset($altezza) && isset($peso)) {

      // Parametri per la connessione al database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "settembre";

      // Creo la connessione
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Verifico l'esito della connessione
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Verifico che vi siano numeri appartenenti all'insieme A
      $sql = "SELECT * FROM star wars WHERE insieme=\"" . $A . "\"";
      $resultA = $conn->query($sql);
      /*if ($resultA->num_rows > 0) {
        // Verifico che vi siano numeri appartenenti all'insieme B
        $sql = "SELECT * FROM insiemi WHERE insieme=\"" . $B . "\"";
        $resultB = $conn->query($sql);

          // Costruisco un nuovo array con la differenza simmetrica dei due insiemi
          $diff_A = array_diff($A_items, $B_items);
          $diff_B = array_diff($B_items, $A_items);
          $s_difference = array_merge($diff_A, $diff_B);

          // Ricerco l'id massimo
          $sql = "SELECT MAX(insieme) AS maxid FROM insiemi";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nextId = $row["maxid"] + 1;

            // Inserisco il nuovo insieme nel db,
            // facendo attenzione all'uso di prepared statement e supponendo che l'id sia
            // generato in maniera automatica e progressiva
            $stmt = $conn->prepare("INSERT INTO insiemi (valore, insieme) VALUES (?, ?)");
            $stmt->bind_param("ii", $valore, $insieme);
            foreach ($s_difference as $value) {
              $valore = $value;
              $insieme = $nextId;
              $stmt->execute();
            }
            $stmt->close();
          }
        }/*
      }

      // Chiudo la connessione
      $conn->close();
  }
?>
