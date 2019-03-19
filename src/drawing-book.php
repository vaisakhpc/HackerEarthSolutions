<?php

/*
 * Complete the pageCount function below.
 */
function pageCount($n, $p)
{
    $frontCount = $backCount = 0;
    $jStart = ($n % 2 === 0) ? $n - 1 : $n - 2;
    for ($i = 1, $j = $jStart; ($i < $n && $j > 0); $i = $i + 2, $j = $j - 2) {
        if ($i == 2) {
            $i--;
        }
        if ($i < $p) {
            $frontCount++;
        }
        if ($j >= $p) {
            $backCount++;
        }
    }
    return min($frontCount, $backCount);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%d\n", $p);

$result = pageCount($n, $p);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
