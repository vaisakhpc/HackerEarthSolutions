<?php

// Complete the jumpingOnClouds function below.
function jumpingOnClouds($c)
{
    $position = 0;
    $jumps = 0;
    while ($position < count($c) - 1) {
        if ($c[$position + 2]) {
            $position += 1;
        } else {
            $position += 2;
        }
        $jumps++;
    }
    return $jumps;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $c_temp);

$c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = jumpingOnClouds($c);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
