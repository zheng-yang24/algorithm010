<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function countSubstrings($s) {
        // 1 历史数组含义
        // dp[i][j]表示从i位置到j位置的字符串是否为回文，1或者0
        // 2 为数组赋初值
        // 考虑单字符的情况，单字符是回文 i>j的情况不考虑
        $len = strlen($s);
        for($i=0;$i<$len;$i++){
            $dp[$i][$i]=1;
        }
        // 3 数组元素关系式
        // 1）当前字符相同，取决于i+1.j-1的字符串是否为回文
        // 2）当前字符不同，不是回文
        // 特别的，考虑j-i=1两个索引相邻的情况，i+1.j-1不合理，所以直接判断如果相邻且字符相等，为1，否则为0
        // 考虑到i+1.j-1未赋值的情况，从右下往上计算

        for($i=$len-1;$i>=0;$i--){
            for($j=$i+1;$j<$len;$j++){
                if($s[$i]==$s[$j]){
                    if($j-$i==1){
                        $dp[$i][$j] = 1;
                    }else{
                        $dp[$i][$j] = $dp[$i+1][$j-1];
                    }
                }else
                    $dp[$i][$j] = 0;
            }
        }
        $sum=0;
        for($i=0;$i<$len;$i++){
            $sum+=array_sum($dp[$i]);
        }
        return $sum;
    }
}