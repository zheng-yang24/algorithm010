<?php
// 暴力法，两个循环，时间复杂度为O(n^2)
//class Solution {
//
//    /**
//     * @param Integer[] $nums
//     * @param Integer $target
//     * @return Integer[]
//     */
//    function twoSum($nums, $target) {
//        for ($i = 0; $i < count($nums)-1; $i ++) {
//            for ($j = $i+1; $j < count($nums); $j ++) {
//                if ($nums[$j] == $target - $nums[$i]) {
//                    return [$i,$j];
//                }
//            }
//        }
//    }
//}

// java的哈希表，类似暴力求解法，可以分为一遍hash和两遍hash
// 两遍hash，第一遍把所有数存入hashmap中，第二遍循环遍历hashmap中是否有target-i的数，且不是i本身，时间复杂度O(n)
// 一遍hash，一边遍历，一边比较是否存在hashmap中

// 使用一个辅助哈希表，用数组实现，一遍hash法
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $hash = [];
        for ($i = 0; $i < count($nums); $i ++) {
            $diff = $target - $nums[$i];
            if (isset($hash[$diff])) {
                return [$i, $hash[$diff]];
            }
            $hash[$nums[$i]] = $i;
        }
    }
}
