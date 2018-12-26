<?php
/**
 * Created by IntelliJ IDEA.
 * User: philipp
 * Date: 2018-12-25
 * Time: 19:42
 */

/**
 * Class HeapSort
 * 大根堆特点
 * 子节点的数据不大于父节点，那么最上面的节点数据一定是该数组中最大的
 * 主要是利用大堆的特点，每一次构建好大堆之后就可以进行最大数据的抽离(首位)，然后递归处理剩余数据堆的创建
 */
class HeapSort{
    protected $data;
    protected $count;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->count = count($data);
    }

    public function run(){
        $this->createHeap();
        while ($this->count > 0){
            $this->swap($this->data[0],$this->data[--$this->count]);
            //初始化完成后，并交换首节点（最大的值）到末尾
            //然后从元素组下标为0，$this->count-1之间的数据进行堆构建
            $this->buildHeap($this->data,0,$this->count);
        }
        return $this->data;
    }

    public function createHeap(){
        //第一次初始化大堆，从数组中间节点开始构建堆
        $i = floor($this->count / 2) + 1;
        while($i--){
            $this->buildHeap($this->data,$i,$this->count);
        }
    }

    public function buildHeap(array &$data,$i,$count){
        if(false===$i<$count){
            return ;
        }
        //most important
        $left   =   ($right= 2*$i + 1) + 1;
        $max    =   $i;
        //左节点大于父节点，记录左节点的位置
        if($left < $count && $data[$left] > $data[$i]){
            $max    =   $left;
        }
        //右节点大于父节点，记录右节点的位置
        if($right < $count && $data[$right] > $data[$max]){
            $max    =   $right;
        }

        if($max !== $i && $max < $count){
            //交换基准节点和最大节点的位置
            $this->swap($data[$i],$data[$max]);
            //以最大节点的位置节点为基准节点，递归堆得创建
            //最大链(依次按照最大值组成的链，降序排列)
            $this->buildHeap($data,$max,$count);
        }
    }

    public function swap(&$left,&$right){
        list($left,$right) = [$right,$left];
    }
}

$array  = array (4, 21, 41);
$result = (new HeapSort($array))->run();
var_dump($result);