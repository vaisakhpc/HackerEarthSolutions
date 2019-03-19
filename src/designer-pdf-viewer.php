<?php

// Complete the designerPdfViewer function below.
function designerPdfViewer($h, $word)
{
    $letters = [];
    for ($i = 0; $i < strlen($word); $i++) {
        $letters[] = $h[ord($word[$i]) - 97];
    }
    $maxValue = max($letters);
    return $maxValue * strlen($word);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $h_temp);

$h = array_map('intval', preg_split('/ /', $h_temp, -1, PREG_SPLIT_NO_EMPTY));

$word = '';
fscanf($stdin, "%[^\n]", $word);

$result = designerPdfViewer($h, $word);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
