<?php

// Complete the countSwaps function below.
function countSwaps($a)
{
    $countSwap = 0;
    $size = count($a);
    for ($i = 0; $i < $size; $i++) {
        for ($j = $i + 1; $j < $size; $j++) {
            if ($a[$i] > $a[$j]) {
                $temp = $a[$j];
                $a[$j] = $a[$i];
                $a[$i] = $temp;
                $countSwap++;
            }
        }
    }

    echo "Array is sorted in $countSwap swaps." . "\n";
    echo "First Element: " . $a[0] . "\n";
    echo "Last Element: " . $a[$size - 1] . "\n";
}

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $a_temp);

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

countSwaps($a);

fclose($stdin);
