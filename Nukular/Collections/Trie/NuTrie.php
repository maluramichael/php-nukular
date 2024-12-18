<?php

namespace Nukular\Collections\Trie;

class NuTrie
{
    public NuTrieNode $root;

    public function __construct(array $elements = [])
    {
        $this->root = new NuTrieNode();

        foreach ($elements as $element) {
            $this->add($element);
        }
    }

    public function add(string $data): void
    {
        $node = $this->root;

        for ($index = 0; $index < strlen($data); $index++) {
            $char = $data[$index];

            if (!isset($node->children[$char])) {
                $node->children[$char] = new NuTrieNode();
            }

            $node = $node->children[$char];
        }
    }

    public function exists(string $data): bool
    {
        $node     = $this->root;
        $findData = '';

        for ($index = 0; $index < strlen($data); $index++) {
            $char     = $data[$index];
            $findData .= $char;

            if (!isset($node->children[$char])) {
                return false;
            }

            $node = $node->children[$char];
        }

        return $findData === $data;
    }
}
