<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/7/9
 * Time: 14:23
 */
class Node{
    public $name;
    public $no;
    public function __construct($data)
    {
        $this->name=$data['name'];
        $this->no=$data['no'];
        $this->next=NULL;
    }


}
class SingleLinkList{
    private $header;
    function __construct($data)
    {
        $this->header=new Node($data);
    }
    public function find($item){
        $current=$this->header;
        while($current->name!=$item['name']){
              $current=$current->next;
        }
        return $current;
    }
    public function findPrevious($item){
        $current=$this->header;
        while($current->next!=null&&$current->name!=$item['name']){
            $current=$current->next;
        }
        return $current;
    }

    public function addHeader($items,$new){
        $newNode=new Node($new);
        $current=$this->find($items);
        $newNode->next=$current->next;
        $current->next=$newNode;
        return true;
    }
    public function update($old,$new){
     $current=$this->header;
        while($current->next!=null){
          if($current->name=$old['name']){
              break;
          }
          $current=$current->next;
        }
         $current->name=$new['name'];
         $current->no=$new['no'];
    }
    public function delete($old){
        $previous=$this->findPrevious($old);
    if($previous->next!=null){
        $previous->next=$previous->next->next;
     }
    }
}