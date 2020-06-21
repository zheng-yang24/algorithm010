<?php

// 排序解法
//class Solution {
//
//    /**
//     * @param String $s
//     * @param String $t
//     * @return Boolean
//     */
//    function isAnagram($s, $t) {
//        if (strlen($s) != strlen($t)) {
//            return false;
//        }
//        $s = str_split($s,1);
//        $t = str_split($t,1);
//        sort($s);
//        sort($t);
//        return $s == $t;
//    }
//}

// 也可以设置一个类似java的hash辅助表，hash用数组实现，字符串长度肯定是相等的，在这种情况下，一次循环两个字符串，统计字符出现的个数
//class Solution {
//
//    /**
//     * @param String $s
//     * @param String $t
//     * @return Boolean
//     */
//    function isAnagram($s, $t) {
//        if (strlen($s) != strlen($t)) {
//            return false;
//        }
//
//        $hash = [];
//        for ($i = 0; $i < strlen($s); ++$i) {
//            if (!isset($hash[$s[$i]])) {
//                $hash[$s[$i]] = 1;
//            } else {
//                $hash[$s[$i]]++;
//            }
//
//            if (!isset($hash[$t[$i]])) {
//                $hash[$t[$i]] = -1;
//            } else {
//                $hash[$t[$i]]--;
//            }
//        }
//
//        foreach ($hash as $v) {
//            if ($v != 0) {
//                return false;
//            }
//        }
//
//        return true;
//    }
//}

//php内置函数count_chars
//内置函数array_count_values

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        return count_chars($s, 1) == count_chars($t, 1);
    }
}

//class Solution {
//
//    /**
//     * @param String $s
//     * @param String $t
//     * @return Boolean
//     */
//    function isAnagram($s, $t) {
//        return array_count_values(str_split($s, 1)) == array_count_values(str_split($t, 1));
//    }
//}

// 如果输入字符串包含 unicode 字符怎么办？