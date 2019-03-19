<?php

// Complete the kangaroo function below.
function kangaroo($x1, $v1, $x2, $v2)
{
    $sum1 = $sum2 = 0;
    for ($i = 0; $i < 10000; $i++) {
        $sum1 = $x1 + $v1;
        $sum2 = $x2 + $v2;
        if ($sum1 === $sum2) {
            return "YES";
        }
        $x1 = $sum1;
        $x2 = $sum2;
    }

    return "NO";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $x1V1X2V2_temp);
$x1V1X2V2 = explode(' ', $x1V1X2V2_temp);

$x1 = intval($x1V1X2V2[0]);

$v1 = intval($x1V1X2V2[1]);

$x2 = intval($x1V1X2V2[2]);

$v2 = intval($x1V1X2V2[3]);

$result = kangaroo($x1, $v1, $x2, $v2);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
