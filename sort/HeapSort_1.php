<?php
/**
 * Created by IntelliJ IDEA.
 * User: philipp
 * Date: 2018-12-26
 * Time: 10:16
 */

/**
 * Class HeapSort_1
 * 大堆排序特点：叶子结点不大于父节点
 * 这个是自己理解透了之后重写的，数组中节点和左右节点直接的索引关系
 * $left = 2*$i + 1
 * $right = $left + 1;
 */
class HeapSort_1{
    protected $data;
    protected $count;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->count = count($data);
    }

    public function run(){
        //第一次堆构建
        $this->createHeap();
        while($this->count > 0){
            $this->swap($this->data[0],$this->data[--$this->count]);
            $this->buildHeap($this->data,0,$this->count);
        }
        return $this->data;
    }

    public function createHeap(){
        $i = floor($this->count / 2) + 1;
        while ($i--){
            $this->buildHeap($this->data,$i,$this->count);
            echo '###############'.$i."\n";
            print_r($this->data);
            echo '###############'.$i."\n";
        }
    }

    public function buildHeap(&$data,$i,$count){
        if(false === $i < $count){
            return ;
        }
        $max = $i;
        //fix-节点构造
        $left = ($right = 2 * $i + 2) - 1;
        //比较左节点与$i节点的大小
        if($left<$count && $data[$left] > $data[$max]){
            $max = $left;
        }
        //比较右节点与$i节点的大小
        if($right<$count && $data[$right] > $data[$max]){
            $max = $right;
        }

        //如果最大值不是$i节点本身，那么就交换$i,$max
        if($i!==$max){
            $this->swap($data[$i],$data[$max]);
            //继续处理$max节点位置的子节点(通过构建堆来实现数据的比较与互换)
            $this->buildHeap($data,$max,$count);
        }
    }

    public function swap(&$left,&$right){
        list($right,$left) = array($left,$right);
    }
}

$arr = (new HeapSort_1([3,2,1,4,5,1]))->run();
var_dump($arr);