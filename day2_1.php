<?php

$file = fopen("input2_1.txt", "r");

if ($file) {
    $total = 0;
    $balls = array("red" => 12, "green" => 13, "blue" => 14);
    while (($line = fgets($file)) !== false) {
        $pattern = '/Game\s*(\d+):(.*)/';
        if (preg_match($pattern, $line, $matches)) {
            $gameId = (int) $matches[1]; 
            $gameStr = $matches[2]; 

            // echo $gameId . " " . $gameStr . "\n";

            $flag = true;
            $games = explode(';', $gameStr);
            foreach ($games as $game) {
                $eachGameArray = explode(',', $game);
                foreach ($eachGameArray as $g) {
                    $pat = '/(\d+)\s*([a-z]+)/';
                    if (preg_match($pat, $g, $mat)) {
                        $digit = (int) $mat[1]; 
                        $color = trim($mat[2]);

                        // echo $digit . " " . $color . "\n";

                        if ($digit > $balls[$color]) {
                            $flag = false;
                            break;
                        }
                    }
                }
                if ($flag == false) {
                    break;
                }
            }
            if ($flag == true) {
                $total += $gameId;
            }
        }
    }
    echo $total . "\n";
    fclose($file);
}

?>
