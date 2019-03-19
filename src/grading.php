<?php

/*
 * Complete the gradingStudents function below.
 */
function gradingStudents($grades)
{
    $revisedScores = [];
    for ($i = 0; $i < count($grades); $i++) {
        $remainder = $grades[$i] % 5;
        if ($grades[$i] < 38 || $remainder <= 2) {
            $revisedScores[$i] = $grades[$i];
        } else {
            $revisedScores[$i] = $grades[$i] + (5 - $remainder);
        }
    }
    return $revisedScores;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$__fp = fopen("php://stdin", "r");

fscanf($__fp, "%d\n", $n);

$grades = array();

for ($grades_itr = 0; $grades_itr < $n; $grades_itr++) {
    fscanf($__fp, "%d\n", $grades_item);
    $grades[] = $grades_item;
}

$result = gradingStudents($grades);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($__fp);
fclose($fptr);
