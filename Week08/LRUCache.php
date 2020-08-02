<?php
class LRUCache {
    // 双向链表
    // 哈希表
    private $cap = 0;
    private $hash = [];
    private $head;
    private $tail;

    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->cap = $capacity;
        $this->head = new Node(0, 0);
        $this->tail = new Node(0, 0);
        $this->head->next = $this->tail;
        $this->tail->pre = $this->head;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if (isset($this->hash[$key])) {
            $p = $this->hash[$key];
            $p->pre->next = $p->next;
            $p->next->pre = $p->pre;
            $this->head->next->pre = $p;
            $p->next = $this->head->next;
            $this->head->next = $p;
            $p->pre = $this->head;
            return $p->value;
        } else {
            return -1;
        }
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if (isset($this->hash[$key])) {
            $p = $this->hash[$key];
            $p->pre->next = $p->next;
            $p->next->pre = $p->pre;
            $this->head->next->pre = $p;
            $p->next = $this->head->next;
            $this->head->next = $p;
            $p->pre = $this->head;
            $p->value = $value;
        } else {
            $p = new Node($key, $value);
            $this->head->next->pre = $p;
            $p->next = $this->head->next;
            $this->head->next = $p;
            $p->pre = $this->head;
            if (count($this->hash) >= $this->cap) {
                $last = $this->tail->pre;
                $last->pre->next = $last->next;
                $last->next->pre = $last->pre;
                unset($this->hash[$last->key]);
            }
            $this->hash[$key] = $p;
        }
    }
}

class Node
{
    public $key;
    public $value;
    public $pre;
    public $next;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */