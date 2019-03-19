<?php

// Complete the nonDivisibleSubset function below.
function nonDivisibleSubset($k, $s)
{
    $counts = [];
    for ($i = 0; $i < count($s); $i++) {
        if (isset($counts[$s[$i] % $k])) {
            $counts[$s[$i] % $k]++;
        } else {
            $counts[$s[$i] % $k] = 1;
        }
    }

    $total = min($counts[0], 1);
    for ($i = 1; $i < floor($k / 2) + 1; $i++) {
        if ($i != ($k - $i)) {
            $total += max($counts[$i] ?? 0, $counts[$k - $i] ?? 0);
        }
    }
    if ($k % 2 === 0) {
        $total++;
    }
    return $total ? $total : 1;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nk_temp);
$nk = explode(' ', $nk_temp);

$n = intval($nk[0]);

$k = intval($nk[1]);

fscanf($stdin, "%[^\n]", $S_temp);

$S = array_map('intval', preg_split('/ /', $S_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = nonDivisibleSubset($k, $S);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
