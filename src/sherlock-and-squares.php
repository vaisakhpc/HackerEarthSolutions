<?php

// Complete the squares function below.
function squares($a, $b)
{
    $i = $a;
    $count = 0;
    $firstSquare = 0;
    $firstRoot = 0;
    while ($i <= $b) {
        $sqrt = sqrt($i);
        if ((int) $sqrt == $sqrt) {
            $firstRoot = sqrt($i);
            $firstSquare = $i;
            break;
        }
        $i++;
    }

    if ($firstSquare && $firstRoot) {
        while ($firstSquare <= $b) {
            $count++;
            $firstSquare += ((2 * ($firstRoot)) + 1);
            $firstRoot++;
        }
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $q);

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    fscanf($stdin, "%[^\n]", $ab_temp);
    $ab = explode(' ', $ab_temp);

    $a = intval($ab[0]);

    $b = intval($ab[1]);

    $result = squares($a, $b);

    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);
