<?php

// Complete the acmTeam function below.
function acmTeam($topic) {
    $max = 0;
    $counter = 0;
    for ($i=0;$i<count($topic);$i++) {
        for ($j=$i+1;$j<count($topic);$j++) {
            $tSum = 0;
            for ($k=0;$k<strlen($topic[$i]);$k++) {
                $tSum = ($topic[$i][$k] ||  $topic[$j][$k]) ? $tSum + 1 : $tSum;
            }
            if ($tSum >= $max) {
                if ($tSum > $max) {
                    $counter = 1;
                } else {
                    $counter++;
                }
                $max = $tSum;
            }
        }
    }
    return [$max, $counter];
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nm_temp);
$nm = explode(' ', $nm_temp);

$n = intval($nm[0]);

$m = intval($nm[1]);

$topic = array();

for ($i = 0; $i < $n; $i++) {
    $topic_item = '';
    fscanf($stdin, "%[^\n]", $topic_item);
    $topic[] = $topic_item;
}

$result = acmTeam($topic);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($stdin);
fclose($fptr);