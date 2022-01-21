<?php


if (isset($_POST['email']) && isset($_POST['password']) && strlen($_POST['email']) >= 6 && strlen($_POST['password']) >= 6) {
	$email = $_POST['email'];
	$pw = $_POST['password'];
	$pw_array = str_split($_POST['password']);
	
	$key = array();
	for ($i=0; $i < strlen($pw); $i++) {
		$idSel = rand()%3;
		if ($pw_array[$i] == "A" || $pw_array[$i] == "a" ) {
			$arr = ["+","t","5"];
			$pw_array[$i] = $arr[$idSel];
			$key[] = $idSel;
		}else if ($pw_array[$i] == "E" || $pw_array[$i] == "e" ) {
			$arr = ["y","p","3"];
			$pw_array[$i] = $arr[$idSel];
			$key[] = $idSel;
		}else if ($pw_array[$i] == "I" || $pw_array[$i] == "i" ) {
			$arr = ["o","0","*"];
			$pw_array[$i] = $arr[$idSel];
			$key[] = $idSel;
		}else if ($pw_array[$i] == "O" || $pw_array[$i] == "o" ) {
			$arr = ["a","f","-"];
			$pw_array[$i] = $arr[$idSel];
			$key[] = $idSel;
		}else if ($pw_array[$i] == "U" || $pw_array[$i] == "u" ) {
			$arr = ["b","e","4"];
			$pw_array[$i] = $arr[$idSel];
			$key[] = $idSel;
		} 
	}
 	
	echo "Nome: $email, password: ". implode("",$pw_array) . ", chiave:  [" . implode(", ",$key) . "]";
} else {
	echo "valori inseriti per email e/o password non validi";
}

 ?>
