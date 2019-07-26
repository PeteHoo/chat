<?php

namespace App\Http\Controllers\News;

use App\Model\Comment;
use App\Model\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public $news=null;
    public $comment=null;
    public function __construct()
    {
        $this->news=new News();
        $this->comment=new Comment();
    }

    //
    public function index(){
        $data['news_list']=$this->news->news_list();
        return view('archive',$data);
    }
    public function newsDetail(Request $request){
        $id=$request->input('id');
        $data['news_detail']=$this->news->news_detail($id);
        $data['news_comment']=$this->comment->getCommentList($data['news_detail']->id,0);
        if(Auth::check()){
            $data['user']=Auth::user();
        }

        $type=$request->input('type');
        if($type=='json'){
            return response()->json($data);
        }
        if($data['news_detail']){
            return view('single',$data);
        }else{
            return view('home');
        }
    }
}
