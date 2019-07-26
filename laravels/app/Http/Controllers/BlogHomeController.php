<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/6/27
 * Time: 14:42
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogHomeController extends Controller
{
    public function index(Request $request)
    {
        $data = array();
        $data['name']=isset($request->name)?$request->name:'';
        $data['a']=isset($request->a)?$request->a:'';
        return view('blog_home', $data);
    }
}