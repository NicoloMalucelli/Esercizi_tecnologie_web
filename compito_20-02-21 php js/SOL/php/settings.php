<?php

if(isset($_POST["username"]) && isset($_POST["notizie"]) && isset($_POST["remember"])){
  if($_POST["remember"] == true){
    setcookie("username", $_POST["username"], time() + (60*60), "/");
    setcookie("categoria", $_POST["notizie"], time() + (60*60), "/");
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

    <form action="settings.php" method="post" style="border: 2px dotted blue; text-align:center; width: 400px;">
	   <p>
		     <label for="username">Username </label><input name="username" type="text" value="<?php if(isset($_COOKIE["username"])){ echo $_COOKIE["username"]; } ?>" >
	   </p>
     <p>
       <label for="notizie">Categoria notizie:</label>
       <select name="notizie">
          <option value="">--------</option>
          <option value="politica" <?php if(isset($_COOKIE["categoria"]) && $_COOKIE["categoria"] == "politica"){ echo "selected";}?>>Politica</option>
          <option value="attualità" <?php if(isset($_COOKIE["categoria"]) && $_COOKIE["categoria"] == "attualità"){ echo "selected";}?>>Attualità</option>
          <option value="sport" <?php if(isset($_COOKIE["categoria"]) && $_COOKIE["categoria"] == "sport"){ echo "selected";}?>>Sport</option>
          <option value="scienze" <?php if(isset($_COOKIE["categoria"]) && $_COOKIE["categoria"] == "scienze"){ echo "selected";}?>>Scienze</option>
        </select>
	   </p>
		 <p>
      <input type="checkbox" name="remember" /> Remember me
	   </p>
		<p>
      <input type="submit" value="submit"></input>
    </p>
    </form>

  </body>
</html>
