<?php

// Complete the equalizeArray function below.
function equalizeArray($arr)
{
    $counts = [];
    for ($i = 0; $i < count($arr); $i++) {
        if (isset($counts[$arr[$i]])) {
            $counts[$arr[$i]]++;
        } else {
            $counts[$arr[$i]] = 1;
        }
    }
    return count($arr) - max($counts);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = equalizeArray($arr);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
