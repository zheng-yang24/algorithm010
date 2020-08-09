<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function validPalindrome($s) {
        $n = strlen($s);
        if ($n <= 2) return true;
        $left = 0;
        $right = $n - 1;
        while ($left < $right) {
            if ($s[$left] == $s[$right]) {
                $left++;
                $right--;
            } else {
                return $this->isPalindrome($s, $left + 1, $right)
                    || $this->isPalindrome($s, $left, $right - 1);
            }
        }
        return true;
    }

    private function isPalindrome($s, $left, $right)
    {
        while ($left < $right) {
            if (substr($s, $left, 1) !== substr($s, $right, 1)) return false;
            $left++;
            $right--;
        }

        return true;
    }
}