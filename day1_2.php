<?php
  
$file = fopen("input1_2.txt", "r");

function checkDigit($str) {
    $digit = ["zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];

    // Convert input string to lowercase to avoid case sensitivity issues
    $str = strtolower($str);
    foreach ($digit as $index => $word) {
        if (strpos($str, $word) !== false) {  // Use strpos() instead of str_contains()
            return $index;  // Return the first matched digit
        }
    }
    return -1; // Return -1 if no match is found
}

if ($file) {
    $total = 0;
    while (($line = fgets($file)) !== false) {
        // forward
        $strf=""; $strb=""; $sf=""; $sb ="";
        for($i=0; $i<strlen(trim($line)); $i++){
            if(ctype_digit($line[$i])){
                $strf =$line[$i];
                break;
            }
            $sf = $sf . $line[$i];
            $c = checkDigit($sf);
            if($c !== -1){
                $strf = $strf . $c;
                break;
            }
        }

        // backward
        for($i=strlen(trim($line))-1; $i>=0; $i--){
            if(ctype_digit($line[$i])){
                $strb = $line[$i];
                break;
            }
            $sb = $line[$i] . $sb;
            $c = checkDigit($sb);
            if($c !== -1){
                $strb = $strb . $c;
                break;
            }
        }

        echo $strf . $strb . "\n";

        $total += (int) ($strf . $strb);
    }
        echo $total;
        echo "\n";
        fclose($file);
        // backward
}

?>
