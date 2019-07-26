<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    //
    public function addComment($data){
       return DB::table('comments')->insert($data);
    }

    private function getChildCommentById($comment_id,$news_id,$level){

        $data=DB::table('comments')->where('news_id',$news_id)->where('status',1)->where('parent_id',$comment_id)->where('level',$level)->get();
        foreach ($data as $k=>$v){
            if($v->from_user_id>0){
                $user_db=DB::table('users');
                $data[$k]->from_name=$user_db->where('id',$v->from_user_id)->first()->name;
            }
            if($v->to_user_id>0){
                $user_db=DB::table('users');
                $data[$k]->to_name=$user_db->where('id',$v->to_user_id)->first()->name;
            }
        }
       return $data;
    }

    public function getCommentList($news_id,$level,$coments_id=0,&$array=array()){
        if(empty($news_id)){
            return array();
        }
        $array=$this->getChildCommentById($coments_id,$news_id,$level);
        $level++;
        if(count($array)>=1){
            foreach($array as $k=>$v){
                $array[$k]->child=$this->getCommentList($news_id,$level,$v->id,$v);
            }
        }
        return $array;
    }
}
