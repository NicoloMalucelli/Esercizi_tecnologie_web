<?php
  session_start();
  if(isset($_SESSION["error"])){
    session_destroy();
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
     <h2>Dati personali</h2>
     <span id="error">
        <?php if(isset($_SESSION["error"])){ echo $_SESSION["error"]; } ?>
     </span>
       <form action="page2.php" method="post"><br />
         <label>Nome e Cognome :<span>*</span></label><br />
         <input name="nome" type="text" placeholder="Thomas A. Anderson"><br />
         <label>Email:<span>*</span></label><br />
         <input name="email" type="email" placeholder="neo@matrix.com"><br />
         <label>#Tel:<span>*</span></label><br />
         <input name="contact" type="text" placeholder="10 caratteri numerici"><br />
         <input type="reset" value="Reset" />
         <input type="submit" value="Next" />
       </form>
     </div>
   </div>
 </body>
</html>
