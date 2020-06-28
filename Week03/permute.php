<?php
//class Solution {
//
//    /**
//     * @param Integer[] $nums
//     * @return Integer[][]
//     */
//    function permute($nums) {
//        $this->perm($nums,0,count($nums)-1);
//        return $this->result;
//    }
//
//    public $result;
//
//    function swap(&$arr,$p,$q){
//        $temp=$arr[$p];
//        $arr[$p]=$arr[$q];
//        $arr[$q]=$temp;
//    }
//    function perm($arr,$p,$q){
//        if($p==$q){
//            $this->result[]=$arr;
//            return;
//        }
//        for($i=$p;$i<=$q;$i++){
//            $this->swap($arr,$p,$i);
//            $this->perm($arr,$p+1,$q);
//            $this->swap($arr,$p,$i);
//        }
//    }
//}

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $this->backtracking($nums, []);
        return $this->res;
    }
    function backtracking($nums, $arr) {
        if (count($arr) == count($nums)) {
            $this->res[] = $arr;
            return;
        }

        foreach ($nums as $value) {
            if (!in_array($value, $arr)) {
                $arr[] = $value;
                $this->backtracking($nums, $arr);
                array_pop($arr);
            }
        }
    }
}