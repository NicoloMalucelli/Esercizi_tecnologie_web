<?php
$cookie_name = "id_manifestazioni";
if(!isset($_COOKIE[$cookie_name])) {
    $array_id = [];
} else {
	$array_id = explode("-",$_COOKIE[$cookie_name]);
	if($array_id == NULL)
	{
		$array_id = [];
	}
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventi";

$conn = new mysqli ($servername, $username, $password, $dbname) or die("Errore connessione: " . $conn->connect_error);
$sql = "SELECT * FROM manifestazioni";
$res = $conn->query($sql);
$rows = [];
if($res->num_rows > 0){
	while($row = $res->fetch_assoc()) {
		$rows[] = $row;
		if(!in_array($row["id"], $array_id))
		{
			$array_id[] = $row["id"];
		}
	}
}

$string_id = implode("-", $array_id);
setcookie($cookie_name, $string_id, time() + (60 * 60 * 24 * 2), "/");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manifestazioni</title>
	<meta charset="UTF-8">
</head>
<body>
	<section>
		<h1>Manifestazioni</h1>

<?php
	if($res->num_rows > 0){
?>
		<table>
			<tr>
				<th>Id</th>
				<th>Titolo</th>
				<th>Descrizione</th>
				<th>Inizio</th>
				<th>Fine</th>
				<th>Luogo</th>
				<th>Citt&agrave;</th>
			</tr>
<?php
	    for($i = 0; $i < count($rows); $i++){
			echo '<tr>';
			echo '	<td>'.$rows[$i]["id"].'</td>';
			echo '	<td>'.$rows[$i]["titolo"].'</td>';
			echo '	<td>'.$rows[$i]["descrizione"].'</td>';
			$date=date_create($rows[$i]["datainizio"]);
			echo '	<td>'.date_format($date,"d/m/Y").'</td>';
			$date=date_create($rows[$i]["datafine"]);
			echo '	<td>'.date_format($date,"d/m/Y").'</td>';
			echo '	<td>'.$rows[$i]["luogo"].'</td>';
			echo '	<td>'.$rows[$i]["citta"].'</td>';
			echo '</tr>';
		}		
?>
		</table>
<?php

	} else {
		echo "<p>Nessuna manifestazione in programma</p>";
	}

	$conn->close();
?>
	</section>
</body>
</html>
