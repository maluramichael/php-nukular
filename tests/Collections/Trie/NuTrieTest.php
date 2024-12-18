<?php

namespace Nukular\Tests\Collections\Trie;

use Nukular\Collections\Trie\NuTrie;
use PHPUnit\Framework\TestCase;

class NuTrieTest extends TestCase
{
    public function testAdd(): void
    {
        $trie = new NuTrie();

        $trie->add('test');
        $this->assertTrue($trie->exists('test'));
    }

    public function testExists(): void
    {
        $trie = new NuTrie();

        $trie->add('test');
        $this->assertTrue($trie->exists(''));
        $this->assertTrue($trie->exists('t'));
        $this->assertTrue($trie->exists('test'));
        $this->assertFalse($trie->exists('st'));
        $this->assertFalse($trie->exists('12333'));
    }

    public function testInitialWords() {
        $trie = new NuTrie([
            'Foo',
            'Bar',
            'Baz'
        ]);

        $this->assertTrue($trie->exists('Foo'));
        $this->assertTrue($trie->exists('Bar'));
        $this->assertTrue($trie->exists('Baz'));
    }
}
