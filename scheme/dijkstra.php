<?php
/**
 * Created by IntelliJ IDEA.
 * User: caoxiang
 * Date: 2019-03-21
 * Time: 10:40
 */
/**
 *带权有向图dijkstra(迪杰斯特拉)算法
 * 时间复杂度O(n^2)
 * 思路：
 * 1 将图的顶点分成两部分，S(最短路径顶点集)，U(除了S集以外的顶点集)
 * 2 v到S中顶点距离小于v到U中任意顶点距离
 * 3 v到U中顶点的最小距离，那么该路径必定过S中顶点
 * 步骤：
 * 1 初始时，S只包含源点，S={v},v的距离为0.U包含除v以外的其他顶点，即U={其余顶点}，若v与U中顶点u有边，则<u,v>有权值，不是临接点权值为无穷。
 * 2 从U中选取一个距离v最小的顶点k，加入S中(距离为v到k的最短距离)。
 * 3 以k为中间点，从源点到u点的距离m(经过中间点k)，nm(不经过中间点k)，如果m<nm,那么需要修改u点的权(经过中间点边的权之和)，并将u加入S中。
 * 4 重复2，3步骤直到所有的顶点都包含在S中。
 * 最终要的思想：
 *  通过边来松弛v到其他顶点的路程
 */
class Dijkstra{
    const MAXINT = 32767;
    const MAXNUM = 6;
    private $v;
    public static $dist;
    public function __construct($v)
    {
        $this->v = $v;
        self::$dist = [];
    }

    //该矩阵表示图之间顶点的连接关系及权值
    private static $map = [
        [0,self::MAXINT,10,self::MAXINT,30,100],
        [self::MAXINT,0,5,self::MAXINT,self::MAXINT,self::MAXINT],
        [self::MAXINT,self::MAXINT,0,50,self::MAXINT,self::MAXINT],
        [self::MAXINT,self::MAXINT,self::MAXINT,0,self::MAXINT,10],
        [self::MAXINT,self::MAXINT,self::MAXINT,20,0,60],
        [self::MAXINT,self::MAXINT,self::MAXINT,self::MAXINT,self::MAXINT,0]
    ];

    public function Dijkstra(){
        if($this->v >= self::MAXNUM){
            throw new \Exception("图的最大阶".self::MAXNUM."顶点的下标范围:0~".(self::MAXNUM-1));
        }

        $n = self::MAXNUM;
        $s = [];
        //S集合点数组初始化
        for($i = 0; $i<$n; $i++){
            $s[$i] = false;
            //初始化v0到其他点的距离(理论)
            self::$dist[$i] = self::$map[$this->v][$i];
        }

        self::$dist[$this->v] = 0;//该点到自己距离初始化0
        $s[$this->v] = true;//将点v0初始化到S中

        for($i =0; $i<$n; $i++){
            $mindist = self::MAXINT;
            //找到离v最近的顶点$u
            for($j=0; $j<$n; $j++){
                if(empty($s[$j]) && self::$dist[$j] < $mindist){
                    $mindist = self::$dist[$j];
                    $u = $j;
                }
            }
            $s[$u] = true;
            //更新其他点以S中点为中间点的最短距离
            for ($v=0; $v<$n; $v++){
                if(self::$map[$u][$v] < self::MAXINT && self::$map[$u][$v] + self::$dist[$u] < self::$dist[$v]){
                    //最短路径递增
                    self::$dist[$v] = self::$dist[$u] + self::$map[$u][$v];
                }
            }
        }
    }
}

$dj = new Dijkstra(0);
$dj -> Dijkstra();
print_r(Dijkstra::$dist);