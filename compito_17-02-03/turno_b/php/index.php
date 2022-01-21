<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "matematica";


$sequenza = $_GET['sequenza'];

$conn = new mysqli ($servername, $username, $password, $dbname) or die("Errore connessione: " . $conn->connect_error);
$sql = "SELECT * FROM numeri WHERE sequenza = $sequenza";
$res = $conn->query($sql);
$numeri = [];
$risultato = 0;
if($res->num_rows > 0){
	while($row = $res->fetch_assoc()) {
		$numeri[$row['ordine']] = $row['numero'];
	}
	
	if($numeri[0] != 0 || $numeri[1] != 1)
	{
		$risultato = 1;
	}

	for($i = 2; $i < count($numeri) && $risultato == 0; $i++)
	{
		if(2 * $i < count($numeri))
		{
			if($numeri[$i] != $numeri[2 *$i])
			{
				$risultato = 1;
			}
		}
		
		if(2 * $i + 1 < count($numeri))
		{
			if($numeri[$i] + $numeri[$i+1] != $numeri[2 *$i + 1])
			{
				$risultato = 1;
			}
		}
		
	}


}

$result['risultato'] = $risultato;
$result['sequenza'] = $numeri;

echo json_encode($result);



?>