<?php

// Complete the countingValleys function below.
function countingValleys($n, $s)
{
    $up = $down = 0;
    $count = 0;
    for ($i = 0; $i <= $n; $i++) {
        if ($i && ($up == $down)) {
            if ($s[$i - 1] === "U") {
                $count++;
            }
            $up = $down = 0;
        }
        if (isset($s[$i])) {
            if ($s[$i] === "U") {
                $up++;
            } else {
                $down++;
            }
        }
    }
    return $count;
}
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

$s = '';
fscanf($stdin, "%[^\n]", $s);

$result = countingValleys($n, $s);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
