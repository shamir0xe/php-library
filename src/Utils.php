<?php

namespace shamir0xe\PhpLibrary;

use shamir0xe\PhpLibrary\Str;
use shamir0xe\PhpLibrary\Obj;

class Utils {
    public static function toString($value): string {
        if (\is_object($value)) {
            $value = Obj::toArray($value);
        }
        if (\is_array($value)) {
            $value = json_encode($value);
        }
        if (\is_bool($value)) {
            $value = $value ? 'true' : 'false';
        }
        return $value;
    }

    public static function debug(...$args): void {
        if (count($args) <= 0) {
            print("\n");
            return;
        }
        $res = $string = '';
        $argIndex = 0;
        if (\is_string($args[0])) {
            $string = $args[0];
            $argIndex += 1;
        }
        foreach (Str::toArray($string) as $char) {
            if ($char != '%') {
                $res .= $char;
            } else {
                $res .= self::toString($args[$argIndex]);
                $argIndex += 1;
            }
        }
        while ($argIndex < count($args)) {
            $res .= ', ' . self::toString($args[$argIndex]);
            $argIndex += 1;
        }
        $res .= "\n";
        print($res);
    }
}
