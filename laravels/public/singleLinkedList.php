<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/7/9
 * Time: 15:33
 */

 class Student{
   public $name;
   public $id;
   public $next;
   public function __construct($name='',$id='')
   {
        $this->name=$name;
        $this->id=$id;
        $this->next=null;
   }
}

class SingleLinkedStudent{
    private $header;
    public function __construct()
    {
        $this->header=new Student();
    }
    //获取链表头
    public function getHeader(){
        return $this->header;
    }
    //链表头插
    public function addHeader($new){
        $new->next=$this->header->next;
        $this->header->next=$new;
        return $this->header->next;
    }
    //链表尾插
    public function addCaudal($new){
        $current=$this->header;
        while($current->next!=null){
            $current=$current->next;
        }
        $current->next=$new;
        return $current->next;
    }
    //获取节点
    public function getCurrent($old){
        $current=$this->header;

        while($current->id!=$old->id){
            $current=$current->next;
        }
        return $current;
    }
    public function addMiddle($old,$new){
        if(!$old){
            echo '原始节点不能为空';
            die;
        }
        if(!$new){
            echo '添加节点不能为空';
            die;
        }
        $current=$this->getCurrent($old);
        $new->next=$current->next;
        $current->next=$new;
    }
    //展示链表
    public function show(){
        $current=$this->header->next;
        if($current==null){echo '链表为空';die;}
        while($current->next){
            echo $current->name;
            echo '->';
            $current=$current->next;
        }
        echo $current->name;
    }

}

$singleLinkedStudent=new SingleLinkedStudent();
//$singleLinkedStudent->addHeader(new Student('PeteHoo',1));
//$singleLinkedStudent->addHeader(new Student('PT',2));
//$singleLinkedStudent->addHeader(new Student('PTT',3));
$singleLinkedStudent->addCaudal(new Student('PeteHoo',1));
$singleLinkedStudent->addCaudal(new Student('PT',2));
$singleLinkedStudent->addCaudal(new Student('PTT',3));
$singleLinkedStudent->addMiddle(new Student('PT',2),new Student('PTTTT',4));
//var_dump($flag);
//$singleLinkedStudent->show();

$splDoubleLinkedList=new SplDoublyLinkedList();

$student1=new Student('HHHH',1);
$student2=new Student('PPPP',2);
$student3=new Student('TTTT',3);
$student4=new Student('SSSS',4);
$splDoubleLinkedList->add(0,$student1);
$splDoubleLinkedList->add(1,$student2);
$splDoubleLinkedList->add(2,$student3);
$splDoubleLinkedList->add(3,$student4);
//echo $splDoubleLinkedList->count();
//echo $splDoubleLinkedList->current();

$splDoubleLinkedList->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO | SplDoublyLinkedList::IT_MODE_KEEP);
$splDoubleLinkedList->rewind();
//var_dump($splDoubleLinkedList->top());
//$splDoubleLinkedList->next();
//var_dump($splDoubleLinkedList->key());

foreach ($splDoubleLinkedList as $k=>$v){
    echo $v->name.' '.$v->id.'<br/>';
}

//echo json_encode($singleLinkedStudent->getHeader());

?>