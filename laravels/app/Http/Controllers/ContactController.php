<?php

namespace App\Http\Controllers;

use App\Model\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public $contact;
    public function __construct()
    {
        $this->contact=new Contact();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //
        $data=array();
        $data['name']=$request->input('name');
        $data['email']=$request->input('email');
        $data['subject']=$request->input('subject');
        $data['message']=$request->input('message');
        $data['created_at']=date('Y-m-d h:i:s', time());
        $data['updated_at']=date('Y-m-d h:i:s', time());
        if(Auth::check()){
            $id = Auth::id();
            $data['user_id']=$id;
            if($this->contact->addContact($data)){
                return response()->json([
                    'msg'=>'提交成功','status'=>'200']);
            }else{
                return response()->json([
                    'msg'=>'提交失败','status'=>'250']);
            }
        }else{
            return response()->json([
                'msg'=>'您还未登录','status'=>'240']);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
