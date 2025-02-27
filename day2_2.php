<?php

$file = fopen("input2_2.txt", "r");

if ($file) {
    $total = 0;
    
    while (($line = fgets($file)) !== false) {
        $pattern = '/Game\s*(\d+):(.*)/';
        if (preg_match($pattern, $line, $matches)) {
            $gameId = (int) $matches[1]; 
            $gameStr = $matches[2]; 

            // echo $gameId . " " . $gameStr . "\n";
            $balls = array("red" => 0, "green" => 0, "blue" => 0);
            $games = explode(';', $gameStr);
            foreach ($games as $game) {
                $eachGameArray = explode(',', $game);
                foreach ($eachGameArray as $g) {
                    $pat = '/(\d+)\s*([a-z]+)/';
                    if (preg_match($pat, $g, $mat)) {
                        $digit = (int) $mat[1]; 
                        $color = trim($mat[2]);

                        // echo $digit . " " . $color . "\n";
                        $balls[$color] = max($balls[$color], $digit);
                    }
                }
            }
            $prod = $balls["red"] * $balls["green"] * $balls["blue"];  
            $total += $prod;
        }
    }
    echo $total . "\n";
    fclose($file);
}

?>
