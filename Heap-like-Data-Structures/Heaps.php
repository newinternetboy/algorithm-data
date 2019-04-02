<?php
/**
 * Created by IntelliJ IDEA.
 * User: caoxiang
 * Date: 2019-04-02
 * Time: 14:15
 */

/**
 * Class Heaps
 * 最小堆排序min heap
 * 每一次最小堆的构建，根节点都是最小值。只需在每次最小堆构建完成后，取出根节点。在将剩余的节点递归构建堆处理即可。
 * 1 首先利用最小堆的这种数据结构的特点，子节点不小于父节点的特性，最小堆构建后，根节点就是最小值
 * 2 构建最小堆：子节点中最小的和父节点互换，然后对子节点的子树递归构建最小堆
 * 3 最小堆构建完成后，就可以完成数据的抽取和排序
 */
class Heaps
{
    public $data;

    public $length;

    public static $sorted_arr=[];


    public function run($data){
        $this->length = count($data);
        $this->data = $data;
        for ($i=0;$i<$this->length-1;$i++){
            $this->min_heap($i);
        }
    }

    /**
     * @param $i
     * 一个节点最小堆的构建
     */
    public function min_heap($i){
        $l = 2*($i+1)-1;
        $r = 2*($i+1);
        $smallest = $i;
        if($l < $this->length && $this->data[$l] < $this->data[$smallest]){
            $smallest = $l;
        }

        if($r < $this->length && $this->data[$r] < $this->data[$smallest]){
            $smallest = $r;
        }

        if($smallest == $i){
            return ;
        }
        list($this->data[$i], $this->data[$smallest]) = [$this->data[$smallest],$this->data[$i]];
        //继续递归调整下面的排序,最小值节点子节点堆的构建
        $this->min_heap($smallest);
    }

    public function get_data(){
        if(count($this->data) >1){
            $first = array_shift($this->data);
            array_push(self::$sorted_arr,$first);
            if(count($this->data)!=0) {
                $this->run($this->data);
                $this->get_data();
            }
        }else{
            print_r(self::$sorted_arr);
        }
    }
}

$heap = new Heaps();
$heap -> run([2,1,3,5,4,9,8,3.2]);
$heap->get_data();