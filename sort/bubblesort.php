<?php
/**
 * Created by IntelliJ IDEA.
 * User: caoxiang
 * Date: 2018/12/12
 * Time: 下午3:50
 */
/**
 * 1 冒泡排序：将每个数字a和剩余其他数字b比较,(升序)如果a>b,那么交换a和b的位置
 * @param $arr
 */
function bubblesort($arr){
    $arr_length = count($arr);
    //轮数
    for ($i=1;$i<$arr_length;$i++){
        //美轮比较的次数
        for($j=0;$j<$arr_length-$i;$j++){
            if($arr[$j]>$arr[$j+1]){
                $temp     = $arr[$j];
                $arr[$j]=$arr[$j+1];
                $arr[$j+1]  = $temp;
            }
        }
    }
    return $arr;
}
$result = bubblesort([2,1,3,9,5,6]);
print_r($result);

//practice  2019-04-02
$arr = [3,2,1,8,3,2];
$length = count($arr);
for ($i=0;$i<$length;$i++){
    for($j=0;$j<$length;$j++){
        if($i!=$j && $arr[$i]<$arr[$j]){
            list($arr[$j],$arr[$i]) = [$arr[$i],$arr[$j]];
        }
    }
}
print_r($arr);