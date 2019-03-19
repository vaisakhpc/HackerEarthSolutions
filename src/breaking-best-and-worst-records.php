<?php

// Complete the breakingRecords function below.
function breakingRecords($scores)
{
    $min = $max = $scores[0];
    $minCount = $maxCount = 0;
    for ($i = 1; $i < count($scores); $i++) {
        if ($min > $scores[$i]) {
            $min = $scores[$i];
            $minCount++;
        } elseif ($max < $scores[$i]) {
            $max = $scores[$i];
            $maxCount++;
        }
    }

    return [$maxCount, $minCount];
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $scores_temp);

$scores = array_map('intval', preg_split('/ /', $scores_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = breakingRecords($scores);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($stdin);
fclose($fptr);
