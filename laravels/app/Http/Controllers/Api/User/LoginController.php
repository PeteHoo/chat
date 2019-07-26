<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/7/23
 * Time: 15:10
 */
class LoginController extends Controller
{    public $user;
    public function __construct()
    {
        $this->user=new User();
    }


    public function emailLogin(Request $request)
    {
        if (!$request->has('email') || !$request->has('password')) {
            return json_encode([
                'code' => 250,
                'msg' => '邮箱｜密码不能为空'
            ]);
        }
        if (!Auth::attempt(['email' => trim($request->input('email')), 'password' => trim($request->input('password'))])) {
            return json_encode([
                'code' => 250,
                'msg' => '登录失败，邮箱或密码错误'
            ]);
        }
        $user = Auth::user();
        return json_encode([
            'code' => 200,
            'msg' => '登录成功',
            'token' => $user->getRememberToken(),
            'u' => $user->id
        ]);
    }

    public function nameLogin(Request $request)
    {
        if (!$request->has('name') || !$request->has('password')) {
            return json_encode([
                'code' => 250,
                'msg' => '用户名｜密码不能为空'
            ]);
        }
        if (!Auth::attempt(['name' => trim($request->input('name')), 'password' => trim($request->input('password'))])) {
            return json_encode([
                'code' => 250,
                'msg' => '登录失败，用户名或密码错误'
            ]);
        }
        $user = Auth::user();
        return json_encode([
            'code' => 200,
            'msg' => '登录成功',
            'token' => $user->getRememberToken(),
            'u' => $user->id
        ]);
    }

    public function phoneLogin(Request $request)
    {
        $phone = $request->input('phone');
        $code = $request->input('code');
        return $this->user->phoneLoginFunction($phone, $code);

    }




}