<?php

namespace Nukular;

use Nukular\Collections\NuCollection;

/**
 * Wrapper for PHP string functions.
 */
class NuString
{
    private string $data = '';

    /**
     * Pass a string to the constructor to work with it.
     *
     * @example $nuString = new NuString('Hello World');
     */
    public function __construct(string $data = '')
    {
        $this->data = $data;
    }

    /**
     * @example echo(new NuString('Hello World'));
     */
    public function __toString(): string
    {
        return $this->data;
    }

    /**
     * Returns true if the string contains the needle.
     *
     * @example (new NuString('Hello World'))->contains('World');
     */
    public function contains(string $needle): bool
    {
        return str_contains($this->data, $needle);
    }

    /**
     * Returns the number of characters in the string.
     *
     * @example (new NuString('Hello World'))->length();
     */
    public function length(): int
    {
        return strlen($this->data);
    }

    /**
     * Returns the number of occurrences of a substring in the string.
     *
     * @example (new NuString('Hello World'))->countSubString('o');
     */
    public function countSubString(string $subString): int
    {
        return substr_count($this->data, $subString);
    }

    /**
     * Returns true if the string starts with the needle.
     *
     * @example (new NuString('Hello World'))->startsWith('Hello');
     */
    public function startsWith(string $needle): bool
    {
        return str_starts_with($this->data, $needle);
    }

    /**
     * Returns true if the string ends with the needle.
     *
     * @example (new NuString('Hello World'))->endsWith('World');
     */
    public function endsWith(string $needle): bool
    {
        return str_ends_with($this->data, $needle);
    }

    /**
     * Append a string to the current string.
     *
     * @example (new NuString('Hello'))->append(' World');
     */
    public function append(string $string): self
    {
        $this->data .= $string;

        return $this;
    }

    /**
     * Append a string to the current string and return a new instance.
     *
     * @example $newString = (new NuString('Hello'))->appended(' World');
     */
    public function appended(string $string): self
    {
        return (new self($this))->append($string);
    }

    /**
     * Split the string into an array of strings where each element is $length characters long.
     *
     * @example (new NuString('Hello World'))->chunked(5);
     */
    public function chunked(int $length): NuCollection
    {
        return new NuCollection(str_split($this->data, $length));
    }

    /**
     * Find the index of a substring in the string.
     *
     * @example (new NuString('Hello World'))->findIndexOf('World');
     */
    public function findIndexOf(string $needle): int
    {
        return strpos($this->data, $needle);
    }

    /**
     * Find the last index of a substring in the string.
     *
     * @example (new NuString('Hello World'))->findLastIndexOf('o');
     */
    public function findLastIndexOf(string $needle): int
    {
        return strrpos($this->data, $needle);
    }

    /**
     * Convert the string to lowercase in place.
     *
     * @example (new NuString('Hello World'))->lowerCase();
     */
    public function lowerCase(): self
    {
        $this->data = strtolower($this->data);

        return $this;
    }

    /**
     * Convert the string to lowercase and return a new instance.
     *
     * @example $newString = (new NuString('Hello World'))->lowerCased();
     */
    public function lowerCased(): self
    {
        return (new self($this))->lowerCase();
    }

    /**
     * Convert the first character of the string to lowercase and return a new instance.
     *
     * @example $newString = (new NuString('Hello World'))->lowerCasedFirst();
     */
    public function lowerCasedFirst(): self
    {
        return (new self($this))->lowerCaseFirst();
    }

    /**
     * Convert the first character of the string to lowercase in place.
     *
     * @example (new NuString('Hello World'))->lowerCaseFirst();
     */
    public function lowerCaseFirst(): self
    {
        $this->data = lcfirst($this->data);

        return $this;
    }

    /**
     * Pad the string on the left side with a specified character to a certain length.
     *
     * @example (new NuString('Hello'))->padLeft(10, '_');
     */
    public function padLeft(int $length, string $padString = " "): self
    {
        $this->data = str_pad($this->data, $length, $padString, STR_PAD_LEFT);

        return $this;
    }

    /**
     * Pad the string on the right side with a specified character to a certain length.
     *
     * @example (new NuString('Hello'))->padRight(10, '_');
     */
    public function padRight(int $length, string $padString = " "): self
    {
        $this->data = str_pad($this->data, $length, $padString, STR_PAD_RIGHT);

        return $this;
    }

    /**
     * Pad the string on the left side with a specified character to a certain length and return a new instance.
     *
     * @example $newString = (new NuString('Hello'))->paddedLeft(10, '_');
     */
    public function paddedLeft(int $length, string $padString = " "): self
    {
        return (new self($this))->padLeft($length, $padString);
    }

    /**
     * Pad the string on the right side with a specified character to a certain length and return a new instance.
     *
     * @example $newString = (new NuString('Hello'))->paddedRight(10, '_');
     */
    public function paddedRight(int $length, string $padString = " "): self
    {
        return (new self($this))->padRight($length, $padString);
    }

    /**
     * Remove all occurrences of a specified substring from the string.
     *
     * @example (new NuString('Hello World'))->remove('World');
     */
    public function remove(string $substring): self
    {
        $this->data = str_replace($substring, '', $this->data);

        return $this;
    }

    /**
     * Remove all occurrences of a specified substring from the string and return a new instance.
     *
     * @example $newString = (new NuString('Hello World'))->removed('World');
     */
    public function removed(string $substring): self
    {
        return (new self($this))->remove($substring);
    }

