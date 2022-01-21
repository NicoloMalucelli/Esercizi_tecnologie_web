<?php

function controlloTipo($codice){
	$controllo = substr($codice,0,2);
	$result = -1;
    if($controllo >= 51 && $controllo <= 55 && strlen($codice) == 16){
      $result = "Mastercard";
    }
    if($codice[0] == "4" && (strlen($codice) == 13 || strlen($codice) == 16)){
      $result = "Visa";
    }
    if(($controllo == "34" || $controllo == "37") && strlen($codice) == 15){
      $result = "Amex";
    }
    return $result;
}

function luhn($codice){
	$somma = 0;
	for($i = 0; $i< strlen($codice); $i++){
		$cifra = $codice[$i];
		if($i % 2 == 0){
			$cifra *= 2;
			if($cifra > 9){
				$cifra = 1 + ($cifra%10);
			}
		}
		$somma += $cifra;
	}
	if($somma % 10 == 0){
		$result = 0;
	}
	else{
		$result = 10-($somma%10);
	}
	return $result;
}



if(!isset($_GET["carta"]) || $_GET["carta"] == "" || !is_numeric($_GET["carta"])){
	$risultato = 1;
	$messaggio = "Dati non caricati correttamente";
}
else{
	$carta = $_GET["carta"];
	$tipo = controlloTipo($carta);
	if($tipo == -1)
	{
		$risultato = 1;
		$messaggio = "Carta non riconosciuta";
	}
	else{
		$luhnResult = luhn($carta);
		if($luhnResult == 0){
			$risultato = 0;
			$messaggio = $tipo;
		}
		else{
			$risultato = 1;
			$messaggio = "Numero di carta non valido. Codice di controllo $luhnResult";
		}
	}
}
echo json_encode([
	"risultato" => $risultato,
	"messaggio" => $messaggio
	]);

 ?>
