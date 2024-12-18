<?php

namespace Nukular\Tests;

use Nukular\NuString;
use PHPUnit\Framework\TestCase;

class NuStringTest extends TestCase
{
    private const STRING = "Hello, World!";

    public function testLength()
    {
        $string = new NuString(self::STRING);
        $length = $string->length();

        $this->assertEquals(13, $length);
    }

    public function testChunk()
    {
        $string = new NuString(self::STRING);
        $chunks = $string->chunked(5);

        $this->assertEquals(['Hello', ', Wor', 'ld!'], $chunks->toArray());
    }

    public function testCountSubString()
    {
        $string = new NuString(self::STRING);
        $count  = $string->countSubString('o');

        $this->assertEquals(2, $count);
    }

    public function testAppend()
    {
        $string   = new NuString(self::STRING);
        $appended = $string->append(' How are you?');

        $this->assertEquals('Hello, World! How are you?', $appended->toString());
        $this->assertSame($string, $appended);
    }

    public function testAppended()
    {
        $string   = new NuString(self::STRING);
        $appended = $string->appended(' How are you?');

        $this->assertEquals('Hello, World! How are you?', $appended->toString());
        $this->assertNotSame($string, $appended);
    }

    public function testSubstring()
    {
        $string    = new NuString(self::STRING);
        $substring = $string->subString(7, 5);

        $this->assertEquals('World', $substring);
    }

    public function testIndexOf()
    {
        $string = new NuString(self::STRING);
        $index  = $string->findIndexOf('World');

        $this->assertEquals(7, $index);
    }

    public function testLastIndexOf()
    {
        $string = new NuString(self::STRING);
        $index  = $string->findLastIndexOf('o');

        $this->assertEquals(8, $index);
    }

    public function testReplace()
    {
        $string   = new NuString(self::STRING);
        $replaced = $string->replace('World', 'Universe');

        $this->assertEquals('Hello, Universe!', $replaced);
        $this->assertSame($string, $replaced);
    }

    public function testReplaced()
    {
        $string   = new NuString(self::STRING);
        $replaced = $string->replaced('World', 'Universe');

        $this->assertEquals('Hello, Universe!', $replaced->toString());
        $this->assertNotSame($string, $replaced);
    }

    public function testStartsWith()
    {
        $string     = new NuString(self::STRING);
        $startsWith = $string->startsWith('Hello');

        $this->assertTrue($startsWith);
    }

    public function testEndsWith()
    {
        $string   = new NuString(self::STRING);
        $endsWith = $string->endsWith('World!');

        $this->assertTrue($endsWith);
    }

    public function testSplit()
    {
        $string = new NuString(self::STRING);

        $this->assertEquals(['Hello', 'World!'], $string->split(', ')->toArray());
        $this->assertEquals(['Hello,', 'World!'], $string->split(' ')->toArray());
        $this->assertEquals(['Hello,', 'World!'], $string->split()->toArray());
        $this->assertEquals([], (new NuString(''))->split()->toArray());
    }

    public function testUpperCased()
    {
        $string     = new NuString(self::STRING);
        $upperCased = $string->upperCased();

        $this->assertEquals('HELLO, WORLD!', $upperCased->toString());
        $this->assertNotSame($string, $upperCased);
    }

    public function testUpperCaseFirst()
    {
        $string         = new NuString(self::STRING);
        $upperCaseFirst = $string->upperCaseFirst();

        $this->assertEquals('Hello, World!', $upperCaseFirst->toString());
        $this->assertSame($string, $upperCaseFirst);
    }

    public function testLowerCaseFirst()
    {
        $string         = new NuString(self::STRING);
        $lowerCaseFirst = $string->lowerCaseFirst();

        $this->assertEquals('hello, World!', $lowerCaseFirst->toString());
        $this->assertSame($string, $lowerCaseFirst);
    }

    public function testLowerCased()
    {
        $string     = new NuString(self::STRING);
        $lowerCased = $string->lowerCased();

        $this->assertEquals('hello, world!', $lowerCased->toString());
        $this->assertNotSame($string, $lowerCased);
    }

    public function testReversed()
    {
        $string   = new NuString(self::STRING);
        $reversed = $string->reversed();

        $this->assertEquals('!dlroW ,olleH', $reversed->toString());
        $this->assertNotSame($string, $reversed);
    }

    public function testUpperCase()
    {
        $string     = new NuString(self::STRING);
        $upperCased = $string->upperCase();

        $this->assertEquals('HELLO, WORLD!', $upperCased->toString());
        $this->assertSame($string, $upperCased);
    }

    public function testLowerCase()
    {
        $string     = new NuString(self::STRING);
        $lowerCased = $string->lowerCase();

        $this->assertEquals('hello, world!', $lowerCased->toString());
        $this->assertSame($string, $lowerCased);
    }

    public function testReverse()
    {
        $string   = new NuString(self::STRING);
        $reversed = $string->reverse();

        $this->assertEquals('!dlroW ,olleH', $reversed->toString());
        $this->assertSame($string, $reversed);
    }

    public function testToString()
    {
        $string = new NuString(self::STRING);

        $this->assertEquals(self::STRING, $string->toString());
        $this->assertEquals(self::STRING, (string)$string);
    }

