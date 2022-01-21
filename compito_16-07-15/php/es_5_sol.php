<!DOCTYPE html>
<html>
<head>
 <title>Esame</title>
 <style>
   table,th,td{
     border: 1px solid;
     border-collapse: collapse;
   }
 </style>
</head>
<body>

  <form action="es_5_sol.php" method="post">
    <fieldset>
    <legend>Testo:</legend>


    <p><label>Testo libero:<br/>
      <textarea name="testo" required="yes" cols="30" rows="10">Qui puoi scrivere il tuo testo.</textarea>
    </label></p>
   <input type="submit"></input>
  </fieldset>
  </form>

<div id="risultati">
  <?php
    if(isset($_POST['testo']) && !empty($_POST['testo'])){
      $parole = explode(" ",$_POST['testo']);
      $frasi = explode(",",$_POST['testo']);
      $paragrafi = explode(".",$_POST['testo']);

      echo "<table>
        <tr>
          <th>
            Testo
          </th>
          <td>
              ".$_POST['testo']. "
          </td>
        </tr>
        <tr>
          <th>
            Numero parole
          </th>
          <td>
            ".count($parole). "
          </td>
        </tr>
        <tr>
          <th>
            Numero frasi
          </th>
          <td>
            ".count($frasi). "
          </td>
        </tr>
        <tr>
          <th>
            Numero paragrafi
          </th>
          <td>
            ".count($paragrafi). "
          </td>
        </tr>
      </table>";

    }
  ?>

</div>

</body>
</html>
