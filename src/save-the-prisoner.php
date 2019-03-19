<?php

// Complete the saveThePrisoner function below.
function saveThePrisoner($n, $m, $s)
{
    $pos = ((($m % $n) - 1) + $s) % $n;
    return $pos > 0 ? $pos : $n;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%[^\n]", $nms_temp);
    $nms = explode(' ', $nms_temp);

    $n = intval($nms[0]);

    $m = intval($nms[1]);

    $s = intval($nms[2]);

    $result = saveThePrisoner($n, $m, $s);

    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);
