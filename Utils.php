<?php
class Utils
{
    static function substr($str, $start, $length)
    {
        $result = "";

        for ($i = $start; $i < $start + $length; $i++) {
            $result .= $str[$i];
        }

        return $result;
    }

    static function min($a, $b)
    {
        return $a < $b ? $a : $b;
    }

    static function max($a, $b)
    {
        return $a > $b ? $a : $b;
    }

    static function count($array)
    {
        $size = 0;
        while (true) {
            if (!isset($array[$size])) {
                break;
            }
            $size++;
        }

        return $size;
    }

    static function array_push($array, $new_element)
    {
        $array[Utils::count($array)] = $new_element;

        return $array;
    }
}
