<?php
class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfTwo($n) {
        // 二进制有且只能有一个1
        return $n > 0 && ($n & ($n - 1)) == 0;
    }
}