<?php

/*
 * Complete the timeConversion function below.
 */
function timeConversion($s)
{
    $pm = strpos($s, "PM");
    $times = explode(":", $s);
    $hourNeedle = $times[0];
    if ($pm) {
        $times[2] = str_replace("PM", "", $times[2]);
        if ($hourNeedle < 12) {
            $hourNeedle = $hourNeedle + 12;
        }
    } else {
        if ($hourNeedle == 12) {
            $hourNeedle = 0;
        }
        $times[2] = str_replace("AM", "", $times[2]);
    }
    return sprintf("%02d", $hourNeedle) . ':' . $times[1] . ':' . $times[2];
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$__fp = fopen("php://stdin", "r");

fscanf($__fp, "%[^\n]", $s);

$result = timeConversion($s);

fwrite($fptr, $result . "\n");

fclose($__fp);
fclose($fptr);
