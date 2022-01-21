<?php
$nome = $_GET["nome"];
$pw = $_GET["pw"];

strtolower($pw);

$a = array("+","t","5");
$e = array("y","p","3");
$i2 = array("o","0","*");
$o = array("a","f","-");
$u = array("b","e","4");

$key = array();

if (strlen($nome) >= strlen($pw) && strlen($pw) >= 5) {
	echo("ok");
} else {
	echo("Valori inseriti nel form non validi");
}

$newStr = str_split($pw);
echo "stampa " . count($newStr);
for ($i = 0; $i < count($newStr); $i++){
	$rand = rand(0,2);
	switch($newStr[$i]){
		case "a":
			$newStr[$i] = $a[$rand];
			array_push($key, $rand);
			break;
		case "e":
			$newStr[$i] = $e[$rand];
			array_push($key, $rand);
			break;
		case "i":
			$newStr[$i] = $i2[$rand];
			array_push($key, $rand);
			break;
		case "o":
			$newStr[$i] = $o[$rand];
			array_push($key, $rand);
			break;
		case "u":
			$newStr[$i] = $u[$rand];
			array_push($key, $rand);
			break;
	}
}
$pw = implode($newStr);

echo "Nome: " . $nome . ", password: " . $pw . ", Chiave: " . $key . ".";



?>
