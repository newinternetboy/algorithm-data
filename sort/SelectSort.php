<?php
/**
 * Created by IntelliJ IDEA.
 * User: philipp
 * Date: 2018-12-26
 * Time: 15:53
 */

/**
 * Class SelectSort
 * 将待排序的部分最小或者最大值进行筛选出来和已排序的最后一位交换
 */
class SelectSort{
    protected $data;
    protected $count;
    protected $index=0;
    protected $min_index = 0;
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->count = count($data);
    }

    public function run(){
        //共需要交换$this->count-1次
        $this->initital();
        for($i=1;$i<$this->count-1;$i++){
            $this->getMinIndex($this->index,$this->data);
            if($this->index != $this->min_index){
                $this->swap($this->data[$this->index],$this->data[$this->min_index]);
            }
            $this->index++;
        }
        return $this->data;
    }

    public function initital(){
        $this->getMinIndex($this->index,$this->data);
        $this->swap($this->data[0],$this->data[$this->min_index]);
        $this->index++;
    }

    public function getMinIndex($index,$data){
        $min = $data[$index];
        //从指定下标开始找数组中的最小值
        foreach ($data as $key => $value){
            if($key > $index && $value < $min){
                //记录最小值的下标
                $min_index = $key;
            }
        }
        $this->min_index = isset($min_index) ? $min_index : $index;
    }

    //交换已经排序的最后一位，和未排序中最小值
    public function swap(&$end,&$min){
        list($end,$min) = [$min,$end];
    }
}

$arr = (new SelectSort([2,1,5,8,6,0.1,10]))->run();
print_r($arr);