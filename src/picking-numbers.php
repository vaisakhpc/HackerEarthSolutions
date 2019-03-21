<?php

/*
 * Complete the 'pickingNumbers' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function pickingNumbers($a)
{
    sort($a);
    $counts = [];
    for ($i = 0; $i < count($a); $i++) {
        $count = 1;
        for ($j = $i + 1; $j < count($a); $j++) {
            if ($a[$j] <= $a[$i] + 1) {
                $count++;
            } else {
                break;
            }
        }
        $counts[] = $count;
    }
    return max($counts);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$a_temp = rtrim(fgets(STDIN));

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = pickingNumbers($a);

fwrite($fptr, $result . "\n");

fclose($fptr);
