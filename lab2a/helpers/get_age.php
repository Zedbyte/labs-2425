<?php

function get_age($birthdate) {
    $birthdate = new DateTime($birthdate);
    $today = new DateTime('today');
    $age = $today->diff($birthdate)->y;

    return $age;
}