    /**
     * Repeat the string a specified number of times.
     *
     * @example (new NuString('Hello'))->repeat(3);
     */
    public function repeat(int $times): self
    {
        $this->data = str_repeat($this->data, $times);

        return $this;
    }

    /**
     * Repeat the string a specified number of times and return a new instance.
     *
     * @example $newString = (new NuString('Hello'))->repeated(3);
     */
    public function repeated(int $times): self
    {
        return (new self($this))->repeat($times);
    }

    /**
     * Replace all occurrences of the search string with the replacement string.
     *
     * @example (new NuString('Hello World'))->replace('World', 'PHP');
     */
    public function replace(string $search, string $replace): self
    {
        $this->data = str_replace($search, $replace, $this->data);

        return $this;
    }

    /**
     * Replace all occurrences of the search string with the replacement string and return a new instance.
     *
     * @example $newString = (new NuString('Hello World'))->replaced('World', 'PHP');
     */
    public function replaced(string $search, string $replace): self
    {
        return (new self($this))->replace($search, $replace);
    }

    /**
     * Reverse the string in place.
     *
     * @example (new NuString('Hello'))->reverse();
     */
    public function reverse(): self
    {
        $this->data = strrev($this->data);

        return $this;
    }

    /**
     * Reverse the string and return a new instance.
     *
     * @example $newString = (new NuString('Hello'))->reversed();
     */
    public function reversed(): self
    {
        return (new self($this))->reverse();
    }

    /**
     * Split the string by a delimiter and return a collection of the parts.
     *
     * @example (new NuString('Hello World'))->split(' ');
     */
    public function split(string $delimiter = ' '): NuCollection
    {
        $collection = new NuCollection(explode($delimiter, $this->data));

        return $collection->removeEmptyOrNull();
    }

    /**
     * Return a substring of the string.
     *
     * @example (new NuString('Hello World'))->subString(0, 5);
     */
    public function subString(int $start, int $length): string
    {
        return new self(substr($this->data, $start, $length));
    }

    /**
     * Return the string itself. Is the same as __toString().
     *
     * @example (new NuString('Hello World'))->toString();
     */
    public function toString(): string
    {
        return (string) $this;
    }

    /**
     * Trim characters from the beginning and end of the string.
     *
     * @example (new NuString(' Hello '))->trim();
     */
    public function trim(string $characterMask = " \t\n\r\0\x0B"): self
    {
        $this->data = trim($this->data, $characterMask);

        return $this;
    }

    /**
     * Trim characters from the beginning and end of the string and return a new instance.
     *
     * @example $newString = (new NuString(' Hello '))->trimmed();
     */
    public function trimmed(string $characterMask = " \t\n\r\0\x0B"): self
    {
        return (new self($this))->trim($characterMask);
    }

    /**
     * Convert the string to uppercase in place.
     *
     * @example (new NuString('Hello World'))->upperCase();
     */
    public function upperCase(): self
    {
        $this->data = strtoupper($this->data);

        return $this;
    }

    /**
     * Convert the string to uppercase and return a new instance.
     *
     * @example $newString = (new NuString('Hello World'))->upperCased();
     */
    public function upperCased(): self
    {
        return (new self($this))->upperCase();
    }

    /**
     * Convert the first character of the string to uppercase in place.
     *
     * @example (new NuString('hello'))->upperCaseFirst();
     */
    public function upperCaseFirst(): self
    {
        $this->data = ucfirst($this->data);

        return $this;
    }

    /**
     * Convert the first character of the string to uppercase and return a new instance.
     *
     * @example $newString = (new NuString('hello'))->upperCasedFirst();
     */
    public function upperCasedFirst(): self
    {
        return (new self($this))->upperCaseFirst();
    }

    /**
     * Replace German umlauts with their corresponding character combinations.
     *
     * @example (new NuString('Füße'))->replaceUmlauts();
     */
    public function replaceUmlauts(): self
    {
        $this->data = str_replace(
            ['ä', 'ö', 'ü', 'ß', 'Ä', 'Ö', 'Ü'],
            ['ae', 'oe', 'ue', 'ss', 'Ae', 'Oe', 'Ue'],
            $this->data
        );

        return $this;
    }

    /**
     * Replace German umlauts with their corresponding character combinations and return a new instance.
     *
     * @example $newString = (new NuString('Füße'))->replacedUmlauts();
     */
    public function replacedUmlauts(): self
    {
        return (new self($this))->replaceUmlauts();
    }

    /**
     * Convert the string to camel case in place.
     *
     * @example (new NuString('hello_world'))->camelCase();
     */
    public function camelCase(): self
    {
        $this->data = lcfirst(str_replace(' ', '', ucwords(str_replace(['_', '-'], ' ', $this->data))));

        return $this;
    }

    /**
     * Convert the string to camel case and return a new instance.
     *
     * @example $newString = (new NuString('hello_world'))->camelCased();
     */
    public function camelCased(): self
    {
        return (new self($this))->camelCase();
    }

    /**
     * Convert the string to snake case in place.
     *
     * @example (new NuString('helloWorld'))->snakeCase();
     */
    public function snakeCase(): self
    {
        $this->data = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $this->data));

        return $this;
    }

    /**
     * Convert the string to snake case and return a new instance.
     *
     * @example $newString = (new NuString('helloWorld'))->snakeCased();
     */
    public function snakeCased(): self
    {
        return (new self($this))->snakeCase();
    }
}
