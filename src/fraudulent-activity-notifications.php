<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
list($activity, $limit) = explode(" ", trim(fgets(STDIN)));
$arr = explode(" ", trim(fgets(STDIN)));

$count = 0;
$possible = [];
for ($i = 0; $i < $limit; $i++) {
    if (isset($possible[$arr[$i]])) {
        $possible[$arr[$i]]++;
    } else {
        $possible[$arr[$i]] = 1;
    }
}

for ($i = $limit; $i < $activity; $i++) {
    $currentElement = $arr[$i];
    $median = findMedian($limit, $possible);
    if ($currentElement >= $median * 2) {
        $count++;
    }
    $firstElement = $i - $limit;
    $possible[$arr[$firstElement]]--;
    if (isset($possible[$currentElement])) {
        $possible[$currentElement]++;
    } else {
        $possible[$currentElement] = 1;
    }

}

function findMedian(int $limit, array $possible): float
{
    if ($limit % 2 == 0) {
        $max = $limit / 2;
        $min = $max - 1;
    } else {
        $min = $max = ($limit - 1) / 2;
    }

    $attempt1 = $attempt2 = $st = -1;
    for ($i = 0; $i <= 200; $i++) {
        if (isset($possible[$i])) {
            $temp = $st + $possible[$i];
            if ($temp >= $min && $attempt1 == -1) {
                $attempt1 = $i;
            }
            if ($temp >= $max) {
                $attempt2 = $i;
            }
            $st = $temp;
            if ($attempt1 != -1 && $attempt2 != -1) {
                return ($attempt1 + $attempt2) / 2;
            }
        }
    }
}

echo $count;
