<?php

// Complete the migratoryBirds function below.
function migratoryBirds($arr)
{
    $countArray = [];
    for ($i = 5; $i >= 1; $i--) {
        $countArray[$i] = 0;
    }
    for ($i = 0; $i < count($arr); $i++) {
        $countArray[$arr[$i]]++;
    }

    $max = 5;
    for ($i = 5; $i >= 1; $i--) {
        if ($countArray[$max] <= $countArray[$i]) {
            $max = $i;
        }
    }
    return $max;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$arr_count = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = migratoryBirds($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