    public function testContains()
    {
        $string = new NuString(self::STRING);

        $this->assertTrue($string->contains('World'));
        $this->assertFalse($string->contains('Universe'));
    }

    public function testLowerCasedFirst()
    {
        $string          = new NuString(self::STRING);
        $lowerCasedFirst = $string->lowerCasedFirst();

        $this->assertEquals('hello, World!', $lowerCasedFirst->toString());
        $this->assertNotSame($string, $lowerCasedFirst);
    }

    public function testUpperCasedFirst()
    {
        $string          = new NuString(self::STRING);
        $upperCasedFirst = $string->upperCasedFirst();

        $this->assertEquals('Hello, World!', $upperCasedFirst->toString());
        $this->assertNotSame($string, $upperCasedFirst);
    }

    public function testTrim()
    {
        $string  = new NuString('  ' . self::STRING . '  ');
        $trimmed = $string->trim();

        $this->assertEquals(self::STRING, $trimmed->toString());
        $this->assertSame($string, $trimmed);
    }

    public function testTrimmed()
    {
        $string  = new NuString('  ' . self::STRING . '  ');
        $trimmed = $string->trimmed();

        $this->assertEquals(self::STRING, $trimmed->toString());
        $this->assertNotSame($string, $trimmed);
    }

    public function testTrimmedWithCharacterMask()
    {
        $string  = new NuString(" \t\n\r\0\x0B" . self::STRING . " \t\n\r\0\x0B");
        $trimmed = $string->trimmed();

        $this->assertEquals(self::STRING, $trimmed->toString());
        $this->assertNotSame($string, $trimmed);
    }

    public function testTrimWithCharacterMask()
    {
        $string  = new NuString(" \t\n\r\0\x0B" . self::STRING . " \t\n\r\0\x0B");
        $trimmed = $string->trim();

        $this->assertEquals(self::STRING, $trimmed->toString());
        $this->assertSame($string, $trimmed);
    }

    public function testPadLeft()
    {
        $string = new NuString(self::STRING);
        $padded = $string->padLeft(20, '-');

        $this->assertEquals('-------Hello, World!', $padded->toString());
        $this->assertSame($string, $padded);
    }

    public function testPadRight()
    {
        $string = new NuString(self::STRING);
        $padded = $string->padRight(20, '-');

        $this->assertEquals('Hello, World!-------', $padded->toString());
        $this->assertSame($string, $padded);
    }

    public function testPaddedLeft()
    {
        $string = new NuString(self::STRING);
        $padded = $string->paddedLeft(20, '-');

        $this->assertEquals('-------Hello, World!', $padded->toString());
        $this->assertNotSame($string, $padded);
    }

    public function testPaddedRight()
    {
        $string = new NuString(self::STRING);
        $padded = $string->paddedRight(20, '-');

        $this->assertEquals('Hello, World!-------', $padded->toString());
        $this->assertNotSame($string, $padded);
    }

    public function testRemove()
    {
        $string  = new NuString(self::STRING);
        $removed = $string->remove('World');

        $this->assertEquals('Hello, !', $removed->toString());
        $this->assertSame($string, $removed);
    }

    public function testRemoved()
    {
        $string  = new NuString(self::STRING);
        $removed = $string->removed('World');

        $this->assertEquals('Hello, !', $removed->toString());
        $this->assertNotSame($string, $removed);
    }

    public function testRepeat()
    {
        $string   = new NuString(self::STRING);
        $repeated = $string->repeat(2);

        $this->assertEquals('Hello, World!Hello, World!', $repeated->toString());
        $this->assertSame($string, $repeated);
    }

    public function testRepeated()
    {
        $string   = new NuString(self::STRING);
        $repeated = $string->repeated(2);

        $this->assertEquals('Hello, World!Hello, World!', $repeated->toString());
        $this->assertNotSame($string, $repeated);
    }

    public function testReplaceUmlauts()
    {
        $string   = new NuString('äöüß');
        $replaced = $string->replaceUmlauts();

        $this->assertEquals('aeoeuess', $replaced->toString());
        $this->assertSame($string, $replaced);
    }

    public function testReplaceUmlautsInString()
    {
        $string   = new NuString('äöüß');
        $replaced = $string->replacedUmlauts();

        $this->assertEquals('aeoeuess', $replaced->toString());
        $this->assertNotSame($string, $replaced);
    }

    public function testCamelCase()
    {
        $string     = new NuString('hello_world');
        $camelCased = $string->camelCase();

        $this->assertEquals('helloWorld', $camelCased->toString());
        $this->assertSame($string, $camelCased);
    }

    public function testCamelCased()
    {
        $string     = new NuString('hello_world');
        $camelCased = $string->camelCased();

        $this->assertEquals('helloWorld', $camelCased->toString());
        $this->assertNotSame($string, $camelCased);
    }

    public function testSnakeCase()
    {
        $string     = new NuString('helloWorld');
        $snakeCased = $string->snakeCase();

        $this->assertEquals('hello_world', $snakeCased->toString());
        $this->assertSame($string, $snakeCased);
    }

    public function testSnakeCased()
    {
        $string     = new NuString('helloWorld');
        $snakeCased = $string->snakeCased();

        $this->assertEquals('hello_world', $snakeCased->toString());
        $this->assertNotSame($string, $snakeCased);
    }
}
