<?php
class Trie
{
    private $root;
    private $size;

    /**
     * Initialize your data structure here.
     */
    function __construct()
    {
        $this->root = new TrieNode();
        $this->size = 0;

    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($word)
    {
        if (strlen($word) == 0) {
            return;
        }
        $cur = $this->root;
        for ($i=0; $i<strlen($word); $i++) {
            $char = substr($word, $i, 1);
            if (!isset($cur->next[$char])) {
                $cur->next[$char] = new TrieNode();
            }

            $cur = $cur->next[$char];
        }
        if (!$cur->isWord) {
            $cur->isWord = true; // 最后一个字符，代表已经是单词的结尾
            $this->size++;
        }
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word)
    {
        $cur = $this->root;
        for ($i=0; $i<strlen($word); $i++) {
            $char = substr($word, $i, 1);
            if (!isset($cur->next[$char])) {
                return false;
            }
            $cur = $cur->next[$char];
        }
        return $cur->isWord;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix)
    {
        $cur = $this->root;
        for ($i=0; $i<strlen($prefix); $i++) {
            $char = substr($prefix, $i, 1);
            if (!isset($cur->next[$char])) {
                return false;
            }
            $cur = $cur->next[$char];
        }
        return true;
    }
}
class TrieNode
{
    public $isWord;
    public $next;

    public function __construct($isWord = false)
    {
        $this->isWord = $isWord;
        $this->next = null;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */