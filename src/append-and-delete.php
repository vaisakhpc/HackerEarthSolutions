<?php

// Complete the appendAndDelete function below.
function appendAndDelete($s, $t, $k)
{
    $count = 0;
    while (isset($s[$count]) && isset($t[$count]) && ($s[$count] === $t[$count])) {
        $count++;
    }
    $min = (strlen($s) - $count) + (strlen($t) - $count);
    if (abs(strlen($s) - strlen($t)) % 2 === 1 && $k % 2 === 0) {
        return "No";
    } elseif ($min <= $k) {
        return "Yes";
    } else {
        return "No";
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$s = '';
fscanf($stdin, "%[^\n]", $s);

$t = '';
fscanf($stdin, "%[^\n]", $t);

fscanf($stdin, "%d\n", $k);

$result = appendAndDelete($s, $t, $k);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
