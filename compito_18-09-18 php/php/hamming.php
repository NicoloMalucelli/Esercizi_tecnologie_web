class Hamming{

  public function isValid($string1, $string2){
         if (is_string($string1) === true && is_string($string2) === true && strlen($string1) === strlen($string2)) {
             return true;
         } else {
            return false;
         }
     }

  public function weight($string1, $string2){
         $res = array_diff_assoc(str_split($string1), str_split($string2));
         return count($res);
  }

  public function distance($string1, $string2){
      $a = str_split($string1);
      $b = str_split($string2);
      $ret = [];

      for($i=0; $i<strlen($string1); $i++){
          if($a[$i] === $b[$i]){$ret[$i]=0}
          else{$ret[$i]=1}
      }

     return implode("",$ret);
  }

}
