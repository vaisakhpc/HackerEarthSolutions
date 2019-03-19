<?php

// Complete the cutTheSticks function below.
function cutTheSticks($arr)
{
    sort($arr);
    $i = 0;
    $tCount = count($arr);
    $cuts = [$tCount];
    while ($i < $tCount) {
        $nextI = 1;
        for ($j = $i + 1; $j <= $tCount; $j++) {
            if (isset($arr[$j]) && isset($arr[$i])) {
                if ($arr[$i] === $arr[$j]) {
                    unset($arr[$j]);
                    $nextI++;
                } else {
                    $arr[$j] = $arr[$j] - $arr[$i];
                }
            }
        }
        unset($arr[$i]);
        if (count($arr)) {
            $cuts[] = count($arr);
        }
        $i = $i + $nextI;
    }
    return $cuts;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = cutTheSticks($arr);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($stdin);
fclose($fptr);
