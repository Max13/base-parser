<?php

if (!function_exists('parseFileToArray')) {
    function parseFileToArray($filename)
    {
        return file($filename);
    }
}

if (!function_exists('parseStringToArray')) {
    function parseStringToArray($string)
    {
        $array = explode("\n", $string);
        $c = count($array);

        if ($array[$c - 1] == '') {
            unset($array[$c - 1]);
        }

        array_walk($array, function (&$value) {
            $value .= "\n";
        });

        return $array;
    }
}

if (!function_exists('parseStdinToArray')) {
    function parseStdinToArray($fd = STDIN)
    {
        $array = [];

        while (($line = fgets($fd)) !== false) {
            $array[] = $line;
        }

        return $array;
    }
}
