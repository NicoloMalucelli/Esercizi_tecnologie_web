<?php
function trovaSottoinsiemi($elementi) { 
	$numero_elementi = count($elementi); 
	$numero_sottoinsiemi = pow(2,$numero_elementi); 
	$sottoinsiemi = array(); 
	for ($i = 1; $i < $numero_sottoinsiemi; $i++) { 
		$binario = sprintf("%0".$numero_elementi."b",$i); 
		$sottoinsieme = array(); 
		for ($j = 0; $j < $numero_elementi; $j++) { 
			if ($binario{$j} == '1') 
				$sottoinsieme[] = $elementi[$j]; 
		} 
		$sottoinsiemi[] = $sottoinsieme; 
   } 
   return $sottoinsiemi; 
} 


function trovaRicette($ricette, $ingredienti){
	$ricette_trovate = array();
	foreach ($ricette as $ricetta => $ingredienti_ricetta) {
		$ingredienti_contenuti = true;
		for($i = 0; $i < count($ingredienti); $i++)
		{
			if(array_search($ingredienti[$i], $ingredienti_ricetta) === FALSE) 
			{
				$ingredienti_contenuti = false;
			}
		}
		if($ingredienti_contenuti)
		{
			$ingredienti_mancanti = array();
			for($i = 0; $i < count($ingredienti_ricetta); $i++)
			{
				if(array_search($ingredienti_ricetta[$i], $ingredienti) === FALSE) 
				{
					$ingredienti_mancanti[] = $ingredienti_ricetta[$i];
				}
			}			
			$ricette_trovate[$ricetta] = $ingredienti_mancanti;
		}
	}
	
	return $ricette_trovate;
}

function stampaRicetteConIngredientiMancanti($ingredienti, $ricette)
{
	if(count($ricette) > 0)
	{
		if(count($ingredienti) == 1)
		{
			echo "Con l’ingrediente <b>".$ingredienti[0]."</b> è possibile preparare:<br/>";
		}
		else
		{
			echo "Con gli ingredienti: <b>".$ingredienti[0]."</b>";
			for($i = 1; $i < count($ingredienti)-1; $i++)
			{
				echo ", <b>$ingredienti[$i]</b>";
			}
			
			echo " e <b>".$ingredienti[count($ingredienti)-1]."</b> è possibile preparare:<br/>";
		}
		echo "<ul>";
		foreach($ricette as $ricetta => $ingredienti_mancanti)		{
			echo "<li>";
			echo "$ricetta";
			if(count($ingredienti_mancanti)>0)
			{
				echo " - ingredienti mancanti: ";
				echo "<em>$ingredienti_mancanti[0]</em>";
				for($i = 1; $i < count($ingredienti_mancanti); $i++)
				{
					echo "<em>, $ingredienti_mancanti[$i]</em>";
				}
			}
			echo "</li>";
		}
		echo "</ul>";
	}
}


$pizza_margherita = array("mozzarella", "pomodoro", "farina");
$insalata_caprese = array("pomodoro", "mozzarella");
$pasta_al_ragu = array("pomodoro", "pasta", "ragu");

$ricette = array("pizza margherita" => $pizza_margherita, "caprese" => $insalata_caprese, "pasta al ragu" => $pasta_al_ragu);


if(isset($_POST["ingredienti"]) && !empty($_POST["ingredienti"])) {
	$ingredienti = explode(",",$_POST["ingredienti"]);
	for ($i = 0; $i < count($ingredienti); $i++) {
		$ingredienti[$i] = strtolower(trim($ingredienti[$i]));
	}
	
	$sottoinsiemi_ingredienti = trovaSottoinsiemi($ingredienti);
	
	$ricetta_trovata = false;
	for($i=0; $i < count($sottoinsiemi_ingredienti); $i++)
	{
		$output = trovaRicette($ricette, $sottoinsiemi_ingredienti[$i]);
		stampaRicetteConIngredientiMancanti($sottoinsiemi_ingredienti[$i],$output);
		if(count($output)>0)
		{
			$ricetta_trovata = true;
		}
	}
	if(!$ricetta_trovata)
	{
		echo "L’ingrediente non è presente in nessuna ricetta";
	}
} else {
	echo "<p>Non hai inserito nessun ingrediente!</p>";
}


?>
