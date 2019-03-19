<?php

// Complete the dayOfProgrammer function below.
function dayOfProgrammer($year)
{
    $date = "";
    if ($year < 1918) {
        if ($year % 4 === 0) {
            $date = "12.09." . $year;
        } else {
            $date = "13.09." . $year;
        }
    } elseif ($year > 1918) {
        if ($year % 400 === 0 || ($year % 4 === 0 && $year % 100 !== 0)) {
            $date = "12.09." . $year;
        } else {
            $date = "13.09." . $year;
        }
    } else {
        $date = "26.09." . $year;
    }
    return $date;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$year = intval(trim(fgets(STDIN)));

$result = dayOfProgrammer($year);

fwrite($fptr, $result . "\n");

fclose($fptr);
