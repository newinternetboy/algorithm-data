<?php
/**
 * Created by IntelliJ IDEA.
 * User: caoxiang
 * Date: 2018/12/12
 * Time: 下午2:37
 */
//快速排序的思想
//1 设立基准数，比基准数小的放在左边，比基准数大的放在右边
//2 左右都向中间查找，左右查找相遇，将基准数和相遇的位置数互换，标志着第一次基准数数据排序终结
//3 之后递归处理基准左右两边的数组
/**
 * @param $arr 待排序的数组
 * @param $left 数组最左下标
 * @param $right 数组最右下标
 * j的作用就是找比基准小的数据，i就是找比基准大的数据，直到i与j相遇
 */
function quicksort(&$arr,$left,$right){
    if($left>$right){
        return ;
    }
    $i = $left;
    $j = $right;
    $temp = $arr[$left];
    while ($i != $j){
        //左边的先查找
        while ($arr[$j]>=$temp && $i<$j){
            $j--;
        }

        //开始右边数据查找
        while ($arr[$i]<=$temp && $i<$j){
            $i++;
        }
        //此时找到了基准两边的数据,交换数据
        if($i<$j){
            $bow = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $bow;
        }
    }
    //重新设立基准
    $arr[$left] = $arr[$i];
    $arr[$i] = $temp;
    quicksort($arr,$left,$i-1);
    quicksort($arr,$i+1,$right);
}
$arr = [4,0.5,2,1,3,5,7,0,9,12,11];
$result = quicksort($arr,0,count($arr)-1);
print_r($arr);
