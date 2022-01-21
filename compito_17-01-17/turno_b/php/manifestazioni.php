<?php
$cookie_name = "id_manifestazioni";
if(!isset($_COOKIE[$cookie_name])) {
    $array_id = [];
} else {
	echo "cookie setted with value ".$_COOKIE[$cookie_name];
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
		<div>
<?php
	    for($i = 0; $i < count($rows); $i++){
			echo '<h2>Titolo: '.$rows[$i]["titolo"].'</h2>';
			echo '<ul>';
			echo '	<li>Id: '.$rows[$i]["id"].'</li>';
			echo '	<li>Descrizione: '.$rows[$i]["descrizione"].'</li>';
			$date=date_create($rows[$i]["datainizio"]);
			echo '	<li>Inizio: '.date_format($date,"d_m_Y").'</li>';
			$date=date_create($rows[$i]["datafine"]);
			echo '	<li>Fine: '.date_format($date,"d_m_Y").'</li>';
			echo '	<li>Luogo: '.$rows[$i]["luogo"].'</li>';
			echo '	<li>Citt&agrave;: '.$rows[$i]["citta"].'</li>';
			echo '</ul>';
		}
?>
		</div>
<?php

	} else {
		echo "<p>Nessuna manifestazione in programma</p>";
	}

	$conn->close();
?>
	</section>
</body>
</html>
