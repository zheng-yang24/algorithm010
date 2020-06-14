<?php

class ListNode {
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        if ($l1 === null) return $l2;
        if ($l2 === null) return $l1;

        if ($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
            return $l1;
        } else {
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }
}

// $test = new Solution();

// $l1 = new ListNode(1,new ListNode(2,new ListNode(4,null)));
// $l2 = new ListNode(1,new ListNode(3,new ListNode(4,null)));

// $a = $test->mergeTwoLists($l1,$l2);
// print_r($a);