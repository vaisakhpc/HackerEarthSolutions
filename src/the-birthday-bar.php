<?php

// Complete the birthday function below.
function birthday($s, $d, $m)
{
    $count = 0;
    $size = count($s);
    for ($i = 0; $i <= $size - $m; $i++) {
        $sum = 0;
        for ($j = $i; $j < $i + $m; $j++) {
            $sum += $s[$j];
        }
        if ($sum === $d) {
            $count++;
        }
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$s_temp = rtrim(fgets(STDIN));

$s = array_map('intval', preg_split('/ /', $s_temp, -1, PREG_SPLIT_NO_EMPTY));

$dm = explode(' ', rtrim(fgets(STDIN)));

$d = intval($dm[0]);

$m = intval($dm[1]);

$result = birthday($s, $d, $m);

fwrite($fptr, $result . "\n");

fclose($fptr);
