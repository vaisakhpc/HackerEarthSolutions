<?php

// Complete the climbingLeaderboard function below.
function climbingLeaderboard($scores, $alice)
{
    $ranks = [];
    $jStart = 0;
    $currentRank = count(array_unique($scores)) + 1;
    $scores = array_reverse($scores);
    for ($i = 0; $i < count($alice); $i++) {
        $lastCompared = '';
        for ($j = $jStart; $j < count($scores); $j++) {
            if ($scores[$j] <= $alice[$i] && ($scores[$j] != $lastCompared)) {
                if ($currentRank > 1) {
                    $currentRank--;
                }
                $lastCompared = $scores[$j];
            } elseif ($scores[$j] > $alice[$i]) {
                $jStart = $j;
                break;
            }
        }
        $ranks[] = $currentRank;
    }

    return $ranks;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $scores_count);

fscanf($stdin, "%[^\n]", $scores_temp);

$scores = array_map('intval', preg_split('/ /', $scores_temp, -1, PREG_SPLIT_NO_EMPTY));

fscanf($stdin, "%d\n", $alice_count);

fscanf($stdin, "%[^\n]", $alice_temp);

$alice = array_map('intval', preg_split('/ /', $alice_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = climbingLeaderboard($scores, $alice);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($stdin);
fclose($fptr);
