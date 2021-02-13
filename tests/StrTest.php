<?php
namespace shamir0xe\PhpLibrary\Tests;

use PHPUnit\Framework\TestCase;
use shamir0xe\PhpLibrary\Str;

class StrTest extends TestCase {
    public function test_utf8_length() {
        $name = 'آزاده';
        $length = Str::utf8Length($name);
        $this->assertEquals($length, 5);
    }
}
