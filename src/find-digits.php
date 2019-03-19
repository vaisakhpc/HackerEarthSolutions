<?php

// Complete the findDigits function below.
function findDigits($n)
{
    $temp = $n;
    $digits = [];
    $divisibleCount = 0;
    for ($i = 0; $i < strlen($n); $i++) {
        $digits[] = $temp % 10;
        $temp = $temp / 10;
    }
    for ($i = 0; $i < count($digits); $i++) {
        if ($digits[$i] && $n % $digits[$i] == 0) {
            $divisibleCount++;
        }
    }
    return $divisibleCount;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%d\n", $n);

    $result = findDigits($n);

    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);
