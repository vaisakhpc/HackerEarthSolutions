<?php

// Complete the hourglassSum function below.
function hourglassSum($arr)
{
    $length = count($arr);
    for ($i = 0; $i < $length - 2; $i++) {
        for ($j = 0; $j < $length - 2; $j++) {
            $sum = 0;
            for ($k = $j; $k <= $j + 2; $k++) {
                if ($k == $j + 1) {
                    $sum += $arr[$i + 1][$k];
                }
                $sum += $arr[$i][$k] + $arr[$i + 2][$k];
            }
            if (!isset($maximum)) {
                $maximum = $sum;
            } else if ($maximum < $sum) {
                $maximum = $sum;
            }
        }
    }
    return $maximum;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$arr = array();

for ($i = 0; $i < 6; $i++) {
    fscanf($stdin, "%[^\n]", $arr_temp);
    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = hourglassSum($arr);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
