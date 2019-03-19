<?php

// Complete the circularArrayRotation function below.
function circularArrayRotation($a, $k, $queries)
{
    $newArray = [];
    $newValues = [];

    for ($i = 0; $i < count($a); $i++) {
        $newArray[($i + $k) % count($a)] = $a[$i];
    }
    for ($j = 0; $j < count($queries); $j++) {
        $newValues[] = $newArray[$queries[$j]];
    }

    return $newValues;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nkq_temp);
$nkq = explode(' ', $nkq_temp);

$n = intval($nkq[0]);

$k = intval($nkq[1]);

$q = intval($nkq[2]);

fscanf($stdin, "%[^\n]", $a_temp);

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$queries = array();

for ($i = 0; $i < $q; $i++) {
    fscanf($stdin, "%d\n", $queries_item);
    $queries[] = $queries_item;
}

$result = circularArrayRotation($a, $k, $queries);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($stdin);
fclose($fptr);
