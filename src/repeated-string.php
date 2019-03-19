<?php

// Complete the repeatedString function below.
function repeatedString($s, $n)
{
    $count = 0;
    $strLen = strlen($s);
    for ($i = 0; $i < $strLen; $i++) {
        if ($s[$i] === "a") {
            $count++;
        }
    }

    $symCount = ($count * floor($n / $strLen));
    $remainingLength = $n % $strLen;
    $remainingCount = 0;

    for ($j = 0; $j < $remainingLength; $j++) {
        if ($s[$j] === "a") {
            $remainingCount++;
        }
    }
    return $symCount + $remainingCount;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$s = '';
fscanf($stdin, "%[^\n]", $s);

fscanf($stdin, "%ld\n", $n);

$result = repeatedString($s, $n);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
