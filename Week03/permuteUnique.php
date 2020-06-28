<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
        $this->backtracking($nums, [], []);
        return $this->res;
    }
    function backtracking($nums, $arr, $dic) {
        if (count($arr) == count($nums)) {
            $this->res[] = $arr;
            return;
        }
        // 这一层级的临时变量，存储判断元素是否重复
        $map = [];
        foreach ($nums as $key => $value) {
            if (in_array($value, $map)) continue;
            if (in_array($key, $dic)) continue;
            array_push($map,$value);
            array_push($dic,$key);
            array_push($arr,$value);
            $this->backtracking($nums,$arr,$dic);
            array_pop($arr);
            array_pop($dic);
        }
    }
}