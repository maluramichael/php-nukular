<?php

namespace Nukular\Tests\Collections;

use Nukular\Collections\NuCollection;
use PHPUnit\Framework\TestCase;

class NuCollectionTest extends TestCase
{
    public function testCount()
    {
        $elements   = [1, 2, 3];
        $NuCollection = new NuCollection($elements);
        $count      = $NuCollection->count();

        $this->assertEquals(3, $count);
    }

    public function testFiltered()
    {
        $elements = [1, 2, 3];

        $NuCollection = new NuCollection($elements);
        $filtered   = $NuCollection->filtered(function ($element) {
            return $element > 1;
        });

        $this->assertEquals([2, 3], $filtered->toArray());
        $this->assertNotEquals($NuCollection, $filtered);
    }

    public function testFilterNullOrEmptyAndDuplicates()
    {
        $elements   = [1, 2, 3, null, 4, 5, 6, 7, 8, 9, 10, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $NuCollection = new NuCollection($elements);
        $filtered   = $NuCollection->filterNullOrEmptyAndDuplicates();

        $this->assertEquals([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], $filtered->toArray());
    }

    public function testGet()
    {
        $elements   = [1, 2, 3];
        $NuCollection = new NuCollection($elements);
        $element    = $NuCollection->get(1);

        $this->assertEquals(2, $element);
    }

    public function testSet()
    {
        $elements   = [1, 2, 3];
        $NuCollection = new NuCollection($elements);
        $NuCollection->set(1, 4);

        $this->assertEquals(4, $NuCollection->get(1));
    }

    public function testHas()
    {
        $elements   = [1, 2, 3];
        $NuCollection = new NuCollection($elements);
        $has        = $NuCollection->has(1);

        $this->assertTrue($has);
    }

    public function testFirst()
    {
        $elements   = [1, 2, 3];
        $NuCollection = new NuCollection($elements);
        $first      = $NuCollection->first();

        $this->assertEquals(1, $first);
    }

    public function testLast()
    {
        $elements   = [1, 2, 3];
        $NuCollection = new NuCollection($elements);
        $last       = $NuCollection->last();

        $this->assertEquals(3, $last);
    }

    public function testMapped()
    {
        $elements   = [1, 2, 3];
        $NuCollection = new NuCollection($elements);
        $mapped     = $NuCollection->mapped(function ($element) {
            return $element * 2;
        });

        $this->assertEquals([2, 4, 6], $mapped->toArray());
        $this->assertNotEquals($NuCollection, $mapped);
    }

    public function testMerged()
    {
        $elements1  = [1, 2, 3];
        $elements2  = [4, 5, 6];
        $NuCollection = new NuCollection($elements1);
        $merged     = $NuCollection->merged($elements2);

        $this->assertEquals([1, 2, 3, 4, 5, 6], $merged->toArray());
        $this->assertNotEquals($NuCollection, $merged);
    }

    public function testReversed()
    {
        $elements   = [1, 2, 3];
        $NuCollection = new NuCollection($elements);
        $reversed   = $NuCollection->reversed();

        $this->assertEquals([3, 2, 1], $reversed->toArray());
        $this->assertNotEquals($NuCollection, $reversed);
    }

    public function testMap()
    {
        $elements   = [1, 2, 3];
        $NuCollection = new NuCollection($elements);
        $mapped     = $NuCollection->map(function ($element) {
            return $element * 2;
        });

        $this->assertEquals([2, 4, 6], $mapped->toArray());
        $this->assertEquals([2, 4, 6], $NuCollection->toArray());
    }

    public function testFilter()
    {
        $elements = [1, 2, 3];

        $NuCollection = new NuCollection($elements);
        $filtered   = $NuCollection->filter(function ($element) {
            return $element > 1;
        });

        $this->assertEquals([2, 3], $filtered->toArray());
        $this->assertEquals([2, 3], $NuCollection->toArray());
    }

    public function testSort()
    {
        $elements = [3, 2, 1];

        $NuCollection = new NuCollection($elements);
        $sorted     = $NuCollection->sort();

        $this->assertEquals([1, 2, 3], $sorted->toArray());
        $this->assertEquals([1, 2, 3], $NuCollection->toArray());
    }

    public function testReverse()
    {
        $elements = [1, 2, 3];

        $NuCollection = new NuCollection($elements);
        $reversed   = $NuCollection->reverse();

        $this->assertEquals([3, 2, 1], $reversed->toArray());
        $this->assertEquals([3, 2, 1], $NuCollection->toArray());
    }

    public function testFromArray()
    {
        $elements   = [1, 2, 3];
        $NuCollection = NuCollection::fromArray($elements);

        $this->assertEquals($elements, $NuCollection->toArray());
    }

    public function testKeys()
    {
        $elements   = ['a' => 1, 'b' => 2, 'c' => 3];
        $NuCollection = new NuCollection($elements);
        $keys       = $NuCollection->keys();

        $this->assertEquals(['a', 'b', 'c'], $keys->toArray());
    }

    public function testValues()
    {
        $elements   = ['a' => 1, 'b' => 2, 'c' => 3];
        $NuCollection = new NuCollection($elements);
        $values     = $NuCollection->values();

        $this->assertEquals([1, 2, 3], $values->toArray());
    }

    public function testFromParameters()
    {
        $NuCollection = NuCollection::fromParameters(1, 2, 3);

        $this->assertEquals([1, 2, 3], $NuCollection->toArray());
    }
}
