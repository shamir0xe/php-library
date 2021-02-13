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

    public function test_starts_with() {
        $string = 'hello dear friend';
        $this->assertTrue(Str::startsWith($string, 'hell'));
        $this->assertTrue(Str::startsWith($string, 'h'));
        $this->assertTrue(Str::startsWith($string, ''));
        $this->assertTrue(Str::startsWith($string, $string));
        $this->assertTrue(!Str::startsWith($string, 'mello'));
    }

    public function test_ends_with() {
        $string = 'hello dear friend';
        $this->assertTrue(Str::endsWith($string, ' friend'));
        $this->assertTrue(Str::endsWith($string, 'd'));
        $this->assertTrue(Str::endsWith($string, ''));
        $this->assertTrue(Str::endsWith($string, $string));
        $this->assertTrue(!Str::endsWith($string, 'md'));
    }
}
