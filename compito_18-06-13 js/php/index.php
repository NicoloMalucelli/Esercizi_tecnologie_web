<?php

  // Ottengo le variabili inviate tramite GET
  $A = $_GET['A'];
  $B = $_GET['B'];

  // Dichiaro due vettori associati agli insiemi
  $A_items = array();
  $B_items = array();

  // Verifico la correttezza delle variabili
  if (isset($A) && isset($B) &&
    is_numeric($A) && is_numeric($B) &&
    $A > 0 && $B > 0) {

      // Parametri per la connessione al database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "giugno";

      // Creo la connessione
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Verifico l'esito della connessione
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Verifico che vi siano numeri appartenenti all'insieme A
      $sql = "SELECT * FROM insiemi WHERE insieme=\"" . $A . "\"";
      $resultA = $conn->query($sql);
      if ($resultA->num_rows > 0) {
        // Verifico che vi siano numeri appartenenti all'insieme B
        $sql = "SELECT * FROM insiemi WHERE insieme=\"" . $B . "\"";
        $resultB = $conn->query($sql);
        if ($resultB->num_rows > 0) {
          // Inserisco i numeri appartenti all'insieme A in un vettore
          while($row = $resultA->fetch_assoc()) {
            array_push($A_items, $row["valore"]);
          }
          // Inserisco i numeri appartenti all'insieme B in un altro vettore
          while($row = $resultB->fetch_assoc()) {
            array_push($B_items, $row["valore"]);
          }

          // Costruisco un nuovo array con l'intersezione dei due insiemi
          $complement = array_diff($B_items, $A_items);
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
            foreach ($complement as $value) {
              $valore = $value;
              $insieme = $nextId;
              $stmt->execute();
            }
            $stmt->close();
          }
        }
      }
      // print dell'array JSON array encodato
      echo json_encode($complement);
      // Chiudo la connessione
      $conn->close();
  }
?>
