<?php

namespace Nukular;

use InvalidArgumentException;

/**
 * A class for performing various operations on numbers.
 */
class NuNumber
{
    private int|float $data;

    /**
     * NuNumber constructor.
     *
     * @param int|float $number The initial number.
     */
    public function __construct(int|float $number)
    {
        $this->data = $number;
    }

    /**
     * Convert the number to a string.
     *
     * @return string The number as a string.
     */
    public function __toString(): string
    {
        return (string) $this->data;
    }

    /**
     * Get the number.
     *
     * @return int|float The number.
     */
    public function toNumber(): int|float
    {
        return $this->data;
    }

    /**
     * Round the number to a specified precision.
     *
     * @param int $precision The number of decimal digits to round to.
     * @return NuNumber The current instance.
     */
    public function round(int $precision = 0): NuNumber
    {
        $this->data = round($this->data, $precision);

        return $this;
    }

    /**
     * Round the number to a specified precision and return a new instance.
     *
     * @param int $precision The number of decimal digits to round to.
     * @return NuNumber A new instance with the rounded number.
     */
    public function rounded(int $precision = 0): NuNumber
    {
        return (new NuNumber($this->data))->round($precision);
    }

    /**
     * Add a number to the current number.
     *
     * @param int|float $number The number to add.
     * @return NuNumber The current instance.
     */
    public function add(int|float $number): NuNumber
    {
        $this->data += $number;

        return $this;
    }

    /**
     * Add a number to the current number and return a new instance.
     *
     * @param int|float $number The number to add.
     * @return NuNumber A new instance with the added number.
     */
    public function added(int|float $number): NuNumber
    {
        return (new NuNumber($this->data))->add($number);
    }

    /**
     * Subtract a number from the current number.
     *
     * @param int|float $number The number to subtract.
     * @return NuNumber The current instance.
     */
    public function subtract(int|float $number): NuNumber
    {
        $this->data -= $number;

        return $this;
    }

    /**
     * Subtract a number from the current number and return a new instance.
     *
     * @param int|float $number The number to subtract.
     * @return NuNumber A new instance with the subtracted number.
     */
    public function subtracted(int|float $number): NuNumber
    {
        return (new NuNumber($this->data))->subtract($number);
    }

    /**
     * Multiply the current number by another number.
     *
     * @param int|float $number The number to multiply by.
     * @return NuNumber The current instance.
     */
    public function multiply(int|float $number): NuNumber
    {
        $this->data *= $number;

        return $this;
    }

    /**
     * Multiply the current number by another number and return a new instance.
     *
     * @param int|float $number The number to multiply by.
     * @return NuNumber A new instance with the multiplied number.
     */
    public function multiplied(int|float $number): NuNumber
    {
        return (new NuNumber($this->data))->multiply($number);
    }

    /**
     * Divide the current number by another number.
     *
     * @param int|float $number The number to divide by.
     * @return NuNumber The current instance.
     * @throws InvalidArgumentException If the divisor is zero.
     */
    public function divide(int|float $number): NuNumber
    {
        if ($number === 0) {
            throw new InvalidArgumentException('Division by zero');
        }

        $this->data /= $number;

        return $this;
    }

    /**
     * Divide the current number by another number and return a new instance.
     *
     * @param int|float $number The number to divide by.
     * @return NuNumber A new instance with the divided number.
     * @throws InvalidArgumentException If the divisor is zero.
     */
    public function divided(int|float $number): NuNumber
    {
        return (new NuNumber($this->data))->divide($number);
    }
}
