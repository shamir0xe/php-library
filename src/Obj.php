<?php

namespace shamir0xe\PhpLibrary;

use shamir0xe\PhpLibrary\Utils;

class Obj {
    public static function toArray($obj) {
        $res = [];
        foreach($obj as $key => $value) {
            if (\is_object($value)) $res[$key] = self::toArray($value);
            else {
                $res[$key] = $value;
            }
        }
        return $res;
    }
}
