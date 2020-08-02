<?php
class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function reverseBits($n) {
        $ret = 0;
        $power = 31;
        while ($n) {
            $ret += ($n & 1) << $power;
            $n = $n >> 1;
            $power -= 1;
        }
        return $ret;
    }
    // 参考官方题解
    // 空间复杂度O(1)
    // 事件复杂度O(logN),因为$n >> 1
}