<?php

if(isset($_POST["cruise"])){
  array_push($_SESSION["post"], $_POST["cruise"]);
}

if(isset($_POST["portatutto"])){
  array_push($_SESSION["post"], $_POST["portatutto"]);
}

if(isset($_POST["bluetooth"])){
  array_push($_SESSION["post"], $_POST["bluetooth"]);
}

if(isset($_POST["allarme"])){
  array_push($_SESSION["post"], $_POST["allarme"]);
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
       <h2>Visualizza la tua scelta in formato JSON</h2>
       <?php foreach($_SESSION["post"] as $el):?>
        <p><?php echo $el?></p>
       <?php endforeach; ?>
	 </div>
   </div>
 </body>
</html>
