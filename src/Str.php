<?php

namespace shamir0xe\PhpLibrary;

use shamir0xe\PhpLibrary\Arr;

class Str {
    public static function toArray(string $string, int $length = 1): ?array {
        return str_split($string, $length);
    }

    public static function utf8Length(string $string): int {
        $length = 0;
        foreach(Arr::range(strlen($string)) as $i) {
            $length += (ord($string[$i]) & 0xc0) != 0x80 ? 1 : 0;
        }
        return $length;
    }

    /**
     * we can use KMP instead of this, but anyway
     *
     * @param   string  $token   [$token description]
     * @param   string  $string  [$string description]
     *
     * @return  bool             [return description]
     */
    public static function in(string $token, string $string) : bool {
        foreach(Arr::range(strlen($string)) as $i) {
            $bl = true;
            if ($i + strlen($token) > strlen($string)) break;
            foreach(Arr::range(strlen($token)) as $j) {
                $bl &= $string[$i + $j] == $token[$j];
            }
            if ($bl) return true;
        }
        return false;
    }

    public static function startsWith(string $string, string $alter): bool {
        return strlen($string) >= strlen($alter) &&
        substr($string, 0, strlen($alter)) == $alter;
    }

    public static function endsWith(string $string, string $alter): bool {
        return strlen($string) >= strlen($alter) &&
        substr($string, -strlen($alter), strlen($alter)) == $alter;
    }

    public static function charAt(string $string, int $index): string {
        if ($index >= 0) {
            return $string[$index];
        }
        return $string[strlen($string) + $index];
    }
}
