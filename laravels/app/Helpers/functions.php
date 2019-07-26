<?php

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/7/24
 * Time: 17:30
 */


function makeToken(){
    $token = (time() + rand(100000000,999999999));
    //数据指纹   128位长   16个字节  md5
    $token=md5($token);
    return $token;
}

function sendSms($to,$code){
    if(!isset($to)){
        return json_encode([
            'code'=>250,
            'msg'=>'手机号为空',
        ]);
    }

    //初始化配置
    try {
        AlibabaCloud::accessKeyClient(config('aliyunsms.access_key'), config('aliyunsms.access_secret'))
            ->regionId('cn-hangzhou')
            ->asDefaultClient();
    } catch (ClientException $e) {
        return json_encode([
            'code'=>250,
            'msg'=>$e->getMessage(),
        ]);
    }

    try {
        $result=AlibabaCloud::rpc()
            ->product('Dysmsapi')
            // ->scheme('https') // https | http
            ->version('2017-05-25')
            ->action('SendSms')
            ->method('POST')
            ->options([
                'query' => [
                    //手机号
                    'PhoneNumbers' => $to,
                    'TemplateCode' => config('aliyunsms.template_code'),
                    'SignName' => config('aliyunsms.sign_name'),
                    //验证码
                    'TemplateParam' => json_encode(['code'=>$code]),
                ],
            ])
            ->request();
        Session::put($to, $code);
        return json_encode($result->toArray());
    } catch (ClientException $e) {
        return json_encode([
            'code'=>250,
            'msg'=>$e->getMessage(),
        ]);
    } catch (ServerException $e) {
        return json_encode([
            'code'=>250,
            'msg'=>$e->getMessage(),
        ]);
    }
}