<?php

// Complete the permutationEquation function below.
function permutationEquation($p)
{
    $values = [];
    for ($i = 1; $i <= count($p); $i++) {
        echo $firstKey = array_search($i, $p) + 1;
        if (($resultKey = arraySearchForElement($firstKey, $p)) !== false) {
            $values[] = $resultKey + 1;
        }
    }
    return $values;
}

function arraySearchForElement($element, $array)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $element) {
            return $i;
            break;
        }
    }
    return false;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $p_temp);

$p = array_map('intval', preg_split('/ /', $p_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = permutationEquation($p);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($stdin);
fclose($fptr);
