<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/7/23
 * Time: 15:11
 */
namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\UserBindConnect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->user=new User();
    }

 public function register(Request $request){
     $phone=$request->input('phone');
     $code=$request->input('code');
     if(empty($phone)||empty($code)){
      return json_encode([
          'code'=>250,
          'msg'=>'手机号码｜验证码为空'
      ]);
     }

     $result=DB::table('user_bind_connects')->where('bind_id','mobile_'.$phone)->count();
   if($result>=1){
//       return json_encode([
//           'code'=>250,
//           'msg'=>'该手机号已经注册，请更换手机号。'
//       ]);
     return $this->user->phoneLoginFunction($phone,$code);
   }
     if(Session::get($phone)==$code){
         return json_encode([
             'code'=>250,
             'msg'=>'验证码错误'
         ]);
     }

     else{
         DB::beginTransaction();
      $user=new User();
      $user->name='昵称'.rand(100000,999999);
      $user->password=md5(rand(10000000,99999999));
      $flag1=$user->save();
      $userBindConnect=new UserBindConnect();
         $userBindConnect->bind_id='mobile_'.$phone;
         $userBindConnect->bind_type=1;
         $userBindConnect->user_id=$user->id;
         $flag2=$userBindConnect->save();
         if($flag1&&$flag2){
             DB::commit();
//             return json_encode([
//                 'code'=>200,
//                 'msg'=>'注册成功'
//             ]);
           return  $this->user->phoneLoginFunction($phone, $code);
         }else{
             DB::rollBack();
             return json_encode([
                 'code'=>250,
                 'msg'=>'注册失败'
             ]);
         }
     }
 }
    public function sendSms(Request $request){
        return sendSms($request->input('phone'),rand(1000,9999));
    }

}