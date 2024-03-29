<?php
/**
 * Created by PhpStorm.
 * User: gwc
 * Date: 2019/7/09
 * Time: 16:40
 */

/**
 * Class Node
 */
class Node
{
    public $data;
    public $next;
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class SingleLinkedList
{
    public $header;

    public function __construct()
    {
        //初始化一个头结点
        $this->header = new Node(null);
    }

    /**
     * 头插入
     * @param $data
     */
    public function lpush($data)
    {

        //头结点不能动的   $cur 是不是就是头结点外的第一个元素
        $cur  = $this->header->next;
        //实例化一个新的节点 从头插入
        $newheader = new Node($data);
        //因为头部插入 是不是就是 新节点的next 要指向之前的第一个元素
        $newheader->next = $cur;
        //头结点指向新节点
        $this->header->next = $newheader;

    }

    /**
     * @param $data
     * 尾插入
     */
    public function rpush($data)
    {
        $newheader = new Node($data);

        $cur = $this->header->next;

        while ($cur->next!=null)
        {
            $cur = $cur->next;
        }
        $cur->next = $newheader;

    }

    /**
     *
     * @param $n 第几个节点插入
     * @param $data
     */
    public  function push($n,$data)
    {
        $cur = $this->header->next;
        $j = 0;//计数器
        if($n==0){
            $this->lpush($data);
        }else{
            while ($cur->next && $j<$n-1)
            {
                $cur = $cur->next;
                $j++;
            }
            if($cur==null)
            {
                echo "没有".$n.'节点';
            }else{
                $new = new Node($data);
                $new->next = $cur->next;
                $cur->next = $new;
            }
        }

    }

    /**
     * @param $n 要删除的节点
     * @return mixed
     */
    public function del($n){
        $cur = $this->header->next;
        if($n<0){
            echo '参数不合法';exit;
        }
        $j =0;
        if($n==0){
            $this->header = $cur->next;
            return $cur->data;

        }else{
            while ($cur->next!=null&&$j<$n-1){
                $cur = $cur->next;
                $j++;
            }
            if($cur->next == null){
                echo 1111111;
            }else{
                $curs = $cur->next;
                $cur->next = $curs->next;
                $res = $curs->data;
                unset($curs);
                return $res;
            }
        }

    }

    public  function  delAll()
    {
        $cur = $this->header->next;
        while ($cur->next != null)
        {
            $a =$cur->next;
            unset($cur);
            $cur = $a;
        }
        $this->header = new Node(null);
    }

    public function show()
    {
        $cur = $this->header->next;
        if($cur==null){
            echo "链表为空";
        }else{
            while(!is_null($cur->next)){

                echo $cur->data;
                echo '->';
                $cur = $cur->next;
            }
            echo $cur->data;
        }

    }
    //

}
$a  =  new SingleLinkedList();
$a->lpush('张三');
$a->rpush('王五');
$a->push('0','龚六');
$a->push('2','赵七');

$a->lpush('PeteHoo');
$a->show();


//if($l1==null){
//    return $l2;
//}
//if($l2==null){
//    return $l1;
//}
//$listnode=new ListNode(0);
//$temp=$listnode;
//while($l1!=null&&$l2!=null){
//    if($l1->val>$l2->val){
//        $temp->next=$l2;
//        $l2=$l2->next;
//    }
//    else if($l1->val<=$l2->val){
//        $temp->next=$l1;
//        $l1=$l1->next;
//    }
//    $temp=$temp->next;
//}
//if($l1==null){
//    $temp->next=$l2;
//}
//if($l2==null){
//    $temp->next=$l1;
//}
//return $listnode->next;
//}
