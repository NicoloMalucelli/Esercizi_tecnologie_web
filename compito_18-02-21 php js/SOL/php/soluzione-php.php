<?php

  if(isset($_GET["radioButton"]) && isset($_GET["cella"]) && isset($_GET["numero"])){
    if($_GET["radioButton"] == "inserisci"){
      $cella = $_GET["cella"];
      $cella = explode("/", $cella);

      $val = getValueAt($cella[0], $cella[1]);
      if($val == 0){
        echo "inserimento";
        insertValue($cella[0], $cella[1],  $_GET["numero"]);
        echo "inserimento avvenuto";
      }
    }
    if($_GET["radioButton"] == "mosse"){
      $cella = $_GET["cella"];
      $cella = explode("/", $cella);

      $val = getValueAt($cella[0], $cella[1]);
      if($val == 0){
        foreach(getAvailableValues($cella[0], $cella[1]) as $val){
          echo $val." disponibile; ";
        }
      } else {
        echo "cella non vuota";
      }
    }
  }


  function getValueAt($col, $row){
    $db = new mysqli("localhost", "root", "", "sudoku");
    $stm = $db->prepare("SELECT numeri FROM riga WHERE id = ?");
    $stm->bind_param("i", $row);
    $stm->execute();
    $result = $stm->get_result();
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $stm->close();
    $db->close();
    return explode(", ", $result[0]["numeri"])[$col-1];
  }

  function getRow($row){
    $db = new mysqli("localhost", "root", "", "sudoku");
    $stm = $db->prepare("SELECT numeri FROM riga WHERE id = ?");
    $stm->bind_param("i", $row);
    $stm->execute();
    if($stm == false){
      echo "errore query";
      return;
    }
    $result = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
    $stm->close();
    $db->close();

    $values = array();

    return explode(", ", $result[0]["numeri"]);
  }

  function insertValue($col, $row, $num){

    $values = getRow($row);
    $values[$col-1] = $num;
    $values = implode(", ", $values);

    $db = new mysqli("localhost", "root", "", "sudoku");
    $stm = $db->prepare("UPDATE riga SET numeri = ? WHERE id = ?");
    $stm->bind_param("si", $values, $row);
    $stm->execute();

    $db->close();
  }

  function getGrid(){
    $grid = array();
    for($i = 1; $i <= 9; $i++){
      $grid[$i-1] = getRow($i);
    }
    return $grid;
  }

  function getAvailableValues($col, $row){
    $col-= 1;
    $row -= 1;
    
    return array_diff(range(1, 9), getValueInRow($row), getValueInCol($col), getValueInSection($row, $col));

  }

  function getValueInRow($row){
    $grid = getGrid();
    $alreadyInGrid = array();
    for($i = 0; $i < 9; $i++){
      if($grid[$row][$i] != 0){
        array_push($alreadyInGrid, $grid[$row][$i]);
      }
    }
    return $alreadyInGrid;
  }

  function getValueInCol($col){
    $grid = getGrid();
    $alreadyInGrid = array();
    for($i = 0; $i < 9; $i++){
      if($grid[$i][$col] != 0){
        array_push($alreadyInGrid, $grid[$i][$col]);
      }
    }
    return $alreadyInGrid;
  }

  function getValueInSection($row, $col){
    $sectionRow = (int)($row/3);
    $sectionCol = (int)($col/3);

    $grid = getGrid();
    $alreadyInGrid = array();

    for($i = 0; $i < 3; $i++){
      for($j = 0; $j < 3; $j++){
        $val = $grid[$sectionRow*3 + $i][$sectionCol*3 + $j];
        if($val != 0){
          array_push($alreadyInGrid, $val);
        }
      }
    }
    var_dump($alreadyInGrid);
    return $alreadyInGrid;
  }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Esercizio PHP</title>
</head>
<body>
	<header>
		<h1>Esercizio PHP</h1>
	</header>

  <form action="soluzione-php.php">
  <div>
    <div>
      <input type="radio" id="inserisci"
       name="radioButton" value="inserisci">
      <label for="insesci">inserisci</label>

      <input type="radio" id="mosse"
       name="radioButton" value="mosse">
      <label for="mosse">mosse possibili</label>
    </div>

  <label for="numero">Numero</label>
  <input type="text" name="numero" value="numero">
  <br>
  <label for="cella">Cella (colonna/riga):</label>
  <input type="text" name="cella" value="cella">
  <br>
  <input type="submit" value="Submit">
</div>
</form>
</body>
</html>
