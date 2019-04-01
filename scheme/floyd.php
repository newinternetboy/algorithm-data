<?php
/**
 * Created by IntelliJ IDEA.
 * User: caoxiang
 * Date: 2019-03-22
 * Time: 14:26
 */
/**
 * 弗洛伊德算法(每对顶点的最短距离)
 * 时间复杂度:o(n^3)
 * 适用范围：有向带权图
 * 经典的多源最短路径算法
 * 方法2：每对顶点之间的最短距离(可以以每个点为源点，重复执行迪杰斯特拉算法n次，既可以算出每对顶点之间的最短距离，时间复杂度O(n^3))
 */
class Floyd{
    const MAXINT=32767;

    public static $map = [
        [0,4,11],
        [6,0,2],
        [3,self::MAXINT,0]
    ];

    public $map_d=[];

    public function run(){
        $n = count(self::$map);
        $map_result = self::$map;
        for ($i=0;$i<$n;$i++){
            for ($j=0;$j<$n;$j++){
                //中间点
                for ($k=0;$k<$n;$k++){
                    //i-k-j<i-j
//                    echo $i.'->'.$k.'->'.$j."\n";
                    if(self::$map[$i][$k]<self::MAXINT && self::$map[$k][$j]<self::MAXINT & self::$map[$i][$k]+self::$map[$k][$j]<self::$map[$i][$j]){
                        $map_result[$i][$j] = $map_result[$i][$k]+$map_result[$k][$j];
                    }
                }
            }
        }
        print_r($map_result);
    }
}

$floyd = new Floyd();
$floyd -> run();




