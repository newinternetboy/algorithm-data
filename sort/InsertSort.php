<?php
/**
 * Created by IntelliJ IDEA.
 * User: philipp
 * Date: 2018-12-26
 * Time: 15:24
 */

/**
 * Class InsertSort
 * 插入排序
 * 1 从第二个元素开始的每个元素，首先和前面的元素进行比较
 * 11 如果小于前面的元素，则交换位置
 * 111 交换位置之后，需要用交换后的元素和前面的元素比较
 * 12 如果小于前面的元素，则跳过
 */
class InsertSort{

    protected $data;

    protected $count;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->count = count($data);
    }

    public function run(){
        for($i=0;$i<$this->count;$i++){
            $this->compare($i);
        }
        return $this->data;
    }

    public function compare($index){
        if(false === $index < $this->count || $index<=0 ){
            return ;
        }
        if($this->data[$index] < $this->data[$index-1]){
            //交换
            $this->swap($this->data[$index-1],$this->data[$index]);
            //继续递归比较
            $this->compare($index-1);
        }
    }

    public function swap(&$before,&$after){
        list($before,$after) = [$after,$before];
    }
}

$arr = (new InsertSort([3,2,3,5,6,1,9,8,0.1]))->run();
print_r($arr);

/**
 * 目前最简单的插入排序
 */
$data = [1,5,3,6];
//增量为1的插入排序
$final = count($data)-1;
while($final > 0){
    if($data[$final]<$data[$final-1]){
        //swap
        list($data[$final],$data[$final-1]) = [$data[$final-1],$data[$final]];
    }
    $final--;
}
