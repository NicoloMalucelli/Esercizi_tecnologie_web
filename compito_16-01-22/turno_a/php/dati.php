<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "db";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$prod = $_POST['prodotto'];
$num = $_POST['numero'];

if(isset($prod) && !empty($prod) && isset($num) && !empty($num) && is_numeric($num))
{
	$sql = "SELECT * FROM Magazzino WHERE Nome_prodotto=\".$prod.\"";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		if($row['N_prodotti'] >= $num)
		{
			echo "Ordine concluso: prodotto ".$prod." quantita' ".$num;
		}
		else
		{
			echo "Quantita' non disponibile";
		}
	}
	else{
		echo "Prodotto non disponibile";
	}
}
else
{
	echo "ERRORE! I Campi non sono stati compilati correttamente";
}
?>