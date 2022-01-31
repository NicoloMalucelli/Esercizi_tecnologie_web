<?php

if(isset($_POST["modello"]) && isset($_POST["versione"]) && isset($_POST["motore"])  && isset($_POST["colore"])){
    array_push($_SESSION["post"], $_POST["modello"], $_POST["versione"], $_POST["motore"], $_POST["colore"]);
    $_SESSION["error"] = null;
} else {
  $_SESSION["error"] = "errore in pagina 2";
  header("index.php");
}

?>

<!DOCTYPE HTML>
<html>
 <head>
   <title>Scegli la tua nuova automobile</title>
 </head>
 <body>
   <div class="container">
     <div class="main">
       <h2>Optional & accessori</h2><hr/>
       <span id="error">
        <?php if(isset($_SESSION["error"])){ echo $_SESSION["error"]; } ?>
       </span>
       <form action="page4.php" method="post">
         <label>Cruise control:</label><br />
         <input name="cruise" id="cruise" type="checkbox"><br />
         <label>Barre portatutto:</label><br />
         <input name="portatutto" id="portatutto" type="checkbox"><br />
         <label>Radio bluetooth:</label><br />
         <input name="bluetooth" id="bluetooth" type="checkbox"><br />
         <label>Allarme:</label><br />
         <input name="allarme" id="allarme" type="checkbox"><br />
         <input type="reset" value="Reset" />
         <input name="submit" type="submit" value="Submit" />
       </form>
     </div>
   </div>
 </body>
</html>
