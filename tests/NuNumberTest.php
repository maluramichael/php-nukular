<?php

namespace Nukular\Tests;

use InvalidArgumentException;
use Nukular\NuNumber;
use PHPUnit\Framework\TestCase;

class NuNumberTest extends TestCase
{
    public function testAdd()
    {
        $number = new NuNumber(5);
        $number->add(3);

        $this->assertEquals(8, $number->toNumber());
    }

    public function testAdded()
    {
        $number = new NuNumber(5);
        $newNumber = $number->added(3);

        $this->assertEquals(8, $newNumber->toNumber());
        $this->assertNotEquals($number, $newNumber);
    }

    public function testDivide()
    {
        $number = new NuNumber(10);
        $number->divide(2);

        $this->assertEquals(5, $number->toNumber());

        $number = new NuNumber(10);

        $this->expectException(InvalidArgumentException::class);
        $number->divide(0);
    }

    public function testDivided()
    {
        $number = new NuNumber(10);
        $newNumber = $number->divided(2);

        $this->assertEquals(5, $newNumber->toNumber());
        $this->assertNotEquals($number, $newNumber);
    }

    public function testMultiplied()
    {
        $number = new NuNumber(5);
        $newNumber = $number->multiplied(3);

        $this->assertEquals(15, $newNumber->toNumber());
        $this->assertNotEquals($number, $newNumber);
    }

    public function testMultiply()
    {
        $number = new NuNumber(5);
        $number->multiply(3);

        $this->assertEquals(15, $number->toNumber());
    }

    public function testRound()
    {
        $number = new NuNumber(5.678);
        $number->round(2);

        $this->assertEquals(5.68, $number->toNumber());
    }

    public function testRounded()
    {
        $number = new NuNumber(5.678);
        $newNumber = $number->rounded(2);

        $this->assertEquals(5.68, $newNumber->toNumber());
        $this->assertNotEquals($number, $newNumber);
    }

    public function testSubtract()
    {
        $number = new NuNumber(5);
        $number->subtract(3);

        $this->assertEquals(2, $number->toNumber());
    }

    public function testSubtracted()
    {
        $number = new NuNumber(5);
        $newNumber = $number->subtracted(3);

        $this->assertEquals(2, $newNumber->toNumber());
        $this->assertNotEquals($number, $newNumber);
    }

    public function testToNumber()
    {
        $number = new NuNumber(5);
        $this->assertEquals(5, $number->toNumber());

        $number = new NuNumber(5.678);
        $this->assertEquals(5.678, $number->toNumber());
    }

    public function testToString()
    {
        $number = new NuNumber(5);
        $this->assertEquals('5', (string)$number);

        $number = new NuNumber(5.678);
        $this->assertEquals('5.678', (string)$number);
    }
}
