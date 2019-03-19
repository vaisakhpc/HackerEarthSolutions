<?php

/*
 * Complete the getMoneySpent function below.
 */
function getMoneySpent($keyboards, $drives, $b)
{
    $minDiff = '';
    for ($i = 0; $i < count($keyboards); $i++) {
        if ($minDiff !== 0) {
            for ($j = 0; $j < count($drives); $j++) {
                if ($keyboards[$i] + $drives[$j] < $b) {
                    $diff = $b - ($keyboards[$i] + $drives[$j]);
                    if (!$minDiff || ($diff < $minDiff)) {
                        $minDiff = $diff;
                    }
                } elseif ($keyboards[$i] + $drives[$j] == $b) {
                    $minDiff = 0;
                    break;
                }
            }
        }
    }

    return ($minDiff !== '') ? $b - $minDiff : -1;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $bnm_temp);
$bnm = explode(' ', $bnm_temp);

$b = intval($bnm[0]);

$n = intval($bnm[1]);

$m = intval($bnm[2]);

fscanf($stdin, "%[^\n]", $keyboards_temp);

$keyboards = array_map('intval', preg_split('/ /', $keyboards_temp, -1, PREG_SPLIT_NO_EMPTY));

fscanf($stdin, "%[^\n]", $drives_temp);

$drives = array_map('intval', preg_split('/ /', $drives_temp, -1, PREG_SPLIT_NO_EMPTY));

/*
 * The maximum amount of money she can spend on a keyboard and USB drive, or -1 if she can't purchase both items
 */

$moneySpent = getMoneySpent($keyboards, $drives, $b);

fwrite($fptr, $moneySpent . "\n");

fclose($stdin);
fclose($fptr);
