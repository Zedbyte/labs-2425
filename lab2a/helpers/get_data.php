<?php

function get_user_data($filename) {
    $file = fopen($filename, 'r');
    $data = [];

    $header = fgetcsv($file);

    $skip_fields = ['password', 'agree']; 
    $skip_indexes = [];

    foreach ((array)$header as $index => $field_name) {
        if (in_array($field_name, $skip_fields)) {
            $skip_indexes[] = $index;
        }
    }

    while (!feof($file)) {
        $row = fgetcsv($file, 1024);
        if (!empty($row)) {
            $filtered_row = array_filter($row, function($value, $index) use ($skip_indexes) {
                return !in_array($index, $skip_indexes);
            }, ARRAY_FILTER_USE_BOTH);

            $data[] = $filtered_row;
        }
    }

    fclose($file);
    return $data;
}

