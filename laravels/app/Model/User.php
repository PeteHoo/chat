<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class User extends Model
{
    //
    public function phoneLoginFunction($phone, $code)
    {
        if (!$phone || !$code) {
            return json_encode([
                'code' => 250,
                'msg' => '手机号｜验证码不能为空'
            ]);
        }

        if (Session::get('' . $phone) != $code) {

            $result = DB::table('user_bind_connects')->where('bind_id', 'mobile_' . $phone)->first();
            if (!$result) {

            }
            $user_id = $result->user_id;
            $userInfo = DB::table('users')->where('id', $user_id)->first();
            $remember_token = md5(makeToken());
            DB::table('users')->where('id', $user_id)->update(['remember_token' => $remember_token]);
            return json_encode([
                'code' => 200,
                'msg' => '登录成功',
                'token' => $remember_token,
                'u' => $user_id
            ]);
        } else {
            return json_encode([
                'code' => 250,
                'msg' => '验证失败'
            ]);
        }

    }
}
