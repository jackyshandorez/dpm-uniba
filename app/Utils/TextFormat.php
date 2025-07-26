<?php

namespace App\Utils;

class TextFormat
{
    public static function kapitalRomawi($string)
    {
        $romanNumerals = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X'];

        $words = explode(' ', strtolower($string));
        $result = [];

        foreach ($words as $word) {
            $upper = strtoupper($word);
            if (in_array($upper, $romanNumerals)) {
                $result[] = $upper;
            } else {
                $result[] = ucfirst($word);
            }
        }

        return implode(' ', $result);
    }

    public static function kapitalSemua($string)
    {
        return strtoupper($string);
    }
}
