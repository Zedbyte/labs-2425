<?php

function write_data_to_csv($array, $filename, $headerExists) {
    $userData = $array;

    $file = fopen($filename, 'a');

    // fseek($file, 0, SEEK_END);

    if ($file === false) {
        throw new Exception("Unable to open file for writing.");
    }

    if (!$headerExists) {
        fputcsv($file, array_keys($userData));
    }

    fputcsv($file, array_values($userData));

    fclose($file);
}