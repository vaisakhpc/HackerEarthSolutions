<?php

// Complete the sockMerchant function below.
function sockMerchant($n, $ar)
{
    $count = 0;
    $repeatedValue = [];
    for ($i = 0; $i < $n; $i++) {
        $ct = 1;
        if (!in_array($ar[$i], $repeatedValue)) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($ar[$j] === $ar[$i]) {
                    $ct++;
                }
            }
            $count += floor($ct / 2);
            $repeatedValue[] = $ar[$i];
        }
    }

    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $ar_temp);

$ar = array_map('intval', preg_split('/ /', $ar_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = sockMerchant($n, $ar);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
