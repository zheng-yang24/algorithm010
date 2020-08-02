<?php
class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function hammingWeight($n) {
        $count = 0;
        // while ($n) {
        //     $count += $n & 1;
        //     $n  = $n >> 1;
        // }
        // return $count;
        while ($n) {
            $count ++;
            $n &= ($n - 1);
        }
        return $count;
    }
}