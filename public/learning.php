<?php

function test($age): int
{
    return $age >= 16;
}

function validateAge($name, $age): string
{
    $message = (test($age)) ? ' is old enuf' : ', get outta here!';

    return $name . $message;
}

echo validateAge('Dude', 16);
