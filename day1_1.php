<?php
  
$file = fopen("input1_1.txt", "r");

if ($file) {
    $total = 0;
    while (($line = fgets($file)) !== false) {
        $str = preg_replace('/[A-Za-z]*/', '', $line);
        // echo $str."\n";
        $l = strlen(trim($str));
        // if ($str !== "" && strlen($str) > 0) {
        //     echo $str[strlen($str) - 1];
        // }

        if(strlen($str) == 1){
            $n =(int)($str . $str);
            // echo $n;
            $total += $n;
        }else {
            // echo $l."\n";
            $n = (int) ($str[0] . $str[$l-1]);
            // echo $n;
            $total += $n;
        }
    }
    echo $total;
    echo "\n";
    fclose($file);
}

?>
