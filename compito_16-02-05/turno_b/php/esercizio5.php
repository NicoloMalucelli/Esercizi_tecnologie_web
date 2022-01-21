<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Cibo";

$conn = new mysqli ($servername, $username, $password, $dbname) or die("Errore connessione: " . $conn->connect_error);
$sql = "SELECT * FROM Pizzerie WHERE Luogo ='Bologna'";
$res = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pizzerie a Bologna</title>
	<meta charset="UTF-8">
</head>
<body>
	<h1>Pizzerie a Bologna</h1>
	<section>
<?php
	if($res->num_rows > 0){
	    while($row = $res->fetch_assoc()) {
			echo '<div id="'.$row["Telefono"].'">';
			echo '<h2>'.$row["Nome"].'</h2>';
			echo '<p>Numero tavoli: '.$row["N_Tavoli"].'</p>';
			echo '<p>Tel.: '.$row["Telefono"].'</p>';
			echo '<p>Giorno di chiusura: '.$row["Chiusura"].'</p>';
			echo '</div>';
		}
	} else {
		echo "<p>Nessuna pizzeria trovata</p>";
	}

	$conn->close();
?>
