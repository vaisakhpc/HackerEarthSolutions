<?php

// Complete the jumpingOnClouds function below.
function jumpingOnClouds($c, $k)
{
    $i = $k;
    $energy = 100;
    while ($i != 0) {
        if (isset($c[$i])) {
            $energy--;
            if ($c[$i] == 1) {
                $energy -= 2;
            }
        }
        $i = ($i + $k) % count($c);
    }
    return $c[0] ? $energy - 3 : $energy - 1;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nk_temp);
$nk = explode(' ', $nk_temp);

$n = intval($nk[0]);

$k = intval($nk[1]);

fscanf($stdin, "%[^\n]", $c_temp);

$c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = jumpingOnClouds($c, $k);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
