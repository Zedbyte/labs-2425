<?php

function dump_session()
{
    ?>
        <div class="p-card">
        <h3>Session Data</h3>
        <p class="p-card__content">
            <pre><?php print_r($_SESSION); ?></pre>
        </p>
        </div>
    <?php
}

function check_if_header_exists($filename, $userData) {
    $file = fopen($filename, 'r'); 

    if (($firstLine = fgetcsv($file)) !== false) {
        if ($firstLine === array_keys($userData)) {
            fclose($file);
            return true;
        }
    }
    fclose($file);
    return false;
}