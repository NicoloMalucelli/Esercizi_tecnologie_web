<?php

$fields = array('matricola', 'nome', 'cognome');

foreach ($fields as $field)
{
	if (!isset($_GET[$field]) || empty($_GET[$field]))
	{
		die("Il campo $field non dev'essere vuoto");
	}
}

$db = new mysqli('localhost', 'root', '', 'esametecweb');
$matricola = $db->real_escape_string($_GET['matricola']);
$result = $db->query("SELECT nome, cognome FROM Studenti_registrati WHERE Matricola = $matricola");
if (!$result || $result->num_rows != 1)
{
	die('Studente non registrato');
}

$row = $result->fetch_assoc();
if ($row['nome'] == $_GET['nome'] && $row['cognome'] == $_GET['cognome'])
{
	echo 'Dati corrispondenti a quelli della registrazione';
}
else
{
	echo 'Dati non corrispondenti con quelli memorizzati';
}

?>