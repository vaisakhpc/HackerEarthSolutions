<?php

// Complete the beautifulDays function below.
function beautifulDays($i, $j, $k)
{
    $bDays = 0;
    while ($i <= $j) {
        $flag = abs($i - strrev($i)) % $k == 0 ? true : false;
        if ($flag) {
            $bDays++;
        }
        $i++;
    }
    return $bDays;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $ijk_temp);
$ijk = explode(' ', $ijk_temp);

$i = intval($ijk[0]);

$j = intval($ijk[1]);

$k = intval($ijk[2]);

$result = beautifulDays($i, $j, $k);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
