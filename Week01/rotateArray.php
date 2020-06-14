<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        if (count($nums) == 1 || $k == 0 || count($nums) == $k) {
            return $nums;
        } else {
            if (count($nums) < $k) {
                $k -= count($nums);
            }
            $nums = array_merge(array_slice($nums, 0 - $k, count($nums) - 1), array_slice($nums, 0, count($nums) - $k));
        }
        return $nums;
    }
}

/*
$test = new Solution();
$arr = [1,2,3];
$a = $test->rotate($arr,3);
print_r($a);

执行结果：
通过
显示详情
执行用时 :
16 ms
, 在所有 PHP 提交中击败了
89.86%
的用户
内存消耗 :
17.1 MB
, 在所有 PHP 提交中击败了
100.00%
的用户
*/