<?php

// Complete the formingMagicSquare function below.
function formingMagicSquare($s)
{
    $totals = [];
    // Set of all available magic squares
    $magicSquareCollection = [
        [[8, 1, 6], [3, 5, 7], [4, 9, 2]],
        [[6, 1, 8], [7, 5, 3], [2, 9, 4]],
        [[4, 9, 2], [3, 5, 7], [8, 1, 6]],
        [[2, 9, 4], [7, 5, 3], [6, 1, 8]],
        [[8, 3, 4], [1, 5, 9], [6, 7, 2]],
        [[4, 3, 8], [9, 5, 1], [2, 7, 6]],
        [[6, 7, 2], [1, 5, 9], [8, 3, 4]],
        [[2, 7, 6], [9, 5, 1], [4, 3, 8]],
    ];
    foreach ($magicSquareCollection as $magicSquare) {
        $total = 0;
        for ($i = 0; $i < count($magicSquare); $i++) {
            for ($j = 0; $j < count($magicSquare[$i]); $j++) {
                if ($magicSquare[$i][$j] !== $s[$i][$j]) {
                    $total += abs($magicSquare[$i][$j] - $s[$i][$j]);
                }
            }
        }
        $totals[] = $total;
    }

    return min($totals);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$s = array();

for ($i = 0; $i < 3; $i++) {
    fscanf($stdin, "%[^\n]", $s_temp);
    $s[] = array_map('intval', preg_split('/ /', $s_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = formingMagicSquare($s);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
