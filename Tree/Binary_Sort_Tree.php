<?php
/**
 * Created by IntelliJ IDEA.
 * User: caoxiang
 * Date: 2019-04-04
 * Time: 11:06
 */

//首先根节点值得判断，搜索值小于根节点，搜索右子树，反之搜索左子树

class Binary_Sort_Tree{
    public static $search_path=[];

    public $binary_tree;

    public $i;

    public $search;

    public function __construct($binary_tree,$i,$search)
    {
        $this->binary_tree = $binary_tree;
        $this->i = $i;
        $this->search = $search;
    }

    public function run(){
        $result = $this->binary_search_item($this->binary_tree,$this->i,$this->search);
        return $result;
    }
    function binary_search_item($binary_tree,$i,$search){
        if(empty($binary_tree)){
            return false;
        }else{
            //记录每次节点比较的值
            if(isset($binary_tree[$i])){
                array_push(self::$search_path,$i);
            }
            if(!isset($binary_tree[$i])){
                return false;
            }else if($binary_tree[$i] == $search){
                return $i;
            }else if($search > $binary_tree[$i]){
                $right = 2 * ($i + 1) ;
                $result = $this->binary_search_item($binary_tree,$right,$search);
                return $result;
            }else if($search < $binary_tree[$i]){
                $left = 2 * ($i + 1)-1;
                $result = $this->binary_search_item($binary_tree,$left,$search);
                return $result;
            }else{
                return false;
            }
        }
    }

    public function getSearchPath(){
        $item_path = [];
        foreach (self::$search_path as $v){
            array_push($item_path,$this->binary_tree[$v]);
        }
        return implode('->',$item_path);
    }
}

// 搜索二叉树
$binary_tree = [
    0 => 45,
    1 => 12,
    2 => 53,
    3 => 3,
    4 => 37,
    5 => null,
    6 => 100,
    7 => null,
    8 => null,
    9 => 24,
    10 => null,
    11 => null,
    12 => null,
    13 => 61,
    14 => null
];
$binary_sort_tree = new Binary_Sort_Tree($binary_tree,0,61);
$index = $binary_sort_tree -> run();
var_dump($index);
$path = $binary_sort_tree ->getSearchPath();
var_dump($path);