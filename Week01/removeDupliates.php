<?php 
class Solution1 {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        if ($nums == null || count($nums) == 0) {
            return 0;
        }
        $sub = 0;
        for ($pre = 1; $pre < count($nums); $pre++) {
            if($nums[$sub] != $nums[$pre]){
                $sub++;
                $nums[$sub] = $nums[$pre];
            }
        }
        return $sub+1;
    }
}

/*
执行结果：
通过
显示详情
执行用时 :
28 ms
, 在所有 PHP 提交中击败了
63.30%
的用户
内存消耗 :
16.9 MB
, 在所有 PHP 提交中击败了
100.00%
的用户
*/

class Solution2 {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        if ($nums == null || count($nums) == 0) {
            return 0;
        }
        $total = count($nums);
        for ($i = $total; $i > 0; $i--) {
            if($nums[$i-1] === $nums[$i-2]){
                unset($nums[$i-1]);
                $total--;
            }
        }
        return $total;
    }
}

/*
执行用时 :
24 ms
, 在所有 PHP 提交中击败了
86.76%
的用户
内存消耗 :
16.8 MB
, 在所有 PHP 提交中击败了
100.00%
的用户
*/