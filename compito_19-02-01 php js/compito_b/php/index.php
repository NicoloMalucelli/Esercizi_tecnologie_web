<?php
  if (isset($_POST['nota']) && !empty($_POST['nota'])) {
    if (isset($_POST['nota']) && $_POST['nota'] === "add") {
      if (isset($_POST['title']) && !empty($_POST['title']) &&
        isset($_POST['date']) && !empty($_POST['date']) &&
        isset($_POST['text']) && !empty($_POST['text'])) {
          $file = fopen(__DIR__ . "/note" . date_timestamp_get(date_create()) . ".txt", "w");
          if ($file != null) {
            fputs($file, $_POST['title'] . "\n\r");
            fputs($file, $_POST['date'] . "\n\r");
            fputs($file, $_POST['text']);
            fflush($file);
            fclose($file);
            echo "Nota salvata con successo";
          } else {
            echo "Non è stato possibile salvare la nota";
          }
        }
    } else if ($_POST['nota'] && $_POST['nota'] === "read") {
      $notes = glob(__DIR__ . "/*.txt");
      if (!empty($notes)) {
        sort($notes);
        foreach ($notes as $note) {
          $title = "";
          $date = "";
          $text = "";
          
          $file = fopen($note, "r");
          fscanf($file, "%s", $title);
          fscanf($file, "%s", $date);
          fscanf($file, "%s", $text);
          fclose($file);

          echo "Titolo: " . $title;
          echo "Data: " . $date;
          echo "Nota: " . $text;
          echo "<br>";
        }
      } else {
        echo "Non sono presenti note nel file system.";
      }
    } else if ($_POST['nota'] && $_POST['nota'] === "delete") {
      $notes = glob(__DIR__ . "/*.txt");
      if (!empty($notes)) {
        sort($notes);
        $length = count($notes);
        $file = fopen($notes[$length - 1], "w");
        fclose($file);
      } else {
        echo "Non sono presenti note nel file system.";
      }
    }
  }
?>

 <!DOCTYPE html>
 <html>
   <head>
     <title>Note</title>
   </head>
   <body>
     <h1>Esercizio PHP</h1>
     <div>
       <form method="post" action="index.php">
         <h2>Prendi nota</h2>
         <section id="noteSection">
          <label for="title">
            Titolo: <input type="text" id="title" name="title">
          </label>
          <label for="title">
            Data: <input type="date" id="date" name="date">
          </label>
          <label for="nota">
            Nota: <input type="text" id="nota" name="text">
          </label>
         </section>
         <section id="control">
           <input type="radio" name="nota" value="add">Aggiungi nota<br>
           <input type="radio" name="nota" value="read">Leggi note<br>
           <input type="radio" name="nota" value="delete">Rimuovi nota<br>
        </section>
        <input type="submit" value="submit">
        </form>
     </div>
   </body>
 </html>
