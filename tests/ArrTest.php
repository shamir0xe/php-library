<?php
namespace shamir0xe\PhpLibrary\Tests;

use PHPUnit\Framework\TestCase;
use shamir0xe\PhpLibrary\Arr;

class ArrTest extends TestCase {
    public function test_reverse_map() {
        $arr = [
            [
                "id" => 31,
                "value" => "hash"
            ],
            [
                "id" => 43,
                "value" => "noice",
                "some_other_value" => "really noice"
            ],
            [
                "id" => "boo",
                "some_dummy_var" => 423111
            ]
        ];
        $reversed_arr = [
            31 => [
                "id" => 31,
                "value" => "hash"
            ],
            43 => [
                "id" => 43,
                "value" => "noice",
                "some_other_value" => "really noice"
            ],
            "boo" => [
                "id" => "boo",
                "some_dummy_var" => 423111
            ]
        ];
        $this->assertEquals(
            $reversed_arr, 
            Arr::reverseMap($arr, fn($value) => $value["id"])
        );
    }
}