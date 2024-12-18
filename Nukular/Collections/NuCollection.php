<?php

namespace Nukular\Collections;

class NuCollection
{
    private array $data;

    /*
     * Create a new NuCollection instance.
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /*
     * Static creator method to create a new NuCollection instance from an array.
     */
    public static function fromArray(array $data): self
    {
        $list       = new self();
        $list->data = $data;

        return $list;
    }

    /*
     * Static creator method to create a new NuCollection instance from parameters.
     */
    public static function fromParameters(...$parameters): self
    {
        return new self($parameters);
    }

    /*
     * Get the NuCollection as an array.
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /*
     * Get an item from the NuCollection by key.
     */
    public function get(string $key)
    {
        return $this->data[$key] ?? null;
    }

    /*
     * Set an item in the NuCollection by key.
     */
    public function set(string $key, $value): self
    {
        $this->data[$key] = $value;

        return $this;
    }

    /*
     * Determine if an item exists in the NuCollection by key.
     */
    public function has(string $key): bool
    {
        return isset($this->data[$key]);
    }

    /*
     * Get the first item from the NuCollection.
     */
    public function first()
    {
        return reset($this->data);
    }

    /*
     * Get the last item from the NuCollection.
     */
    public function last()
    {
        return end($this->data);
    }

    /*
     * Get the number of items in the NuCollection.
     */
    public function count(): int
    {
        return count($this->data);
    }

    /*
     * Map over the items in the NuCollection and return the mapped NuCollection.
     */
    public function mapped(callable $callback): self
    {
        return new self(array_map($callback, $this->data));
    }

    /*
     * Filter items in the NuCollection using a callback and return the filtered NuCollection.
     */
    public function filtered(callable $callback): self
    {
        return new self(array_values(array_filter($this->data, $callback)));
    }

    /*
     * Merge the NuCollection with the given array and return a new NuCollection containing the merged data.
     */
    public function merged(array $data): self
    {
        return new self(array_merge($this->data, $data));
    }

    /*
     * Sort the NuCollection and return a new NuCollection containing the sorted data.
     */
    public function reversed(bool $preserveKeys = false): self
    {
        return new self(array_reverse($this->data, $preserveKeys));
    }

    /*
     * Map over the items in the NuCollection in place.
     */
    public function map(callable $callback): self
    {
        $this->data = array_map($callback, $this->data);

        return $this;
    }

    /*
     * Filter items in the NuCollection in place.
     */
    public function filter(callable $callback): self
    {
        $this->data = array_values(array_filter($this->data, $callback));

        return $this;
    }

    /*
     * Sort the NuCollection in place.
     */
    public function sort(int $flags = SORT_REGULAR): self
    {
        sort($this->data, $flags);

        return $this;
    }

    /*
     * Reverse the NuCollection in place.
     */
    public function reverse(bool $preserveKeys = false): self
    {
        $this->data = array_reverse($this->data, $preserveKeys);

        return $this;
    }

    /*
     * Get the keys of the NuCollection as a new NuCollection.
     */
    public function keys(): self
    {
        return new self(array_keys($this->data));
    }

    /*
     * Get the values of the NuCollection as a new NuCollection.
     */
    public function values(): self
    {
        return new self(array_values($this->data));
    }

    /*
     * Make the NuCollection unique.
     */
    public function unique(int $flags = SORT_STRING): self
    {
        $this->data = array_values(array_unique($this->data, $flags));

        return $this;
    }

    /*
     * Remove empty or null values from the NuCollection.
     */
    public function removeEmptyOrNull(): self
    {
        $this->data = array_values(array_filter($this->data, fn($value) => !empty($value)));

        return $this;
    }

    /*
     * Filter empty or null values and make the NuCollection unique.
     */
    public function filterNullOrEmptyAndDuplicates(): self
    {
        return $this->removeEmptyOrNull()->unique();
    }
}
