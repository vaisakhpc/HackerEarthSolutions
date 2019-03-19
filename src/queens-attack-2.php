<?php

// Complete the queensAttack function below.
function queensAttack($n, $k, $r_q, $c_q, $obstacles)
{
    /*
     * Declare 8 variables to find the initial possible numbers of traversible cells for        the queen in different directions; Top, Right, Bottom, Left, Top Left, Bottom Left,      Top Right and Bottom Right.
     */
    $top = $n - $r_q; // top variable
    $right = $n - $c_q; // right variable
    $bottom = $r_q - 1; // bottom variable
    $left = $c_q - 1; // left variable
    $topleft = min($top, $left); // topleft variable
    $bottomleft = min($bottom, $left); // bottomleft variable
    $topright = min($top, $right); // topright variable
    $bottomright = min($bottom, $right); // bottomright variable

    foreach ($obstacles as $obstacle) {
        $row = $obstacle[0];
        $column = $obstacle[1];
        // top count
        if ($row > $r_q && $column == $c_q) {
            $top = min($top, $row - $r_q - 1);
            // bottom count
        } elseif ($row < $r_q && $column == $c_q) {
            $bottom = min($bottom, $r_q - 1 - $row);
            // left count
        } elseif ($row == $r_q && $column < $c_q) {
            $left = min($left, $c_q - 1 - $column);
            // right count
        } elseif ($row == $r_q && $column > $c_q) {
            $right = min($right, $column - $c_q - 1);
            // topleft count
        } elseif (($row > $r_q && $column < $c_q)
            && ($row + $column == $r_q + $c_q)) {
            $topleft = min($topleft, $c_q - $column - 1);
            // bottomleft count
        } elseif (($row < $r_q && $column < $c_q)
            && (($n - $row) + $column == ($n - $r_q) + $c_q)) {
            $bottomleft = min($bottomleft, $c_q - 1 - $column);
            // topright count
        } elseif (($row > $r_q && $column > $c_q)
            && (($n - $row) + $column == ($n - $r_q) + $c_q)) {
            $topright = min($topright, $column - $c_q - 1);
            // bottomright count
        } elseif ($row < $r_q && $column > $c_q
            && ($row + $column == $r_q + $c_q)) {
            $bottomright = min($bottomright, $column - $c_q - 1);
        }
    }

    // total count will be calculated and returned here
    return $top + $right + $bottom + $left + $topleft + $bottomleft + $topright + $bottomright;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nk_temp);
$nk = explode(' ', $nk_temp);

$n = intval($nk[0]);

$k = intval($nk[1]);

fscanf($stdin, "%[^\n]", $r_qC_q_temp);
$r_qC_q = explode(' ', $r_qC_q_temp);

$r_q = intval($r_qC_q[0]);

$c_q = intval($r_qC_q[1]);

$obstacles = array();

for ($i = 0; $i < $k; $i++) {
    fscanf($stdin, "%[^\n]", $obstacles_temp);
    $obstacles[] = array_map('intval', preg_split('/ /', $obstacles_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = queensAttack($n, $k, $r_q, $c_q, $obstacles);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
