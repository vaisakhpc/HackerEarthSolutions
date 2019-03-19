<?php

/*
 * Complete the getTotalX function below.
 */
function getTotalX($a, $b)
{
    sort($a);
    sort($b);
    $count = 0;
    for ($i = $a[count($a) - 1]; $i <= $b[0]; $i++) {
        $subCount = 0;
        for ($j = 0; $j < count($a); $j++) {
            if ($i % $a[$j] != 0) {
                break;
            } else {
                $subCount++;
            }
        }
        if ($subCount != count($a)) {
            continue;
        }
        $subCount = 0;
        for ($k = 0; $k < count($b); $k++) {
            if ($b[$k] % $i != 0) {
                break;
            } else {
                $subCount++;
            }
        }
        if ($subCount != count($b)) {
            continue;
        }
        $count++;
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$__fp = fopen("php://stdin", "r");

fscanf($__fp, "%[^\n]", $nm_temp);
$nm = explode(' ', $nm_temp);

$n = intval($nm[0]);

$m = intval($nm[1]);

fscanf($__fp, "%[^\n]", $a_temp);

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

fscanf($__fp, "%[^\n]", $b_temp);

$b = array_map('intval', preg_split('/ /', $b_temp, -1, PREG_SPLIT_NO_EMPTY));

$total = getTotalX($a, $b);

fwrite($fptr, $total . "\n");

fclose($__fp);
fclose($fptr);
