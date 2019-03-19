<?php

// Complete the viralAdvertising function below.
function viralAdvertising($n)
{
    $liked = $sum = 2;
    for ($i = 2; $i <= $n; $i++) {
        $liked = floor(($liked * 3) / 2);
        $sum += $liked;
    }
    return $sum;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

$result = viralAdvertising($n);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
