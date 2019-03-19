<?php

// Complete the extraLongFactorials function below.
function extraLongFactorials($n)
{
    $result = $n;
    for ($i = $n - 1; $i >= 1; $i--) {
        $result = bcmul($result, $n - $i);
    }
    echo $result;
}

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

extraLongFactorials($n);

fclose($stdin);
