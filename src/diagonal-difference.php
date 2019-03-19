<?php

// Complete the diagonalDifference function below.
function diagonalDifference($arr)
{
    $size = count($arr);
    $rightSum = $leftSum = 0;
    for ($i = 0; $i < $size; $i++) {
        $rightSum += $arr[$i][$i];
        $leftSum += $arr[$i][$size - ($i + 1)];
    }
    return abs($leftSum - $rightSum);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

$arr = array();

for ($i = 0; $i < $n; $i++) {
    fscanf($stdin, "%[^\n]", $arr_temp);
    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = diagonalDifference($arr);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
