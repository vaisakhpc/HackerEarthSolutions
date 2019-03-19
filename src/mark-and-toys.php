<?php

// Complete the maximumToys function below.
function maximumToys(array $prices, int $k): int
{
    $sortedArray = quickSort($prices, 0, count($prices) - 1);
    $sum = $count = 0;
    foreach ($sortedArray as $key => $value) {
        $sum += $value;
        if ($sum > $k) {
            break;
        } else {
            $count++;
        }
    }

    return $count;
}

function doPartition(array &$array, int $low, int $high): int
{
    $pivotElement = $array[$high];
    $i = $low - 1;
    for ($j = $low; $j <= $high - 1; $j++) {
        if ($array[$j] <= $pivotElement) {
            $i++;
            $temp = $array[$j];
            $array[$j] = $array[$i];
            $array[$i] = $temp;
        }
    }

    $i++;
    $array[$high] = $array[$i];
    $array[$i] = $pivotElement;
    return $i;
}

function quickSort(array &$array, int $low, int $high): array
{
    if ($low < $high) {
        $pi = doPartition($array, $low, $high);
        quickSort($array, $low, $pi - 1);
        quickSort($array, $pi + 1, $high);
    }

    return $array;
}
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nk_temp);
$nk = explode(' ', $nk_temp);

$n = intval($nk[0]);

$k = intval($nk[1]);

fscanf($stdin, "%[^\n]", $prices_temp);

$prices = array_map('intval', preg_split('/ /', $prices_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = maximumToys($prices, $k);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
