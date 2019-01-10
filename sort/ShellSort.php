<?php
/**
 * Created by IntelliJ IDEA.
 * User: philipp
 * Date: 2019-01-10
 * Time: 14:03
 */

/**
 * Class ShellSort
 * 希尔排序
 * 思想
 * 1 将数据分组，每组的数据进行插入排序
 * 2 分组的增量逐次减少，目前设置的是对半向下取整
 */
class ShellSort
{
    private $data;
    private $count;
    //data
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->count = count($data);
    }

    public function swap(&$left,&$right){
        list($left,$right) = [$right,$left];
    }

    public function run(){
        //增量
        $gap = floor($this->count / 2);
        //当$gap等于1的时候就已经完成了排序
        while ($gap > 0){
            //从下标为$gap的位置开始向后处理数据，一组的数据就是间隔为$gap的数值集
            for($i = $gap;$i < $this->count;$i++){
                //根据增量分组之后的所有数据都进行插入排序
                for($j = $i-$gap; $j >= 0 && $this->data[$j]>$this->data[$j+$gap]; $j-=$gap)
                {
                    $this->swap($this->data[$j],$this->data[$j+$gap]);
                }
            }
            //缩小增量
            $gap = floor($gap / 2);
        }
        return $this->data;
    }
}

$result = (new ShellSort([2,3,1,0.1,0.2,10,8]))->run();
var_dump($result);