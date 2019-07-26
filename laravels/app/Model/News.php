<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    //
    protected $table='news';

    /**
     * 获取新闻列表
     */
    public function news_list(){
        $data=$this::all();
        foreach ( $data as $k=>$v){
            $data[$k]['Pic']=config('admin.upload.host').$v['Pic'];
        }
        return $data;
    }
    public function news_detail($id){

        if($id){
            $news_detail=DB::table('news')->where('id',$id)->first();
                $news_detail->Pic=config('admin.upload.host').$news_detail->Pic;

        }else{
            $news_detail=DB::table('news')->first();
            $news_detail->Pic=config('admin.upload.host').$news_detail->Pic;
        }

        return $news_detail;
    }
}
